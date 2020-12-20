<?php
    if(!$citymun_code = $_POST['citymun_code']) {
        //error
        exit("An error have occured.");
    }
    include "../../includes/functions.inc.php";
    include "../../includes/dbh.inc.php";

    
    if(!$brgyRes = getBarangays($conn, $citymun_code)) {
        //error
        exit('Error getting Barangays.');
    }
    while ($row = mysqli_fetch_assoc($brgyRes)) {
?>

<option value="<?php echo $row['brgy_code']?> "><?php echo $row['brgy_desc'] ?></option>

<?php 
    } // close while loop
?>