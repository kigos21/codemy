<?php

$idcourse = $_POST["idcourse"];
$iduser = $_POST["iduser"];

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
$query = "SELECT * FROM learning WHERE idcourse='$idcourse' AND iduser='$iduser'";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    // Display an error message if the user already exists
    include "explore.php";
    echo '<script>alert("You already have that course.");</script>';
} else {
    // Create a new user in the database
    $query = "INSERT INTO learning (idcourse, iduser) VALUES ('$idcourse', '$iduser')";
    if ($mysqli->query($query) === TRUE) {
        // Display a success message
        include "explore.php";
        echo '<script>alert("Added successfully.");</script>';
    } else {
        // Display an error message if the user could not be created
        include "explore.php";
        $error_message = "Error adding to learning: " . $mysqli->error;
        echo "<script>alert('$error_message');</script>";
    }
}

// Close the database connection
$mysqli->close();
