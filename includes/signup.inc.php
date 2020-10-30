<?php

if (isset($_POST['signup'])) {
    $username = $_POST['uname'];
    $pword = $_POST['pword'];
    $cpword = $_POST['cpword'];

    //import the connection
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //check if an input is empty
    if(empty($username) || empty($pword) || empty($cpword)) {
        header("location: ../signup.php?signup=empty");
        exit();
    }

    //check if the password matches
    if($pword !== $cpword) {
        header("location: ../signup.php?signup=pwordNotMatched");
        exit();
    }

    //check if user exists
    if(userExist($conn, $username)) {
        header("location: ../signup.php?signup=usernameExists");
        exit();
    }

    //Create the user on the database
    createUser($conn, $username, $pword);
}else {
    header("location: ../signup.php");
}