<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Lists (Students)</title>
    <!-- Link to your custom stylesheet -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Link to Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for additional styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1400px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            text-align: center;
            color: #007bff;
            margin: 0;
            font-size: 24px;
        }

        .back-btn {
            cursor: pointer;
            width: 30px;
            height: 30px;
            fill: #007bff;
        }

        .back-btn:hover {
            opacity: 0.8;
        }

        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            white-space: nowrap;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .table td {
            border-top: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .table th,
            .table td {
                display: block;
                width: 100%;
                text-align: left;
            }

            .table th {
                display: none;
            }

            .table tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                background-color: #fff;
                padding: 10px;
            }

            .table td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #ddd;
            }

            .table td:last-child {
                border-bottom: none;
            }

            .table td::before {
                content: attr(data-label);
                flex: 1;
                font-weight: bold;
                padding-right: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="back-btn" onclick="window.history.back();">
                <!-- SVG back icon for back button -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="100%" height="100%">
                    <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                </svg>
            </span>
            <h1>University Lists</h1>
            <!-- Placeholder span for additional spacing -->
            <span style="width: 30px; height: 30px;"></span>
        </div>

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>University ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Location</th>
                        <th>Ranking (Worldwide)</th>
                        <th>Minimum Band</th>
                        <th>Scholarship</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection file
                    include '../db.php';

                    // Fetch data from the database
                    $sql = "SELECT * FROM university";
                    $result = $conn->query($sql);

                    // Check if there are rows returned
                    if ($result && $result->num_rows > 0) {
                        $sno = 1;
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td data-label='S.No'>" . $sno++ . "</td>";
                            echo "<td data-label='University ID'>" . htmlspecialchars($row['university_id']) . "</td>";
                            echo "<td data-label='Name'>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td data-label='Country'>" . htmlspecialchars($row['country']) . "</td>";
                            echo "<td data-label='Location'>" . htmlspecialchars($row['location']) . "</td>";
                            echo "<td data-label='Ranking (Worldwide)'>" . htmlspecialchars($row['ranking']) . "</td>";
                            echo "<td data-label='Minimum Band'>" . htmlspecialchars($row['minimum_band']) . "</td>";
                            echo "<td data-label='Scholarship' style='min-width: 150px;'>" . htmlspecialchars($row['scholarship']) . "</td>"; /* Adjusted min-width for scholarship */
                            echo "</tr>";
                        }
                    } else {
                        // If no records found
                        echo "<tr><td colspan='8'>No records found</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
