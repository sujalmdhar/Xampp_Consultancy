<?php
include 'db.php';

// Function to limit the length of a field
function limitField($value, $maxLength) {
    return substr($value, 0, $maxLength);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = limitField($_POST['name'], 100); // Limit name to 100 characters
    $email = limitField($_POST['email'], 100); // Limit email to 100 characters
    $phone = limitField($_POST['phone'], 20); // Limit phone to 20 characters
    $address = limitField($_POST['address'], 255); // Limit address to 255 characters

    // Set the current timestamp
    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO Student (name, email, phone, address, created_at)
            VALUES ('$name', '$email', '$phone', '$address', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        // Insert successful, trigger alert
        echo "
        <script>
        alert('Student ID created! Now, you can login using email address.');
        window.location.href='../student/login.php';
        </script>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
