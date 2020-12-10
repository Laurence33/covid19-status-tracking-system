<?php 
    include 'includes/dbh.inc.php';
    $sql = "SELECT * FROM tbl_region;";
    if(!$res = mysqli_query($conn, $sql)) {
        //error
        exit(mysqli_error($conn));
    }
    $num_cases = 0;
    $num_active = 0;
    $num_recoveries = 0;
    $num_deaths = 0;
    while($row = mysqli_fetch_assoc($res)) {
        $num_cases += $row['num_cases'];
        $num_active += $row['num_active'];
        $num_recoveries += $row['num_recoveries'];
        $num_deaths += $row['num_deaths'];
    }

?>
<div class="container-fluid text-center mt-4">
    <div class="container">
    <h2>Phillippines Case Overview</h2>
    <img src="img/ph-flag.svg" width="60px" height="30px" alt="PH Flag">
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="grid mt-4 mb-3">
            <div class="row">
                <div class="col md-3">
                    <h4>Total Cases</h4>
                    <p><?php echo $num_cases;?></p>
                </div>
                <div class="col md-3">
                    <h4>Active Cases</h4>
                    <p><?php echo $num_active; ?> </p>
                </div>
                <div class="col md-3">
                    <h4>Recovered</h4>
                    <p><?php echo $num_recoveries; ?></p>
                </div>
                <div class="col md-3">
                    <h4>Deaths</h4>
                    <p><?php echo $num_deaths; ?></p>
                </div>
            </div>
        </div>
        <a href="regions.php" class="btn btn-outline-primary">View Regions</a>

        </li>
    </ul>
</div>