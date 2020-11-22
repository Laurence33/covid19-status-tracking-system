<?php
    include 'header.php';
?>

<?php

    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';


    $prov_code = $_GET['prov_code'];
    $citymun_code = $_GET['citymun_code'];
    $brgy_code = $_GET['brgy_code'];

    $addressRes = getAddress($conn, $prov_code, $citymun_code, $brgy_code);

    if(!$addressRes) {
        echo '<h1>Error getting address.</h1>';
        exit();
    }

    $address = mysqli_fetch_array($addressRes);

    $caseRes = getCases($conn, $brgy_code);

    if(!$caseRes) {
        echo '<h1>Error getting cases.<h1>';
        exit();
    }

    $surRes = getSurveillances($conn, $brgy_code);

    if(!$surRes) {
        echo '<h1>Error getting surveillances.</h1>';
        exit();
    }
?>


<h2>Cases</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" 
  onclick="addModalToggle('Case')">
  Add New
</button>

<table class="table table-hover table-striped table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($caseRes)) {
        ?>
        <tr data-toggle="modal" data-target="#editModal" class="pointer"
            onclick=" getCaseDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['fname']?>', '<?php echo $row['lname']?>', 'Case');">
            <th><?php echo $row['id']; ?></th>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
        </tr>
        <?php
            } // Close while loop
        ?>
    </tbody>
</table>


<br><br><br>
<h2>Surveillances</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"
  onclick="addModalToggle('Surveillance')">
  Add New
</button>
<table class="table table-hover table-striped table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($surRes)) {
        ?>

        <tr data-toggle="modal" data-target="#editModal" class="pointer"
            onclick=" getCaseDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['fname']?>', '<?php echo $row['lname']?>', 'Surveillance');">
            <th><?php echo $row['id']; ?></th>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
        </tr>
        <?php
            } // Close while loop
        ?>
    </tbody>
</table>



<?php
    include 'modals/add-record-modal.php';
    include 'modals/edit-record-modal.php';
    include 'footer.php';
?>
