<?php

function addCase($conn, $prov_code, $citymun_code, $brgy_code, $status, $fname, $lname, $age) {
    
    mysqli_autocommit($conn, false); // turn off auto commit for transaction

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

function editCase($conn, $id, $status, $age, $fname, $lname, $prov_code, $citymun_code, $brgy_code) {
    $sql = "UPDATE tbl_case SET status = '$status', age = $age, fname = '$fname', lname = '$lname' WHERE id = $id;"; //actual sql statment
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}

function editSur($conn, $id, $status, $age, $fname, $lname, $prov_code, $citymun_code, $brgy_code) {
    $sql = "UPDATE tbl_sur SET status = '$status', age = $age, fname = '$fname', lname = '$lname' WHERE id = $id;"; //actual sql statment
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}

function deleteRecord($conn, $id, $type) {
    if($type == "Case") {
        $table = "tbl_case";
    }else if($type == "Surveillance"){
        $table = "tbl_sur";
    }

    $sql = "DELETE FROM $table WHERE id = $id;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}

function getRegionCode($conn, $reg_code) {
    $sql = "SELECT reg_code FROM tbl_province WHERE reg_code = $reg_code;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}

function getCaseStatus($conn, $id) {
    $sql = "SELECT status FROM tbl_case WHERE id = $id;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}

function getSurStatus($conn, $id) {
    $sql = "SELECT status FROM tbl_sur WHERE id = $id;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}