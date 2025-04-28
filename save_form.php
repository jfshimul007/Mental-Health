<?php
// save_form.php

session_start();
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $batch_roll = $_POST['batch_roll'];
    $feeling = $_POST['feeling'];

    $sql = "INSERT INTO user_data (name, number, age, sex, batch_roll, feeling) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisss", $name, $number, $age, $sex, $batch_roll, $feeling);

    if ($stmt->execute()) {
        echo "<script>alert('Your feeling has been submitted successfully!'); window.location.href='health.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: health.html');
}
?>
