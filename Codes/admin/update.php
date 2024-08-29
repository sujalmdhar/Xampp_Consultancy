<?php
include 'db.php';

// Function to safely escape HTML output
function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $session_token = $_POST['session_token'];

    // Check if password is being updated
    if (empty($password)) {
        $sql = "UPDATE Admin SET first_name = ?, last_name = ?, email = ?, username = ?, session_token = ? WHERE admin_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $first_name, $last_name, $email, $username, $session_token, $id);
    } else {
        // Hash the password before updating
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE Admin SET first_name = ?, last_name = ?, email = ?, username = ?, password = ?, session_token = ? WHERE admin_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $first_name, $last_name, $email, $username, $hashed_password, $session_token, $id);
    }

    if ($stmt->execute()) {
        echo "
        <script>
        alert('Admin record updated successfully.');
        window.location.href='index.php';
        </script>
        ";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Admin WHERE admin_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No record found with ID $id";
            exit();
        }

        $stmt->close();
    } else {
        echo "ID parameter missing";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .password-toggle-btn {
            cursor: pointer;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Admin</h1>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo escape($row['admin_id']); ?>">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?php echo escape($row['first_name']); ?>" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?php echo escape($row['last_name']); ?>" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo escape($row['email']); ?>" maxlength="100" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo escape($row['username']); ?>" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Password (leave blank to keep current password)</label>
                <div class="input-group">
                    <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter new password" maxlength="255">
                    <div class="input-group-append">
                        <span class="input-group-text password-toggle-btn" id="togglePassword">Show</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Session Token</label>
                <input type="text" name="session_token" class="form-control" value="<?php echo escape($row['session_token']); ?>" maxlength="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>

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
