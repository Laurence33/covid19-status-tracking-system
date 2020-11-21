<?php
session_start();

if(!isset($_SESSION['userUid'])) {
    //not logged in
    exit();
}

$id = $_GET['id'];
$type = $_GET['type'];
$prov_code = $_GET['prov_code'];
$citymun_code = $_GET['citymun_code'];
$brgy_code = $_GET['brgy_code'];

include '../../includes/dbh.inc.php';
include 'admin-functions.inc.php';

if(!$res = deleteRecord($conn, $id, $type)) {
    //error occured
    header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&delete=error");
}else {
    header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&delete=success");
}
