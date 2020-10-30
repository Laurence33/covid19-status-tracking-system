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
    $userExists = userExist($conn, $username);

    if($userExists === false) {
        header("location: ../login.php?login=error");
        exit();
    }

    $pwdHashed = $userExists['password'];
    $checkPassword = password_verify($pword, $pwdHashed);
    
    if($checkPassword == false) {
        header("location: ../login.php?login=wongpass");
        exit();
    }else if( $checkPassword == true) {
        session_start();
        $_SESSION['username'] = $userExists['username'];
        $_SESSION['userUid'] = $userExists['id'];
        header("location: ../admin");
        exit();
    }

}