<?php

session_start();

$iduser = $_POST["iduser"];
$idcourse = $_POST["idcourse"];

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

$iduser = $_SESSION["iduser"];

$query = "DELETE FROM learning WHERE idcourse = '$idcourse' AND iduser = '$iduser';";
if ($mysqli->query($query) === TRUE) {
    // Display a success message
    include "mylearning.php";
} else {
    // Display an error message if the user could not be deleted
    echo "Error deleting user: " . $mysqli->error;
}

// Close database connection
$mysqli->close();
