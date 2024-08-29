<?php
// Include the database connection file
include '../db.php';

// Fetch student records from the database
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records (Admin)</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .back-btn {
            cursor: pointer;
            width: 30px;
            height: 30px;
            fill: #1e88e5;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: fill 0.3s;
        }

        .back-btn:hover {
            fill: #1565c0;
        }

        .header h1 {
            flex-grow: 1;
            text-align: center;
            font-size: 28px;
            margin: 0;
            margin-left: 10px; /* Adjust for the width of the back button */
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .table th {
            background-color: #f7f7f7;
            font-size: 14px;
            white-space: nowrap;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #eaeaea;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .header h1 {
                font-size: 24px;
            }

            .btn-primary {
                font-size: 12px;
                padding: 8px 16px;
                margin-bottom: 10px;
            }

            .table th, .table td {
                padding: 10px;
                font-size: 12px;
            }

            .back-btn {
                width: 24px;
                height: 24px;
            }

            .header h1 {
                margin-left: 10px; /* Adjust for the smaller back button */
            }
        }

        @media (max-width: 424px) {
            .header h1 {
                font-size: 20px;
            }

            .back-btn {
                width: 20px;
                height: 20px;
            }

            .header h1 {
                margin-left: 10px; /* Adjust for the smaller back button */
            }

            .container {
                padding: 10px;
            }

            .table thead {
                display: none;
            }

            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 15px;
            }

            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <!-- Back button/icon -->
            <a class="back-btn" href="javascript:void(0);" onclick="window.history.back();" aria-label="Go Back">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </a>
            <h1>Student Records</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $serialNo = 1; // Counter for serial number
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td data-label='Serial No.'>" . $serialNo++ . "</td>"; // Display and increment serial number
                            echo "<td data-label='Student ID'>" . htmlspecialchars($row["student_id"]) . "</td>";
                            echo "<td data-label='Name'>" . htmlspecialchars($row["name"]) . "</td>";
                            echo "<td data-label='Email'>" . htmlspecialchars($row["email"]) . "</td>";
                            echo "<td data-label='Phone'>" . htmlspecialchars($row["phone"]) . "</td>";
                            echo "<td data-label='Address'>" . htmlspecialchars($row["address"]) . "</td>";
                            echo "<td data-label='Created At'>" . htmlspecialchars($row["created_at"]) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No student records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
