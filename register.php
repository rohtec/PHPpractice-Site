<?php

include "db_connect.php";

// Get data from the form
$fullname = trim($_POST["fullname"]);
$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = $_POST["password"];
$confirmPassword = $_POST["confirm_password"];

// Check if the passwords match
if ($password !== $confirmPassword) {
    die("Passwords do not match.");
}

// Check if the username or email already exists
$check = "SELECT id FROM users WHERE username = ? OR email = ?";
$stmt = mysqli_prepare($conn, $check);

mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    die("Username or email is already registered.");
}

mysqli_stmt_close($stmt);

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Save the new user
$sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $hashedPassword);

// if (mysqli_stmt_execute($stmt)) {
//     echo "Registration successful!";
//     // Later we'll redirect to login.php
//     // header("Location: login.php");
// } else {
//     echo "Registration failed.";
// }

if (mysqli_stmt_execute($stmt)) {
    header("Location: signup.php?registered=success");
    exit();
} else {
    echo "Registration failed.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>