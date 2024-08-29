<?php
include 'db.php'; // Ensure this file correctly establishes the $conn connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $university_id = $_POST['university_id'];
    $name = $_POST['name'];
    $country = $_POST['country'];
    $location = $_POST['location'];
    $ranking = $_POST['ranking'];
    $admin_id = $_POST['admin_id'];
    $minimum_band = $_POST['minimum_band'];
    $scholarship = $_POST['scholarship'];

    $sql = "UPDATE University 
            SET name = ?, country = ?, location = ?, ranking = ?, admin_id = ?, minimum_band = ?, scholarship = ?
            WHERE university_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiisi", $name, $country, $location, $ranking, $admin_id, $minimum_band, $scholarship, $university_id);

    if ($stmt->execute()) {
        echo "
        <script>
        alert('University record updated successfully.');
        window.location.href='index.php';
        </script>
        ";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM University WHERE university_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No record found with ID $id";
            exit();
        }

        $stmt->close();
    } else {
        echo "ID parameter missing";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update University</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update University</h1>
        <form method="post" action="update.php">
            <input type="hidden" name="university_id" value="<?php echo htmlspecialchars($row['university_id']); ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" maxlength="100" required>
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="<?php echo htmlspecialchars($row['country']); ?>" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($row['location']); ?>" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Ranking(Worldwide)</label>
                <input type="number" name="ranking" class="form-control" value="<?php echo htmlspecialchars($row['ranking']); ?>" required>
            </div>
            <div class="form-group">
                <label>Admin ID</label>
                <input type="number" name="admin_id" class="form-control" value="<?php echo htmlspecialchars($row['admin_id']); ?>" required>
            </div>
            <div class="form-group">
                <label>Minimum Band</label>
                <input type="number" step="0.01" name="minimum_band" class="form-control" value="<?php echo htmlspecialchars($row['minimum_band']); ?>" required>
            </div>
            <div class="form-group">
                <label>Scholarship</label>
                <input type="text" name="scholarship" class="form-control" value="<?php echo htmlspecialchars($row['scholarship']); ?>" maxlength="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Update University</button>
        </form>
    </div>
</body>
</html>
