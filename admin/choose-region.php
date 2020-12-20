<?php
    include 'header.php';
?>
<?php
    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $regionRes = getRegions($conn);
    if(!$regionRes) {
        echo '<h1>Error on getting Regions</h1>';
        exit();
    }
?>

<div class="container">
    <div class="row justify-content-md-center mt-3">
        <?php
            while($row = mysqli_fetch_array($regionRes)) {
        ?>
        <div class="card mb-3 m-3" style="max-width: 18rem;">
            <div class="card-header"><?php echo $row['island_group']?></div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['reg_desc'] ?></h5>
                <!-- <p class="card-text">Put the records here</p> -->
                <ul class="card-body list-group list-group-flush">
                    <li class="list-group-item card-text">Cases: <?php echo $row['num_cases']?></li>
                    <li class="list-group-item card-text">Surveillances: <?php echo $row['num_surveillances']?></li>
                </ul>
            </div>
            <div class="card-footer text-right">
                <a href="choose-province.php?reg_code=<?php echo $row['reg_code']?>" class="btn btn-link">Select</a>
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