<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Query to check if the email exists in the student database
    $sql = "SELECT * FROM Student WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the student details
        $student = $result->fetch_assoc();
        
        // Store the student ID in the session
        $_SESSION['student_id'] = $student['student_id'];
        
        // Set a session variable for successful login
        $_SESSION['login_success'] = true;

        // Output JavaScript to show an alert and then redirect
        echo "<script>
            alert('Login successfully as a student(user).');
            window.location.href = '../page/student_dashboard.php';
        </script>";
        exit();
    } else {
        // Email does not exist, display an error message
        $error = "Invalid email. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login (Students)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" maxlength="100" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <?php if(isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>
