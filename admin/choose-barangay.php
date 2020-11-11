<?php
    include 'header.php';
?>

<?php
    if(!isset($_GET['reg_code']) || !isset($_GET['prov_code']) || !isset($_GET['citymun_code'])){
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $reg_code = $_GET['reg_code'];
    $prov_code = $_GET['prov_code'];
    $citymun_code = $_GET['citymun_code'];

    $brgyRes = getBarangays($conn, $citymun_code);
    if(!$brgyRes) {
        echo "eroorororor";
        echo '<h1>Error on getting Barangays.</h1>';
        exit();
    }
?>



<div class="container">
    <div class="row justify-content-md-center mt-3">
        <?php
            while($row = mysqli_fetch_array($brgyRes)) {
        ?>
        <div class="card bg-light mb-3 m-3" style="max-width: 18rem;">
            <div class="card-header">Barangay</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['brgy_desc'] ?></h5>
                <p class="card-text">Put the records here</p>
                <ul class="card-body list-group list-group-flush">
                    <li class="list-group-item card-text">Cases: <?php echo $row['num_cases']?></li>
                    <li class="list-group-item card-text">Surveillances: <?php echo $row['num_surveillances']?></li>
                </ul>
            </div>
            <div class="card-footer text-right">
                <a href="barangay.php?prov_code=<?php echo $prov_code?>&citymun_code=<?php echo $citymun_code ?>&brgy_code=<?php echo $row['brgy_code'] ?>" class="btn btn-link">View Records</a>
            </div>
        </div>
        <?php
            }
        ?>

    </div>
</div>

<?php
include 'footer.php';
?>