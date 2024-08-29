<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM Proficiency_Test WHERE test_id=$id";

    if ($conn->query($sql) === TRUE) {
        // Alert message using JavaScript
        echo "<script>alert('Test deleted.');</script>";
        // Redirect back to index.php after alert
        echo "<script>window.location.href = 'index.php';</script>";
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID parameter missing";
}
