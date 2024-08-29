<?php
include 'db.php';

$sql = "SELECT * FROM Admin";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>
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
        <h1>Admin Users</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Admin ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Created At</th>
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
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['admin_id']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['first_name']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['last_name']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td style='border-right: 1px solid #dee2e6;'>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "<td>";
                        echo "<a href='update.php?id=" . htmlspecialchars($row['admin_id']) . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='delete.php?id=" . htmlspecialchars($row['admin_id']) . "' class='btn btn-danger btn-sm'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
