<?php
    include_once 'header.php';
?>

<?php
    include_once 'includes/dbh.inc.php';
    include 'includes/functions.inc.php';

    $prov_code = $_GET['code'];
    $provinceRes = getProvince($conn, $prov_code);
    if(!$provinceRes) {
        echo '<h1>An error occured while getting Province</h1>';
        exit();
    }
    $province = mysqli_fetch_array($provinceRes);

    $citymunRes = getCitymuns($conn, $prov_code);
    if(!$citymunRes) {
        echo '<h1>An error occured while getting City/Municipalities</h1>';
        exit();
    }
?>

<div class="container-fluid text-center mt-4">
    <div class="container">
    <h2 > <?php echo $province['prov_desc'] ?> </h2>
    <h6 class="text-secondary"> Province </h6>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="grid mt-4 mb-3">
            <div class="row">
                <div class="col md-3">
                    <h4>Total Cases</h4>
                    <p><?php echo $province['num_cases'] ;?></p>
                </div>
                <div class="col md-3">
                    <h4>Active Cases</h4>
                    <p><?php echo $province['num_active'] ; ?> </p>
                </div>
                <div class="col md-3">
                    <h4>Recovered</h4>
                    <p><?php echo $province['num_recoveries'] ; ?></p>
                </div>
                <div class="col md-3">
                    <h4>Deaths</h4>
                    <p><?php echo $province['num_deaths'] ; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col md-12">
                    <h4>Surveillances</h4>
                    <p><?php echo $province['num_surveillances'] ; ?></p>
                </div>
            </div>
        </div>
        </li>
    </ul>
</div>
<div class="container-fluid bg-dark text-center pt-3 pb-3 mb-4">
    <h2 class="text-white">Cities/Municipalities</h2>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Description</th>
            <th>PSGC Code</th>
            <th>Region</th>
            <th>Cases</th>
            <th>Active Cases</th>
            <th>Recoveries</th>
            <th>Deaths</th>
            <th>Surveillances</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_array($citymunRes)) {
        ?>
        <tr>
            <td>
            <a href="citymun.php?code=<?php echo $row['citymun_code']; ?>"><?php echo $row['citymun_desc']; ?></a>
            </td>
            <td><?php echo $row['psgc_code']; ?></td>
            <td><?php echo $row['reg_desc']; ?></td>
            <td><?php echo $row['num_cases']; ?></td>
            <td><?php echo $row['num_active']; ?></td>
            <td><?php echo $row['num_recoveries']; ?></td>
            <td><?php echo $row['num_deaths']; ?></td>
            <td><?php echo $row['num_surveillances']; ?></td>
        </tr>
        <?php 
            } // end of while loop
        ?>
    </tbody>
</table>

<?php   
    include_once 'footer.php';
?>