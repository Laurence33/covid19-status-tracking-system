<?php
    if(!$prov_code = $_POST['prov_code']) {
        //error
        exit("An error have occured.");
    }
    include "../../includes/functions.inc.php";
    include "../../includes/dbh.inc.php";

    
    if(!$citymunRes = getCitymuns($conn, $prov_code)) {
        //error
        exit('Error getting city/municipalities.');
    }
    while ($row = mysqli_fetch_assoc($citymunRes)) {
?>

<option value="<?php echo $row['citymun_code']?> "><?php echo $row['citymun_desc'] ?></option>

<?php 
    } // close while loop
?>