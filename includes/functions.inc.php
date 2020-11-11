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

function getRegions($conn) {
    $sql = "SELECT * FROM tbl_region;";
    $resultsData = mysqli_query($conn, $sql);
    if(!$resultsData) {
        // There's an error
        return null;
    }else {
        return $resultsData;
    }
}
function getRegion($conn, $reg_code) {
    $sql = "SELECT * FROM tbl_region WHERE reg_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        // There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $reg_code);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        // Region not found
        return null;
    } else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getProvinces($conn, $reg_code) {
    $sql = "SELECT * FROM tbl_province WHERE reg_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        //There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $reg_code);
    mysqli_stmt_execute($stmt);
    
    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        return null;
    }else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getProvince($conn, $prov_code) {
    $sql = "SELECT * FROM tbl_province WHERE prov_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        // There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $prov_code);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        // Region not found
        return null;
    } else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getCitymuns($conn, $prov_code) {
    $sql = "SELECT * FROM tbl_citymun WHERE prov_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        //There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $prov_code);
    mysqli_stmt_execute($stmt);
    
    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        return null;
    }else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getCitymun($conn, $citymun_code) {
    $sql = "SELECT * FROM tbl_citymun WHERE citymun_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        // There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $citymun_code);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        // Region not found
        return null;
    } else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getBarangays($conn, $citymun_code) {
    $sql = "SELECT * FROM tbl_brgy WHERE citymun_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        //There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $citymun_code);
    mysqli_stmt_execute($stmt);
    
    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        return null;
    }else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getBarangay($conn, $brgy_code) {
    $sql = "SELECT * FROM tbl_brgy WHERE brgy_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        // There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $brgy_code);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        // Region not found
        return null;
    } else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getCases($conn, $brgy_code) {
    $sql = "SELECT * FROM tbl_case WHERE brgy_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        //There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $brgy_code);
    mysqli_stmt_execute($stmt);
    
    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        return null;
    }else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getSurveillances($conn, $brgy_code) {
    $sql = "SELECT * FROM tbl_sur WHERE brgy_code = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        //There's an error
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $brgy_code);
    mysqli_stmt_execute($stmt);
    
    $resultsData = mysqli_stmt_get_result($stmt);
    if(!$resultsData) {
        return null;
    }else {
        return $resultsData;
    }

    mysqli_stmt_close($stmt);
}

function getLatestCases($conn) {
    $sql = "SELECT * FROM tbl_case ORDER BY id DESC LIMIT 10;";
    $resultsData = mysqli_query($conn, $sql);
    if(!$resultsData) {
        // There's an error
        return null;
    }else {
        return $resultsData;
    }
}

function getLatestSurveillances($conn) {
    $sql = "SELECT * FROM tbl_sur ORDER BY id DESC LIMIT 10;";
    $resultsData = mysqli_query($conn, $sql);
    if(!$resultsData) {
        // There's an error
        return null;
    }else {
        return $resultsData;
    }
}

function getAddress($conn, $prov_code, $citymun_code, $brgy_code) {

    $sql = "SELECT tbl_province.prov_desc, tbl_citymun.citymun_desc, tbl_brgy.brgy_desc FROM tbl_province, tbl_citymun, tbl_brgy WHERE tbl_province.prov_code = $prov_code AND tbl_citymun.citymun_code = $citymun_code AND tbl_brgy.brgy_code = $brgy_code;";
    $resultsData = mysqli_query($conn, $sql);
    if(!$resultsData) {
        //Error
        return null;
    }else {
        return $resultsData;
    }
}

function addCase($conn, $prov_code, $citymun_code, $brgy_code, $status, $fname, $lname, $age) {
    $sql = "INSERT INTO `tbl_case` (status, brgy_code, citymun_code, prov_code, fname, lname, age) VALUES ('$status', '$brgy_code', '$citymun_code', '$prov_code', '$fname', '$lname', $age);";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }

    return $result;
}

function addSurveillance($conn, $prov_code, $citymun_code, $brgy_code, $status, $fname, $lname, $age) {
    $sql = "INSERT INTO `tbl_sur` (status, brgy_code, citymun_code, prov_code, fname, lname, age) VALUES ('$status', '$brgy_code', '$citymun_code', '$prov_code', '$fname', '$lname', $age);";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }

    return $result;
}
