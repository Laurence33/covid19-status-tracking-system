<?php 
    if(!isset($_POST['add-record'])) {
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../../includes/dbh.inc.php';
    include 'admin-functions.inc.php';

    $type = $_POST['type'];
    $prov_code = $_POST['prov_code'];
    $citymun_code = $_POST['citymun_code'];
    $brgy_code = $_POST['brgy_code'];
    
    if($type == "Case") {
        $res = addCase($conn, $prov_code, $citymun_code, $brgy_code, $_POST['status'], $_POST['fname'], $_POST['lname'], $_POST['age']);
    }elseif($type == "Surveillance") {
        $res = addSurveillance($conn, $prov_code, $citymun_code, $brgy_code, $_POST['status'], $_POST['fname'], $_POST['lname'], $_POST['age']);
    }
    if(!$res) {
        header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&add$type=error");
        exit();
    }else {
        header("location: ../barangay.php?prov_code=$prov_code&citymun_code=$citymun_code&brgy_code=$brgy_code&add$type=success");
        exit();
    }
?>
