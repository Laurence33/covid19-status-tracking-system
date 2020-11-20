<?php

if (!isset($_POST['signup'])) { // if the signup button is not pressed
    header("location: ../signup.php"); // redirect to the signup page
    exit(); // stop executing the script
}
    $username = $_POST['uname']; // get the username from the POST
    $pword = $_POST['pword']; // get the password from the POST
    $cpword = $_POST['cpword']; // get the confirm password from the POST

    require_once 'dbh.inc.php'; //import the connection
    require_once 'functions.inc.php'; // import the functions from the functions.inc.php

   
    if(empty($username) || empty($pword) || empty($cpword)) {  // if an input fields are empty
        header("location: ../signup.php?signup=empty"); // redirect to signup page with and error
        exit(); // stop executing the script
    }

    if($pword !== $cpword) { // if the password and confirm password does not match
        header("location: ../signup.php?signup=pwordNotMatched"); // redirect to signup page with an error
        exit(); // stop executing the script
    }

    if(userExist($conn, $username)) { // if user exists in the database
        header("location: ../signup.php?signup=usernameExists"); // redirect to signup page with an error
        exit(); // stop executing the script
    }

    //Create the user on the database
    createUser($conn, $username, $pword);
