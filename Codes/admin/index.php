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
    <title>Admin List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Column layout */
            align-items: center; /* Center items horizontally */
        }

        .header {
            width: 100%; /* Full width header */
            display: flex; /* Flexbox for header */
            justify-content: space-between; /* Space between items */
            align-items: center; /* Center items vertically */
            margin-bottom: 20px; /* Adjust margin as needed */
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

        h1 {
            font-size: 28px;
            text-align: center;
            margin: 0; /* Remove default margin */
            flex-grow: 1; /* Allow title to grow */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }

        .table-responsive {
            overflow-x: auto;
            width: 100%; /* Full width for responsiveness */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center; /* Center align text */
        }

        .table thead th {
            background-color: #f7f7f7;
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
        }

        @media (max-width: 480px) {
            .container {
                padding: 5px;
            }
        }

        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .table {
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Back button/icon -->
            <div class="back-btn" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </div>
            <h1>Admin List</h1>
            <div style="width: 30px;"></div> <!-- Adjust spacing if necessary -->
        </div>
        <a href="create.php" class="btn btn-primary mb-3">Add New Admin</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Admin ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $sno = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td data-label='S.No'>". $sno++. "</td>";
                            echo "<td data-label='Admin ID'>". htmlspecialchars($row['admin_id']). "</td>";
                            echo "<td data-label='First Name'>". htmlspecialchars($row['first_name']). "</td>";
                            echo "<td data-label='Last Name'>". htmlspecialchars($row['last_name']). "</td>";
                            echo "<td data-label='Email'>". htmlspecialchars($row['email']). "</td>";
                            echo "<td data-label='Username'>". htmlspecialchars($row['username']). "</td>";
                            echo "<td data-label='Actions'>";
                            echo "<a href='update.php?id=". $row['admin_id']."' class='btn btn-warning btn-sm'>Edit</a> ";
                            echo "<a href='delete.php?id=". $row['admin_id']."' class='btn btn-danger btn-sm'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
