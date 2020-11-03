<?php
    include_once 'header.php';
?>

<?php
    include_once 'includes/dbh.inc.php';
    include 'includes/functions.inc.php';

    $reg_code = $_GET['code'];
    $regionRes = getRegion($conn, $reg_code);
    if(!$regionRes) {
        echo '<h1>An error occured while getting regions</h1>';
        exit();
    }
    $region = mysqli_fetch_array($regionRes);

    $provinces = getProvinces($conn, $reg_code);
    if(!$provinces) {
        echo '<h1>An error occured while getting provinces</h1>';
        exit();
    }
?>

<section>
<h1><?php echo $region['reg_desc']; ?></h1>
<h3><?php echo $region['island_group']; ?></h3>
<h3>Active Cases: <?php echo $region['num_cases']; ?></h3>
<h3>Region: <?php echo $region['num_active']; ?></h3>
<h3>Recoveries: <?php echo $region['num_recoveries']; ?></h3>
<h3>Deaths: <?php echo $region['num_deaths']; ?></h3>
<h3>Surveillances: <?php echo $region['num_surveillances'] ?></h3>
</section>

<br><br>
<h2>Provinces</h2>
<table class="table table-hover">
    <thead>
        
        <tr>
            <th>ISO</th>
            <th>Province Description</th>
            <th>PSGC Code</th>
            <th>Cases</th>
            <th>Active Cases</th>
            <th>Recoveries</th>
            <th>Deaths</th>
            <th>Surveillances</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($row = mysqli_fetch_array($provinces)) {
        ?>
        <tr>
            <th><?php echo $row['iso']; ?></th>
            <td>
            <a href="province.php?code=<?php echo $row['prov_code']; ?>"><?php echo $row['prov_desc']; ?></a>
            </td>
            <td><?php echo $row['psgc_code']; ?></td>
            <td><?php echo $row['num_cases']; ?></td>
            <td><?php echo $row['num_active']; ?></td>
            <td><?php echo $row['num_recoveries']; ?></td>
            <td><?php echo $row['num_deaths']; ?></td>
            <td><?php echo $row['num_surveillances']; ?></td>
        </tr>
        <?php
            } // end the while loop
        ?>
    </tbody>
</table>

<?php   
    include_once 'footer.php';
?>