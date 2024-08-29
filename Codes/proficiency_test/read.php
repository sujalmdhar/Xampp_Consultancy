<?php
include '../db.php';

$sql = "SELECT * FROM Proficiency_Test";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proficiency Tests</title>
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
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        /* Add custom CSS for table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dee2e6; /* Add border to all sides */
            padding: 8px; /* Add padding for better spacing */
            text-align: center; /* Center align content */
        }
        th {
            background-color: #f8f9fa; /* Light gray background for header */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternate row background color */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Proficiency Tests</h1>
        <div class="mb-3">
            <!-- Add button to create a new test -->
            <a href="create.php" class="btn btn-primary">Create New Test</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Test ID</th>
                    <th>Test Name</th>
                    <th>Description</th>
                    <th>Difficulty</th>
                    <th>Admin ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $sno = 1; // Initialize the serial number
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . $sno++ . "</td>"; // Add right border
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['test_id']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['test_name']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['difficulty']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['admin_id']) . "</td>";
                        echo "<td>";
                        echo "<a href='update.php?id=" . htmlspecialchars($row['test_id']) . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='delete.php?id=" . htmlspecialchars($row['test_id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
