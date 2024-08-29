<?php
// Include the database connection file
include '../db.php';
session_start();

// Check if the student is logged in, you might have your own logic for this
$loggedIn = isset($_SESSION['student_id']);
$student_id = $_SESSION['student_id'] ?? null;

// Initialize an empty array to store the fetched tests
$tests = [];

// Check if the student is logged in
if ($loggedIn) {
    // Fetch proficiency tests from the database
    $sql = "SELECT * FROM Proficiency_Test";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are any tests available
        if ($result->num_rows > 0) {
            // Fetch each test and add it to the $tests array
            while ($row = $result->fetch_assoc()) {
                $tests[] = $row;
            }
        } else {
            echo "No tests found.";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle enrollment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enroll'])) {
    // Check if the test ID is set in the POST data
    if (isset($_POST['test_id']) && $student_id) {
        $test_id = $_POST['test_id'];
        $enrollment_date = date("Y-m-d H:i:s");

        // Insert enrollment details into the database
        $sql = "INSERT INTO enrollment (student_id, test_id, enrollment_date) VALUES ('$student_id', '$test_id', '$enrollment_date')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('You have been successfully enrolled in this course.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proficiency Tests (Students)</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            text-align: center;
            color: #2c3e50;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .back-btn {
            cursor: pointer;
            width: 30px;
            height: 30px;
            fill: #1e88e5;
        }

        .back-btn:hover {
            fill: #1565c0;
        }

        .info-section {
            background-color: #e0f2f1;
            border: 1px solid #b2dfdb;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .info-section p {
            color: #37474f;
            line-height: 1.6;
        }

        .test {
            background-color: #e8f5e9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .test:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .test h3 {
            text-align: center;
            margin-top: 0;
            color: #1e88e5;
            font-weight: bold;
        }

        .test p {
            margin-bottom: 10px;
            color: #424242;
        }

        .enroll-btn {
            display: block;
            width: 150px;
            margin: 20px auto 0;
            background-color: #1e88e5;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .enroll-btn:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
        }

        p.empty-message {
            text-align: center;
            color: #757575;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .test {
                padding: 15px;
            }

            .enroll-btn {
                width: 100%;
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Back button/icon -->
            <span class="back-btn" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="100%" height="100%">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </span>
            <h1>Proficiency Tests</h1>
            <div style="width: 30px; height: 30px;"></div> <!-- Placeholder for spacing, adjust as needed -->
        </div>
        <!-- Information section above IELTS tests -->
        <div class="info-section">
            <p>Welcome to the proficiency tests section. Currently, we have only the IELTS test available. If you have already taken the IELTS exam, you can proceed to the score section and enter your scores to find matching universities. If you haven't taken the exam yet, you can enroll now in our courses below:</p>
        </div>
        <?php if ($loggedIn): ?>
            <div id="test-container">
                <!-- Display the proficiency tests -->
                <?php if (!empty($tests)): ?>
                    <?php foreach ($tests as $test): ?>
                        <div class="test">
                            <h3><?php echo htmlspecialchars($test['test_name']); ?></h3>
                            <p><strong>Description:</strong> <?php echo htmlspecialchars($test['description']); ?></p>
                            <p><strong>Difficulty:</strong> <?php echo htmlspecialchars($test['difficulty']); ?></p>
                            <p><strong>Ready to ace the IELTS exam?</strong> Click "Enroll" and join our intensive 45-day IELTS preparation course designed to get desired score and help you boost for your exam performance!</p>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="test_id" value="<?php echo htmlspecialchars($test['test_id']); ?>">
                                <button type="submit" name="enroll" class="enroll-btn">Enroll</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty-message">No tests found.</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Please log in to view your dashboard.</p>
        <?php endif; ?>
    </div>
</body>
</html>
