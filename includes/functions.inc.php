<?php

function createUser($conn, $username, $pword) {
    $sql = "INSERT INTO tbl_users(username, password) values ( ?, ?);"; //actual sql statment
    $stmt = mysqli_stmt_init($conn); //init the prepared statement

    if(!mysqli_stmt_prepare($stmt, $sql)) { #check if the SQL will run
        //There's an error
        header("location: ../signup.php?signup=stmtError");
        exit();
    }

    $hashedPwd = password_hash($pword, PASSWORD_DEFAULT); //ecrypt the password by hashing

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd); #bind the params
    mysqli_stmt_execute($stmt); #run Query
    mysqli_stmt_close($stmt); //close the statement
    header("location: ../signup.php?signup=success");
}

function userExist($conn, $username) {
    $sql = "SELECT * FROM tbl_users WHERE username = ?;"; //actual sql statment
    $stmt = mysqli_stmt_init($conn); //init the prepared statement

    if(!mysqli_stmt_prepare($stmt, $sql)) { #check if the SQL will run
        //There's an error
        header("location: ../signup.php?signup=stmtError");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username); #bind the params
    mysqli_stmt_execute($stmt); #run Query

    $resultsData = mysqli_stmt_get_result($stmt); //get the results and store on the $resultsData variable

    if($row = mysqli_fetch_assoc($resultsData)) {
        return $row; //the username exists
    }else {
        return false; //the username is available
    }

    mysqli_stmt_close($stmt); //close the statement
}

function loginUser($conn, $username, $pword) {
    $userExists = userExist($conn, $username); // Call the function to check if the user exists in the database

    if($userExists === false) { // If the user does not exist
        header("location: ../login.php?login=error"); // Redirect to login page and show and error.
        exit(); // stop executing script
    }

    // If user exists, perform checks
    $pwdHashed = $userExists['password']; // the actual hashed password from the database
    $checkPassword = password_verify($pword, $pwdHashed); // compare the hashed password and the password inputted by the user on the login page
    
    if($checkPassword == false) { // If the password does not match
        header("location: ../login.php?login=wongpass"); // redirect to login page and show error
        exit(); //stop executing script
    }else if( $checkPassword == true) { // If the username and password matches with a record on the database, the login is successful
        session_start(); // Start a session, to know who is logged in
        $_SESSION['username'] = $userExists['username']; // save the username on the seesion
        $_SESSION['userUid'] = $userExists['id']; // save the user ID in the session, just in case we will be needing it in the future
        header("location: ../admin"); // finally, redirect the user to the admin home page.
        exit(); // stop executing script
    }

}