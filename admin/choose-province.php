<?php
    include 'header.php';
?>

<?php
    if(!isset($_GET['reg_code'])){
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $reg_code = $_GET['reg_code'];
    $provinceRes = getProvinces($conn, $reg_code);
    if(!$provinceRes) {
        echo '<h1>Error on getting Provinces.</h1>';
        exit();
    }
?>



<div class="container">
    <div class="row justify-content-md-center mt-3">
        <?php
            while($row = mysqli_fetch_array($provinceRes)) {
        ?>
        <div class="card mb-3 m-3" style="max-width: 18rem;">
            <div class="card-header"><?php echo $row['iso']?></div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['prov_desc'] ?></h5>
                <!-- <p class="card-text">Put the records here</p> -->
                <ul class="card-body list-group list-group-flush">
                    <li class="list-group-item card-text">Cases: <?php echo $row['num_cases']?></li>
                    <li class="list-group-item card-text">Surveillances: <?php echo $row['num_surveillances']?></li>
                </ul>
            </div>
            <div class="card-footer text-right">
                <a href="choose-citymun.php?reg_code=<?php echo $reg_code?>&prov_code=<?php echo $row['prov_code'] ?>" class="btn btn-link">Select</a>
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