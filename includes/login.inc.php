<?php

if(!isset($_POST['login'])) { // if the login button is not pressed
    header("location: ../login.php"); // redirect to login page
    exit(); // stop executing the script
}
require_once 'dbh.inc.php'; // import all scripts from the dbh.inc.php (the database connection)
require_once 'functions.inc.php'; // import all scripts form the functions.inc.php

$username = $_POST['uname']; // get the username from the POST request
$pword = $_POST['pword']; // get the password form the POST request

if(empty($username) || empty($pword)) { // if the form is submitted with empty username and password
    header("location: ../login.php?login=empty"); // redirect to login page and print and error
    exit(); // stop executing the script
}

loginUser($conn, $username, $pword); // call the loginUser function from the functions.inc.php
