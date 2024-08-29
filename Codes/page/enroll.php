<?php
include '../db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $test_id = $_POST['test_id'];

    // Check if the student is already enrolled in the test
    $check_sql = "SELECT * FROM Enrollments WHERE student_id = ? AND test_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $student_id, $test_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "
        <script>
        alert('You are already enrolled in this test.');
        window.location.href='student_dashboard.php';
        </script>
        ";
    } else {
        // Insert the enrollment record
        $sql = "INSERT INTO Enrollments (student_id, test_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $student_id, $test_id);

        if ($stmt->execute()) {
            echo "
            <script>
            alert('Enrolled successfully.');
            window.location.href='student_dashboard.php';
            </script>
            ";
        } else {
            echo "Error: " . $stmt->error;
        }
        }

    $stmt->close();
} else {
    echo "Invalid request.";
}