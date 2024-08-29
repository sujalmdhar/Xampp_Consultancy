<?php
// Include your database connection file (db.php)
include 'db.php';

// Function to limit the length of a field
function limitField($value, $maxLength) {
    return substr($value, 0, $maxLength);
}

// Initialize variables to hold form field values
$first_name = $last_name = $email = $username = $password = $session_token = "";
$first_name_err = $last_name_err = $email_err = $username_err = $password_err = $session_token_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Trim and limit input fields to specified lengths
    $first_name = limitField(trim($_POST['first_name']), 50);
    $last_name = limitField(trim($_POST['last_name']), 50);
    $email = limitField(trim($_POST['email']), 100);
    $username = limitField(trim($_POST['username']), 50);
    $password = limitField($_POST['password'], 255);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $session_token = limitField($_POST['session_token'], 100);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set the current timestamp
    $created_at = date("Y-m-d H:i:s");

    // Use prepared statement to insert data into database
    $sql = "INSERT INTO Admin (first_name, last_name, email, username, password, created_at, session_token)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $first_name, $last_name, $email, $username, $hashed_password, $created_at, $session_token);
        // execute and other statements
    }

        if ($stmt->execute()) {
            echo "
            <script>
            alert('New admin created successfully.');
            window.location.href='index.php';
            </script>
            ";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional: Styling for form and errors */
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Create Admin</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" maxlength="50" required value="<?php echo htmlspecialchars($first_name); ?>">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" maxlength="50" required value="<?php echo htmlspecialchars($last_name); ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php if (!empty($email_err)) echo 'is-invalid'; ?>" maxlength="100" required value="<?php echo htmlspecialchars($email); ?>">
                <span class="error"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" maxlength="50" required value="<?php echo htmlspecialchars($username); ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input id="passwordInput" type="password" name="password" class="form-control" maxlength="255" required>
                    <div class="input-group-append">
                        <button id="togglePassword" class="btn btn-outline-secondary" type="button">Show</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Session Token</label>
                <input type="text" name="session_token" class="form-control" maxlength="100" required value="<?php echo htmlspecialchars($session_token); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Create Admin</button>
        </form>
    </div>

    <!-- Optional: Bootstrap and other scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('passwordInput');
            var button = document.getElementById('togglePassword');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                button.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                button.textContent = 'Show';
            }
        });
    </script>
</body>
</html>
