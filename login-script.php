<?php

session_start();

// Retrieve user input from form
$email = $_POST["emailTF"];
$password = $_POST["passwordTF"];

// Connect to database
$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "codemy";
$mysqli = new mysqli($host, $db_username, $db_password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare and execute SQL statement to retrieve user with matching credentials
$stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

// Retrieve result set and check for matching user
$result = $stmt->get_result();
if ($result->num_rows == 1) {
    // User found, start session and redirect to dashboard page
    $row = mysqli_fetch_assoc($result);
    $_SESSION["email"] = $row["email"];
    $_SESSION["iduser"] = $row["iduser"];
    include "explore.php";
} else {
    // User not found, redirect back to login page with error message
    include "login.php";
    echo '<script>alert("Invalid email or password.");</script>';
}

// Close database connection
$mysqli->close();
