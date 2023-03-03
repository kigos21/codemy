<?php

session_start();

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

$query = "DELETE FROM learning WHERE iduser = '$iduser'";
$mysqli->query($query);
$query = "DELETE FROM user WHERE iduser='$iduser'";
if ($mysqli->query($query) === TRUE) {
    // Display a success message
    include "login.php";
    echo "<script>alert('User deleted successfully.');</script>";
} else {
    // Display an error message if the user could not be deleted
    echo "Error deleting user: " . $mysqli->error;
}

// Close database connection
unset($_SESSION["email"]);
unset($_SESSION["iduser"]);
$mysqli->close();
