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

<span>
    <a href="region.php?code=reg_code">Region Description</a> <!-- get the reg code using joined tables-->
    >
    <a href="province.php?code=<?php echo $citymun['prov_code']; ?>">Province Description</a>
    >
    <?php echo $citymun['citymun_desc']; ?>
</span>

<br><br>
<section>
<h1><?php echo $citymun['citymun_desc']; ?></h1>
<h3>Cases: <?php echo $citymun['num_cases']; ?></h3>
<h3>Active Cases: <?php echo $citymun['num_active']; ?></h3>
<h3>Recoveries: <?php echo $citymun['num_recoveries']; ?></h3>
<h3>Deaths: <?php echo $citymun['num_deaths']; ?></h3>
<h3>Surveillances: <?php echo $citymun['num_surveillances']; ?></h3>
</section>

<br><br>
<h2>Barangays</h2>
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