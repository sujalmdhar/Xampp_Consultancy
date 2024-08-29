<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23189654";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$A_email = $_POST['email'];
$A_password = $_POST['password'];

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM `admin` WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $A_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    // Verify the password using password_verify
    if (password_verify($A_password, $hashed_password)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin'] = $A_email;
        echo "
            <script>
            alert('Login successfully as a admin.');
            window.location.href='../page/admin_dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Invalid Username/password or you are not an admin!!!');
            window.location.href='../page/admin.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
        alert('Invalid Username/password or you are not an admin!!!');
        window.location.href='../page/admin.php';
        </script>
    ";
}

$stmt->close();
$conn->close();

