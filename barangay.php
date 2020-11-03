<?php
    include_once 'header.php';
?>

<?php
    include_once 'includes/dbh.inc.php';
    include 'includes/functions.inc.php';

    $brgy_code = $_GET['code'];
    $brgyRes = getBarangay($conn, $brgy_code);
    if(!$brgyRes) {
        echo '<h1>An error occured while getting Barangay</h1>';
        exit();
    }
    $brgy = mysqli_fetch_array($brgyRes);

    $caseRes = getCases($conn, $brgy_code);
    if(!$caseRes) {
        echo '<h1>An error occured while getting Cases</h1>';
        exit();
    }

    $surRes = getSurveillances($conn, $brgy_code);
    if(!$surRes) {
        echo '<h1>An error occured while getting Surveillances</h1>';
        exit();
    }
?>

<span>
    <a href="region.php/reg=<?php echo $brgy['reg_code']; ?>">Region Description</a>
    >
    <a href="province.php/code=<?php echo $brgy['prov_code']; ?>">Province Description</a>
    >
    <a href="citymun.php/code=<?php echo $brgy['citymun_code']; ?>">City/Mun Description</a>
    >
    <?php echo $brgy['brgy_desc']; ?>
</span>

<br><br>
<section>
<h1><?php echo $brgy['brgy_desc']; ?></h1>
<h3>Cases: <?php echo $brgy['num_cases']; ?></h3>
<h3>Active Cases: <?php echo $brgy['num_active']; ?></h3>
<h3>Recoveries: <?php echo $brgy['num_recoveries']; ?></h3>
<h3>Deaths: <?php echo $brgy['num_deaths']; ?></h3>
<h3>Surveillances: <?php echo $brgy['num_surveillances']; ?></h3>
</section>

<br><br>
<h2>Cases</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($caseRes)) {
        ?>
        <tr>
            <th>
            <a href=""><?php echo $row['id']; ?></a>
            </th>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['mname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
        </tr>
        <?php
            } // Close while loop
        ?>
    </tbody>
</table>

<br><br><br>
<h2>Surveillances</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($surRes)) {
        ?>
        <tr>
            <th>
            <a href=""><?php echo $row['id']; ?></a>
            </th>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['mname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
        </tr>
        <?php
            } // Close while loop
        ?>
    </tbody>
</table>

<?php   
    include_once 'footer.php';
?>