<?php 
    include 'header.php';
?>

<?php 
    include 'includes/dbh.inc.php';
    $sql = "SELECT * FROM tbl_region ORDER BY num_cases DESC;";
    if(!$res = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    $desc = 'reg_desc';
    $link = 'region.php?code=';
    $code = 'reg_code';
?>

<div class="containter-fluid text-center pt-5 pb-5">
    <h2 class="mb-5">Regions</h2>
    <div class="container-fluid">
        <?php
            $num = 1;
            while ($row = mysqli_fetch_assoc($res)) {
                include 'includes/status.inc.php';
            } //close while loop ?>
    </div>
</div>

<?php 
    include 'footer.php';
?>