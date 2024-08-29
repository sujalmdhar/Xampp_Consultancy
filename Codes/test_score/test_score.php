<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23189654";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch test_id and score_id
$sqlTest = "SELECT test_id FROM proficiency_Test";
$sqlScore = "SELECT score_id FROM score";

$resultTest = $conn->query($sqlTest);
$resultScore = $conn->query($sqlScore);

// Check if the queries were successful
if ($resultTest === FALSE) {
    die("Error fetching test_id: " . $conn->error);
}
if ($resultScore === FALSE) {
    die("Error fetching score_id: " . $conn->error);
}

$tests = [];
$scores = [];

while ($row = $resultTest->fetch_assoc()) {
    $tests[] = $row['test_id'];
}

while ($row = $resultScore->fetch_assoc()) {
    $scores[] = $row['score_id'];
}

if (empty($tests)) {
    die("No test_id found in proficiency_Test table.");
}

if (empty($scores)) {
    die("No score_id found in score table.");
}

// Assume we want to insert all combinations of test_id and score_id into test_score table
foreach ($tests as $test_id) {
    foreach ($scores as $score_id) {
        $sqlInsert = "INSERT INTO test_score (test_id, score_id) VALUES ($test_id, $score_id)";
        if ($conn->query($sqlInsert) === TRUE) {
            echo "New record created successfully for test_id $test_id and score_id $score_id<br>";
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error . "<br>";
        }
    }
}

$conn->close();
?>
