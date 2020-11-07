<?php
    include 'header.php';
?>

<?php
    if(!isset($_GET['reg_code']) || !isset($_GET['prov_code'])){
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $reg_code = $_GET['reg_code'];
    $prov_code = $_GET['prov_code'];

    $citymunRes = getCitymuns($conn, $prov_code);
    if(!$citymunRes) {
        echo "eroorororor";
        echo '<h1>Error on getting Barangays.</h1>';
        exit();
    }
?>



<div class="container">
    <div class="row justify-content-md-center mt-3">
        <?php
            while($row = mysqli_fetch_array($citymunRes)) {
        ?>
        <div class="card bg-light mb-3 m-3" style="max-width: 18rem;">
            <div class="card-header">City/Municipality</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['citymun_desc'] ?></h5>
                <p class="card-text">Put the records here</p>
                <ul class="card-body list-group list-group-flush">
                    <li class="list-group-item card-text">Cases: <?php echo $row['num_cases']?></li>
                    <li class="list-group-item card-text">Surveillances: <?php echo $row['num_surveillances']?></li>
                </ul>
            </div>
            <div class="card-footer text-right">
                <a href="choose-barangay.php?reg_code=<?php echo $reg_code?>&prov_code=<?php echo $row['prov_code'] ?>&citymun_code=<?php echo $row['citymun_code']?>" class="btn btn-link">Add Record</a>
            </div>
        </div>
        <?php
            }
        ?>

    </div>
</div>
