<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$mysqli = new mysqli($servername, $username, $password);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create database
$sql = "CREATE SCHEMA IF NOT EXISTS 'codemy' ;";
$mysqli->query($sql);
// close and reconnect
$mysqli->close();

$dbname = "codemy";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS 'codemy'.'course' (
    'idcourse' INT NOT NULL AUTO_INCREMENT,
    'imglink' LONGTEXT NOT NULL,
    'title' VARCHAR(255) NOT NULL,
    'description' LONGTEXT NOT NULL,
    PRIMARY KEY ('idcourse'));";
$mysqli->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS 'codemy'.'user' (
    'iduser' INT NOT NULL AUTO_INCREMENT,
    'email' VARCHAR(255) NOT NULL,
    'password' VARCHAR(255) NOT NULL,
    PRIMARY KEY ('iduser'),
    UNIQUE INDEX 'email_UNIQUE' ('email' ASC) VISIBLE);";
$mysqli->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS 'codemy'.'learning' (
    'idlearning' INT NOT NULL AUTO_INCREMENT,
    'iduser' INT NOT NULL,
    'idcourse' INT NOT NULL,
    PRIMARY KEY ('idlearning'),
    INDEX 'iduser_idx' ('iduser' ASC) VISIBLE,
    INDEX 'idcourse_idx' ('idcourse' ASC) VISIBLE,
    CONSTRAINT 'iduser'
      FOREIGN KEY ('iduser')
      REFERENCES 'codemy'.'user' ('iduser')
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
    CONSTRAINT 'idcourse'
      FOREIGN KEY ('idcourse')
      REFERENCES 'codemy'.'course' ('idcourse')
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);";
$mysqli->query($sql);

$mysqli->close();
