<?php

// Retrieve user input from form
$email = $_POST["emailTF"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

if ($password != $confirmPassword) {
    include "signup.php";
    echo '<script>alert("Password unconfirmed, try again.");</script>';
} else {
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

    // Check if the user already exists
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        // Display an error message if the user already exists
        include "signup.php";
        echo '<script>alert("Email is already in use, try another");</script>';
    } else {
        // Create a new user in the database
        $query = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
        if ($mysqli->query($query) === TRUE) {
            // Display a success message
            include "login.php";
            echo '<script>alert("User created successfully.");</script>';
        } else {
            // Display an error message if the user could not be created
            include "signup.php";
            $error_message = "Error creating user: " . $mysqli->error;
            echo "<script>alert('$error_message');</script>";
        }
    }

    // Close the database connection
    $mysqli->close();
}
