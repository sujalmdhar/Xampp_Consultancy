<?php
// Include the database connection file
include '../db.php';
session_start();

// Query to fetch enrollment details including student and test information
$sql = "SELECT e.enrollment_id, s.student_id, s.name AS student_name, s.email AS student_email, e.enrollment_date,
               e.test_id, t.test_name
        FROM enrollment e
        INNER JOIN student s ON e.student_id = s.student_id
        INNER JOIN proficiency_test t ON e.test_id = t.test_id
        ORDER BY e.enrollment_date DESC";

$result = $conn->query($sql);

if (!$result) {
    echo "Error: ". $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Enrollments (Admin)</title>
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

        .header .back-btn {
            cursor: pointer;
            width: 20px;
            height: 20px;
            fill: #1e88e5;
        }

        .header .back-btn:hover {
            fill: #1565c0;
        }

        .header h1 {
            flex-grow: 1;
            text-align: center;
            margin: 0;
            font-size: 28px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
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
        }

        @media (max-width: 768px) {
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

        @media (max-width: 425px) {
            .container {
                padding: 10px;
            }

            .header {
                flex-direction: row;
            }

            .header .back-btn {
                order: -1;
            }

            .header h1 {
                order: 1;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="back-btn" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </div>
            <h1>Enrollments List</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Enrollment ID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Test ID</th>
                        <th>Test Name</th>
                        <th>Enrollment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='Enrollment ID'>". htmlspecialchars($row['enrollment_id']). "</td>";
                        echo "<td data-label='Student ID'>". htmlspecialchars($row['student_id']). "</td>";
                        echo "<td data-label='Student Name'>". htmlspecialchars($row['student_name']). "</td>";
                        echo "<td data-label='Student Email'>". htmlspecialchars($row['student_email']). "</td>";
                        echo "<td data-label='Test ID'>". htmlspecialchars($row['test_id']). "</td>";
                        echo "<td data-label='Test Name'>". htmlspecialchars($row['test_name']). "</td>";
                        echo "<td data-label='Enrollment Date'>". htmlspecialchars($row['enrollment_date']). "</td>";
                        echo "</tr>";
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
