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

$A_email = mysqli_real_escape_string($conn, $_POST['email']);
$A_password = mysqli_real_escape_string($conn, $_POST['password']);

$result = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$A_email' AND password = '$A_password'");

if (mysqli_num_rows($result) > 0) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin'] = $A_email;
    echo "
        <script>
        alert('Login successfully.');
        window.location.href='admin_dashboard.php';
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

mysqli_close($conn);
