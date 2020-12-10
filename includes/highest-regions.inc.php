<?php 
    include 'includes/dbh.inc.php';
    $sql = "SELECT * FROM tbl_region ORDER BY num_cases DESC LIMIT 3;";
    if(!$res = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    $desc = 'reg_desc';
    $link = 'region.php?code=';
    $code = 'reg_code';
?>

<div class="containter text-center pt-5 pb-5">
    <h2 class="mb-5">Regions with highest cases</h2>
    <div class="container">
        <?php
            $num = 1;
            while ($row = mysqli_fetch_assoc($res)) {
                include 'status.inc.php';
            } //close while loop ?>
    </div>
    <a href="regions.php" class="btn btn-link">View all Regions</a>
</div>