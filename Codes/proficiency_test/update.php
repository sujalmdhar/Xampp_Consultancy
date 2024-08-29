<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test_id = $_POST['test_id'];
    $test_name = $_POST['test_name'];
    $description = $_POST['description'];
    $difficulty = $_POST['difficulty'];
    $admin_id = $_POST['admin_id'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE Proficiency_Test SET test_name=?, description=?, difficulty=?, admin_id=? WHERE test_id=?");
    $stmt->bind_param("sssii", $test_name, $description, $difficulty, $admin_id, $test_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Close the statement
        $stmt->close();

        // Close the connection
        $conn->close();

        // Alert and redirection
        echo "<script>alert('Test Updated.'); window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    if (isset($_GET['id'])) {
        $test_id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM Proficiency_Test WHERE test_id=?");
        $stmt->bind_param("i", $test_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No record found with ID $test_id";
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "ID parameter missing";
        exit();
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Proficiency Test</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Update Proficiency Test</h1>
        <form method="post" action="update.php">
            <input type="hidden" name="test_id" value="<?php echo htmlspecialchars($row['test_id']); ?>">
            <div class="form-group">
                <label for="test_name">Test Name</label>
                <input type="text" name="test_name" class="form-control" id="test_name" value="<?php echo htmlspecialchars($row['test_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="5" required><?php echo htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="difficulty">Difficulty</label>
                <textarea name="difficulty" class="form-control" id="difficulty" rows="5" required><?php echo htmlspecialchars($row['difficulty']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="admin_id">Admin ID</label>
                <input type="text" name="admin_id" class="form-control" id="admin_id" value="<?php echo htmlspecialchars($row['admin_id']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Test</button>
        </form>
    </div>
</body>
</html>
