<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: admin.php');
    exit();
}

// Include database connection
include 'db.php';

// Check if ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the data from the database
    $sql = "SELECT * FROM user_data WHERE id = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $batch_roll = $_POST['batch_roll'];
    $feeling = $_POST['feeling'];

    // Update the data in the database
    $updateSql = "UPDATE user_data SET name='$name', number='$number', age='$age', sex='$sex', batch_roll='$batch_roll', feeling='$feeling' WHERE id=$id";
    
    if ($conn->query($updateSql) === TRUE) {
        header('Location: admin_dashboard.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-5">
    <h1>Edit User</h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" placeholder="Enter Name" required>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" class="form-control" name="number" value="<?php echo $data['number']; ?>" placeholder="Enter Number" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" class="form-control" name="age" value="<?php echo $data['age']; ?>" placeholder="Enter Your Age" required>
        </div>
        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <input type="text" class="form-control" name="sex" value="<?php echo $data['sex']; ?>" placeholder="Enter Your Sex" required>
        </div>
        <div class="mb-3">
            <label for="batch_roll" class="form-label">Batch Roll</label>
            <input type="text" class="form-control" name="batch_roll" value="<?php echo $data['batch_roll']; ?>" placeholder="Enter Your Batch and Roll" required>
        </div>
        <div class="mb-3">
            <label for="feeling" class="form-label">Feeling</label>
            <textarea class="form-control" name="feeling" placeholder="Enter Your Feeling" required><?php echo $data['feeling']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Add Bootstrap JS and Popper.js for better UI interactions -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
