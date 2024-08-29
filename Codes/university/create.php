<?php
include 'db.php';

// Function to limit the length of a field
function limitField($value, $maxLength) {
    return substr($value, 0, $maxLength);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = limitField($_POST['name'], 100); // Limit name to 100 characters
    $country = limitField($_POST['country'], 50); // Limit country to 50 characters
    $location = limitField($_POST['location'], 50); // Limit location to 50 characters
    $ranking = $_POST['ranking']; // No need to limit ranking
    $admin_id = $_POST['admin_id']; // No need to limit admin_id
    $minimum_band = $_POST['minimum_band']; // No need to limit minimum_band
    $scholarship = limitField($_POST['scholarship'], 100); // Limit scholarship to 100 characters

    $sql = "INSERT INTO University (name, country, location, ranking, admin_id, minimum_band, scholarship)
            VALUES ('$name', '$country', '$location', $ranking, $admin_id, $minimum_band, '$scholarship')";

    if ($conn->query($sql) === TRUE) {
        echo"
        <script>
        alert('New university created successfully.');
        window.location.href='index.php';
        </script>
        ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create University</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Create University</h1>
        <form method="post" action="create.php">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" maxlength="100" required>
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" class="form-control" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" maxlength="50" required>
            </div>
            <div class="form-group">
                <label>Ranking(Worldwide)</label>
                <input type="number" name="ranking" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Admin ID</label>
                <input type="number" name="admin_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Minimum Band</label>
                <input type="number" name="minimum_band" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Scholarship</label>
                <input type="text" name="scholarship" class="form-control" maxlength="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Create University</button>
        </form>
    </div>
</body>
</html>
