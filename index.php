<?php
    include 'header.php';
?>
<?php
    include_once 'includes/dbh.inc.php';
    include 'includes/functions.inc.php';

    $regions = getRegions($conn);
    if(!$regions) {
        echo '<h1>An error occured while getting regions</h1>';
        exit();
    }
?>

<h1>COVID19 Status Tracking System</h1>

<br><br>
<h2>Regions</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Region Description</th>
            <th>PSGC Code</th>
            <th>Region Code</th>
            <th>Island Group</th>
            <th>Cases</th>
            <th>Active Cases</th>
            <th>Recoveries</th>
            <th>Deaths</th>
            <th>Surveillances</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_array($regions)){
        ?>
        <tr>
            <td>
            <a href="region.php?code=<?php echo $row['reg_code'] ?>"><?php echo $row['reg_desc'] ?></a>
            </td>
            <td><?php echo $row['psgc_code'] ?></td>
            <td><?php echo $row['reg_code'] ?></td>
            <td><?php echo $row['island_group'] ?></td>
            <td><?php echo $row['num_cases'] ?></td>
            <td><?php echo $row['num_active'] ?></td>
            <td><?php echo $row['num_recoveries'] ?></td>
            <td><?php echo $row['num_deaths'] ?></td>
            <td><?php echo $row['num_surveillances'] ?></td>
        </tr>
        <?php
            } // close the while loop
        ?>
    </tbody>
</table>

<?php
    include 'footer.php';
?>