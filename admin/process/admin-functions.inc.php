<?php

function addCase($conn, $prov_code, $citymun_code, $brgy_code, $status, $fname, $lname, $age) {
    if ($status == 'Active') {
        $column = "num_active";
    }else if($status == 'Recovery') {
        $column = "num_recoveries";
    }else if($status == 'Death') {
        $column = "num_deaths";
    }

    mysqli_autocommit($conn, false); // turn off auto commit for transaction

    //increment count for specific status on table Barangay
    if(!$result = updateRecord($conn, "tbl_brgy", "brgy_code", $brgy_code, $column, +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }
    //increment count for cases on table Barangay
    if(!$result = updateRecord($conn, "tbl_brgy", "citymun_code", $citymun_code, "num_cases", +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    //increment count for specific status on table CityMun
    if(!$result = updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, $column, +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }
    //increment count for cases on table CityMun
    if(!$result = updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, "num_cases", +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    //increment count for specific status on table Province
    if(!$result = updateRecord($conn, "tbl_province", "prov_code", $prov_code, $column, +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    //increment count for cases on table Province
    if(!$result = updateRecord($conn, "tbl_province", "prov_code", $prov_code, "num_cases", +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    $reg_code = getRegionCode($conn, $prov_code); //get the region to be able to also update
    //increment count for specific status on table Region
    if(!$result = updateRecord($conn, "tbl_region", "reg_code", $reg_code, $column, +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }
    //increment count for cases on table Region
    if(!$result = updateRecord($conn, "tbl_region", "reg_code", $reg_code, "num_cases", +1)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    //insert the new record to the database
    $sql = "INSERT INTO `tbl_case` (status, brgy_code, citymun_code, prov_code, fname, lname, age) VALUES ('$status', '$brgy_code', '$citymun_code', '$prov_code', '$fname', '$lname', $age);";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    //finally commit the changes and return the result
    if(!mysqli_commit($conn)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    };

    mysqli_autocommit($conn, true);
    return $result;
}

function addSurveillance($conn, $prov_code, $citymun_code, $brgy_code, $status, $fname, $lname, $age) {
    mysqli_autocommit($conn, false);

    updateRecord($conn, "tbl_brgy", "brgy_code", $brgy_code, "num_surveillances", +1);
    updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, "num_surveillances", +1);
    updateRecord($conn, "tbl_province", "prov_code", $prov_code, "num_surveillances", +1);
    $reg_code = getRegionCode($conn, $prov_code);
    updateRecord($conn, "tbl_region", "reg_code", $reg_code, "num_surveillances", +1);

    
    $sql = "INSERT INTO `tbl_sur` (status, brgy_code, citymun_code, prov_code, fname, lname, age) VALUES ('$status', '$brgy_code', '$citymun_code', '$prov_code', '$fname', '$lname', $age);";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    if(!mysqli_commit($conn)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }
    return $result;
}

function editCase($conn, $id, $status, $age, $fname, $lname, $prov_code, $citymun_code, $brgy_code) {

    if($status == "Active") {
        $column = "num_active";
    }else if($status == "Recovery") {
        $column = "num_recoveries";
    }else if($status == "Death") {
        $column = "num_deaths";
    }else {
        return null;
    }

    $prev_status = getRecordStatus($conn, $id, "tbl_case");
    if($prev_status == "Active") {
        $prev_column = "num_active";
    }else if($prev_status == "Recovery") {
        $prev_column = "num_recoveries";
    }else if($prev_status == "Death") {
        $prev_column = "num_deaths";
    }else {
        return null;
    }


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

function getRegionCode($conn, $prov_code) {
    $sql = "SELECT reg_code FROM tbl_province WHERE prov_code = $prov_code;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    $row = mysqli_fetch_array($result);
    return $row['reg_code'];
}

function getRecordStatus($conn, $id, $table) {
    $sql = "SELECT status FROM $table WHERE id = $id;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    $row = mysqli_fetch_array($result);
    return $row['status'];
}

// Manipulating number records
function updateRecord($conn, $table, $code_name, $code, $column, $count) {
    if($count == 1) {
        $sql = "UPDATE $table SET $column = $column + 1 WHERE $code_name = '$code';";
    }else if($count == -1) {
        $sql = "UPDATE $table SET $column = $column - 1 WHERE $code_name = '$code';";
    }
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}