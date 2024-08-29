<?php
// Include the database connection file
include '../db.php';
session_start();

// Initialize an empty array to store the fetched universities
$universities = [];

// Fetch unique countries from the university table for the dropdown
$countries = [];
$country_sql = "SELECT DISTINCT country FROM university ORDER BY country";
$country_result = $conn->query($country_sql);
if ($country_result) {
    while ($row = $country_result->fetch_assoc()) {
        $countries[] = $row['country'];
    }
}

// Initialize a variable to track if the form was submitted
$form_submitted = false;

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ielts_score'])) {
    $form_submitted = true;
    $ielts_score = floatval($_POST['ielts_score']);
    $selected_country = $_POST['country'];

    // Retrieve student ID from session (you should modify this based on your session handling)
    $student_id = $_SESSION['student_id']; // Example: Replace with actual session variable
    
    // Insert the score into the database
    $insert_sql = "INSERT INTO score (category, score, student_id, university_id) VALUES (?, ?, ?, NULL)";
    $category = 'IELTS'; // Hardcoded category as 'IELTS'
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sdi", $category, $ielts_score, $student_id);
    $stmt->execute();


    if ($stmt->affected_rows > 0) {
        // Score successfully inserted
        echo "";

        // Now fetch universities based on IELTS score and optional country filter
        $sql = "SELECT * FROM university WHERE minimum_band <= ?";
        if (!empty($selected_country)) {
            $sql .= " AND country = ?";
        }
        
        $stmt = $conn->prepare($sql);
        if (!empty($selected_country)) {
            $stmt->bind_param("ds", $ielts_score, $selected_country);
        } else {
            $stmt->bind_param("d", $ielts_score);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any universities were found
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $universities[] = $row;
            }
        }
    } else {
        // Error inserting score
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score (Students)</title>
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

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 30px;
            position: relative;
            padding-left: 30px;
            font-size: 24px;
        }

        .back-btn {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            margin-right: 10px;
            transition: opacity 0.3s;
        }

        .back-btn svg {
            width: 20px;
            height: auto;
            fill: #1e88e5;
        }

        .back-btn:hover {
            opacity: 0.7;
        }

        form {
            margin-bottom: 30px;
            text-align: center;
        }

        input[type="number"],
        select {
            width: calc(50% - 11px); /* Adjust width to account for padding */
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f8f9fa;
            transition: border-color 0.3s, background-color 0.3s;
            box-sizing: border-box;
        }

        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #1e88e5;
            background-color: #fff;
        }

        button {
            width: calc(100% - 22px); /* Adjust width to account for padding */
            background-color: #1e88e5;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: #1565c0;
        }

        .university {
            background-color: #e8f5e9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .university:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .university h3 {
            margin-top: 0;
            color: #1e88e5;
            font-weight: bold;
        }

        .university p {
            margin-bottom: 10px;
            color: #424242;
        }

        p.empty-message {
            text-align: center;
            color: #757575;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .university {
                padding: 15px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }

            input[type="number"],
            select {
                width: calc(100% - 22px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <!-- Back button/icon -->
            <span class="back-btn" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="20" style="margin-right: 10px;">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </span>
            Find Your University Match
        </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="number" name="ielts_score" step="0.1" min="0" max="9" placeholder="Enter your IELTS score" required>
            <select name="country">
                <option value="">Select a Country (Optional)</option>
                <?php foreach ($countries as $country): ?>
                <option value="<?php echo htmlspecialchars($country); ?>"><?php echo htmlspecialchars($country); ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Find Universities</button>
        </form>

        <div id="university-container">
            <!-- Display the universities -->
            <?php if ($form_submitted && empty($universities)): ?>
            <p class="empty-message">No matching universities found. Please try again.</p>
            <?php endif; ?>

            <?php foreach ($universities as $university): ?>
            <div class="university">
                <h3><?php echo htmlspecialchars($university['name']); ?></h3>
                <p><strong>Country:</strong> <?php echo htmlspecialchars($university['country']); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($university['location']); ?></p>
                <p><strong>Ranking:</strong> <?php echo htmlspecialchars($university['ranking']); ?></p>
                <p><strong>Scholarship:</strong> <?php echo htmlspecialchars($university['scholarship']); ?></p>
                <p><strong>Minimum IELTS Band:</strong> <?php echo htmlspecialchars($university['minimum_band']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
