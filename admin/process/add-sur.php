<?php 
    if(!isset($_POST['add-sur'])) {
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../../includes/dbh.inc.php';
    include '../../includes/functions.inc.php';

    $prov_code = $_POST['prov_code'];
    $citymun_code = $_POST['citymun_code'];
    $brgy_code = $_POST['brgy_code'];

    $res = addSurveillance($conn, $prov_code, $citymun_code, $brgy_code, $_POST['status'], $_POST['fname'], $_POST['lname'], $_POST['age']);
    if(!$res) {
        header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&addCase=error");
        exit();
    }else {
        header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&addCase=success");
        exit();
    }
?>
