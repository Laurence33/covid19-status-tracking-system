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

<span>
    <a href="region.php?code=<?php echo $province['reg_code']; ?>">Region Description</a>
    > <?php echo $province['iso']; ?>
</span>

<br><br>
<section>
<h1><?php echo $province['prov_desc']; ?></h1>
<h3>Cases: <?php echo $province['num_cases']; ?></h3>
<h3>Active Cases: <?php echo $province['num_active']; ?></h3>
<h3>Recoveries: <?php echo $province['num_recoveries']; ?></h3>
<h3>Deaths: <?php echo $province['num_deaths']; ?></h3>
<h3>Surveillances: <?php echo $province['num_surveillances']; ?></h3>
</section>

<br><br>
<h2>City/Municipalities</h2>
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