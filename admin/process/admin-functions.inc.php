<?php
function getRecord($conn, $id, $table) {
    $sql = "SELECT * FROM $table WHERE id = $id;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    $row = mysqli_fetch_array($result);
    return $row;
}
function getColumn($status) {
    if($status == "Active"){
        return "num_active";
    }else if($status == "Recovery") {
        return "num_recoveries";
    }else if($status == "Death") {
        return "num_deaths";
    }else {
        return null;
    }
}

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
    updateRecord($conn, "tbl_brgy", "brgy_code", $brgy_code, $column, +1);
    //increment count for cases on table Barangay
    updateRecord($conn, "tbl_brgy", "citymun_code", $citymun_code, "num_cases", +1);

    //increment count for specific status on table CityMun
    updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, $column, +1);
    //increment count for cases on table CityMun
    updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, "num_cases", +1);

    //increment count for specific status on table Province
    updateRecord($conn, "tbl_province", "prov_code", $prov_code, $column, +1);
    //increment count for cases on table Province
    updateRecord($conn, "tbl_province", "prov_code", $prov_code, "num_cases", +1);

    $reg_code = getRegionCode($conn, $prov_code); //get the region to be able to also update
    //increment count for specific status on table Region
    updateRecord($conn, "tbl_region", "reg_code", $reg_code, $column, +1);
    //increment count for cases on table Region
    updateRecord($conn, "tbl_region", "reg_code", $reg_code, "num_cases", +1);

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

    $column = getColumn($status);

    $prev_status = getRecordStatus($conn, $id, "tbl_case");
    $prev_column = getColumn($prev_status);
    mysqli_autocommit($conn, false);
    $reg_code = getRegionCode($conn, $prov_code);
    //reduce count on prev_column
    updateRecord($conn, "tbl_brgy", "brgy_code", $brgy_code, $prev_column, -1);
    updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, $prev_column, -1);
    updateRecord($conn, "tbl_province", "prov_code", $prov_code, $prev_column, -1);
    updateRecord($conn, "tbl_region", "reg_code", $reg_code, $prev_column, -1);

    //add count on column
    updateRecord($conn, "tbl_brgy", "brgy_code", $brgy_code, $column, +1);
    updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, $column, +1);
    updateRecord($conn, "tbl_province", "prov_code", $prov_code, $column, +1);
    updateRecord($conn, "tbl_region", "reg_code", $reg_code, $column, +1);


    $sql = "UPDATE tbl_case SET status = '$status', age = $age, fname = '$fname', lname = '$lname' WHERE id = $id;"; //actual sql statment
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, false);
        exit(mysqli_error($conn));
    }

    if(!mysqli_commit($conn)){
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, false);
        exit(mysqli_error($conn));
    }

    mysqli_autocommit($conn, false);
    return $result;
}

function editSur($conn, $id, $status, $age, $fname, $lname, $prov_code, $citymun_code, $brgy_code) {
    if($status == "Confirmed") {
        mysqli_autocommit($conn, false);

        // delete the record on tbl_sur
        deleteRecord($conn, $id, "Surveillance");

        // reduce num_suveillances
        updateRecord($conn, "tbl_brgy", "brgy_code", $brgy_code, "num_surveillances", -1);
        updateRecord($conn, "tbl_citymun", "citymun_code", $citymun_code, "num_surveillances", -1);
        updateRecord($conn, "tbl_province", "prov_code", $prov_code, "num_surveillances", -1);
        $reg_code = getRegionCode($conn, $prov_code);
        updateRecord($conn, "tbl_region", "reg_code", $reg_code, "num_surveillances", -1);

        // add the case to tbl_cases using addCase()
        if(!$result = addCase($conn, $prov_code, $citymun_code, $brgy_code, "Active", $fname, $lname, $age)) {
            //error
            mysqli_rollback($conn);
            mysqli_autocommit($conn, true);
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
    $sql = "UPDATE tbl_sur SET status = '$status', age = $age, fname = '$fname', lname = '$lname' WHERE id = $id;"; //actual sql statment
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    return $result;
}

function deleteRecord($conn, $id, $type) {
    mysqli_autocommit($conn, false);

    if($type == "Case") {
        $table = "tbl_case";
        $case = getRecord($conn, $id, $table);
        $column = getColumn($case['status']);
        
        // reduce nums on tables
        updateRecord($conn, "tbl_brgy", "brgy_code", $case['brgy_code'], $column, -1);
        updateRecord($conn, "tbl_brgy", "brgy_code", $case['brgy_code'], "num_cases", -1);
        updateRecord($conn, "tbl_citymun", "citymun_code", $case['citymun_code'], $column, -1);
        updateRecord($conn, "tbl_citymun", "citymun_code", $case['citymun_code'], "num_cases", -1);
        updateRecord($conn, "tbl_province", "prov_code", $case['prov_code'], $column, -1);
        updateRecord($conn, "tbl_province", "prov_code", $case['prov_code'], "num_cases", -1);
        $reg_code = getRegionCode($conn, $case['prov_code']);
        updateRecord($conn, "tbl_region", "reg_code", $reg_code, $column, -1);
        updateRecord($conn, "tbl_region", "reg_code", $reg_code, "num_cases", -1);

    }else if($type == "Surveillance"){
        $table = "tbl_sur";
        $sur = getRecord($conn, $id, $table);
        
        // reduce nums on tables
        updateRecord($conn, "tbl_brgy", "brgy_code", $sur['brgy_code'], "num_surveillances", -1);
        updateRecord($conn, "tbl_citymun", "citymun_code", $sur['citymun_code'], "num_surveillances", -1);
        updateRecord($conn, "tbl_province", "prov_code", $sur['prov_code'], "num_surveillances", -1);
        $reg_code = getRegionCode($conn, $sur['prov_code']);
        updateRecord($conn, "tbl_region", "reg_code", $reg_code, "num_surveillances", -1);
    }

    $sql = "DELETE FROM $table WHERE id = $id;";
    if(!$result = mysqli_query($conn, $sql)) {
        //error
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    if(!mysqli_commit($conn)) {
        mysqli_rollback($conn);
        mysqli_autocommit($conn, true);
        exit(mysqli_error($conn));
    }

    mysqli_autocommit($conn, true);
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