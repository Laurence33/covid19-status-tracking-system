<?php
    include_once 'header.php';
?>

<?php
    include_once 'includes/dbh.inc.php';
    include 'includes/functions.inc.php';

    $citymun_code = $_GET['code'];
    $citymunRes = getCitymun($conn, $citymun_code);
    if(!$citymunRes) {
        echo '<h1>An error occured while getting City/Municipality</h1>';
        exit();
    }
    $citymun = mysqli_fetch_array($citymunRes);

    $brgyRes = getBarangays($conn, $citymun_code);
    if(!$brgyRes) {
        echo '<h1>An error occured while getting Barangays</h1>';
        exit();
    }
?>
<div class="container-fluid text-center mt-4">
    <div class="container">
    <h2 > <?php echo $citymun['citymun_desc'] ?> </h2>
    <h6 class="text-secondary"> City/Municipality </h6>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="grid mt-4 mb-3">
            <div class="row">
                <div class="col md-3">
                    <h4>Total Cases</h4>
                    <p><?php echo $citymun['num_cases'] ;?></p>
                </div>
                <div class="col md-3">
                    <h4>Active Cases</h4>
                    <p><?php echo $citymun['num_active'] ; ?> </p>
                </div>
                <div class="col md-3">
                    <h4>Recovered</h4>
                    <p><?php echo $citymun['num_recoveries'] ; ?></p>
                </div>
                <div class="col md-3">
                    <h4>Deaths</h4>
                    <p><?php echo $citymun['num_deaths'] ; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col md-12">
                    <h4>Surveillances</h4>
                    <p><?php echo $citymun['num_surveillances'] ; ?></p>
                </div>
            </div>
        </div>
        </li>
    </ul>
</div>
<div class="container-fluid bg-dark text-center pt-3 pb-3 mb-4">
    <h2 class="text-white">Barangays</h2>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Description</th>
            <th>Barangay Code</th>
            <th>Cases</th>
            <th>Active Cases</th>
            <th>Recoveries</th>
            <th>Deaths</th>
            <th>Surveillances</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_array($brgyRes)) {
        ?>
        <tr>
            <td>
            <a href="barangay.php?code=<?php echo $row['brgy_code']; ?>"><?php echo $row['brgy_desc']; ?></a>
            </td>
            <td><?php echo $row['brgy_code']; ?></td>
            <td><?php echo $row['num_cases']; ?></td>
            <td><?php echo $row['num_active']; ?></td>
            <td><?php echo $row['num_recoveries']; ?></td>
            <td><?php echo $row['num_deaths']; ?></td>
            <td><?php echo $row['num_surveillances']; ?></td>
        </tr>
        <?php
            } //close the while loop
        ?>
    </tbody>
</table>

<?php   
    include_once 'footer.php';
?>