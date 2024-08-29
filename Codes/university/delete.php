<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM University WHERE university_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
        alert('University record deleted successfully.');
        window.location.href='index.php';
        </script>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID parameter missing";
}
