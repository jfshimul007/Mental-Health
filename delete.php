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

    // Delete the data from the database
    $deleteSql = "DELETE FROM user_data WHERE id = $id";

    if ($conn->query($deleteSql) === TRUE) {
        header('Location: admin_dashboard.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
