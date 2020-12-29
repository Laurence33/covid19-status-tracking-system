<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "covidcheck"; // This is the name of the databse in MySQL, you have to create this using PHPmyAdmin first.

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName); // Try to connect with the database and save the connection to $conn

if(!$conn) { // If the connection fails at any circurmstances
    die("Connection failed: " + mysqli_connect_error());  // print an error message and exit the script
}
