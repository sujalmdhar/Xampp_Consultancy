<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Lists (Admin)</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1100px;
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

        .table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
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
            .table thead {
                display: none;
            }
            .table,
            .table tbody,
            .table tr,
            .table td {
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
        <!-- Header with back button and title -->
        <div class="header">
            <div class="back-btn" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </div>
            <h1>University List</h1>
        </div>
        <a href="create.php" class="btn btn-primary mb-3">Add New University</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>University ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Location</th>
                    <th>Ranking(Worldwide)</th>
                    <th>Admin ID</th>
                    <th>Minimum Band</th>
                    <th>Scholarship</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM University";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $sno = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='S.No'>". $sno++. "</td>";
                        echo "<td data-label='University ID'>". htmlspecialchars($row['university_id']). "</td>";
                        echo "<td data-label='Name'>". htmlspecialchars($row['name']). "</td>";
                        echo "<td data-label='Country'>". htmlspecialchars($row['country']). "</td>";
                        echo "<td data-label='Location'>". htmlspecialchars($row['location']). "</td>";
                        echo "<td data-label='Ranking(Worldwide)'>". htmlspecialchars($row['ranking']). "</td>";
                        echo "<td data-label='Admin ID'>". htmlspecialchars($row['admin_id']). "</td>";
                        echo "<td data-label='Minimum Band'>". htmlspecialchars($row['minimum_band']). "</td>";
                        echo "<td data-label='Scholarship'>". htmlspecialchars($row['scholarship']). "</td>";
                        echo "<td data-label='Actions'>";
                        echo "<a href='update.php?id=". $row['university_id']."' class='btn btn-warning btn-sm'>Edit</a> ";
                        echo "<a href='delete.php?id=". $row['university_id']."' class='btn btn-danger btn-sm'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
