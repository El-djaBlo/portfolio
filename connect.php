<?php

// Establish connection
$conn = mysqli_connect("localhost", "root", "", "data");
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare and execute the insert query
$stmt = mysqli_prepare($conn, "INSERT INTO initest(name, contact, email, message) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "siss", $name, $contact, $email, $message);

if (mysqli_stmt_execute($stmt)) {
    echo "Data sent successfully.";
    echo '<script>window.location = "index.html";</script>';
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>