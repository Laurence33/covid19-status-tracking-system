<?php
    if(!$reg_code = $_POST['reg_code']) {
        //error
        exit("An error have occured.");
    }
    include "../../includes/functions.inc.php";
    include "../../includes/dbh.inc.php";

    
    if(!$provRes = getProvinces($conn, $reg_code)) {
        //error
        exit('Error getting provinces.');
    }
    while ($row = mysqli_fetch_assoc($provRes)) {
?>

<option value="<?php echo $row['prov_code']?> "><?php echo $row['prov_desc'] ?></option>

<?php 
    } // close while loop
?>