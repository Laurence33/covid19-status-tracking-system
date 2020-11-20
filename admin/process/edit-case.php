<?php 
    if(!isset($_POST['edit-case'])) {
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../../includes/dbh.inc.php';
    include 'admin-functions.inc.php';

    $prov_code = $_POST['prov_code'];
    $citymun_code = $_POST['citymun_code'];
    $brgy_code = $_POST['brgy_code'];

    $res = editCase($conn, $_POST['id'], $_POST['status'], $_POST['age'], $_POST['fname'], $_POST['lname'], $prov_code, $citymun_code, $brgy_code);
    if(!$res) {
        header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&editCase=error");
        exit();
    }else {
        header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&editCase=success");
        exit();
    }
?>