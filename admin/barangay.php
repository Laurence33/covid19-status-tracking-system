<?php
    include 'header.php';
?>

<?php

    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';


    $prov_code = $_GET['prov_code'];
    $citymun_code = $_GET['citymun_code'];
    $brgy_code = $_GET['brgy_code'];

    if(!$brgyRes = getBarangay($conn, $brgy_code)) {
        //error
        exit(mysqli_error($conn));
    }
    $brgy = mysqli_fetch_assoc($brgyRes);


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

<div class="container-fluid text-center mt-4">
    <div class="container">
    <h2 > <?php echo $brgy['brgy_desc'] ?> </h2>
    <h6 class="text-secondary"> Barangay </h6>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="grid mt-4 mb-3">
            <div class="row">
                <div class="col md-3">
                    <h4>Total Cases</h4>
                    <p><?php echo $brgy['num_cases'] ;?></p>
                </div>
                <div class="col md-3">
                    <h4>Active Cases</h4>
                    <p><?php echo $brgy['num_active'] ; ?> </p>
                </div>
                <div class="col md-3">
                    <h4>Recovered</h4>
                    <p><?php echo $brgy['num_recoveries'] ; ?></p>
                </div>
                <div class="col md-3">
                    <h4>Deaths</h4>
                    <p><?php echo $brgy['num_deaths'] ; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col md-12">
                    <h4>Surveillances</h4>
                    <p><?php echo $brgy['num_surveillances'] ; ?></p>
                </div>
            </div>
        </div>
        </li>
    </ul>
</div>

<div class="container-fluid bg-dark text-center pt-3 pb-3 mb-4">
    <h2 class="text-white">Cases</h2>
</div>

<div class="container text-center mb-4">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal" 
    onclick="addModalToggle('Case')">
    Add New
    </button>
</div>


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


<div class="container-fluid bg-dark text-center pt-3 pb-3 mb-4 mt-5">
    <h2 class="text-white">Surveillances</h2>
</div>
<div class="container text-center mb-4">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal"
      onclick="addModalToggle('Surveillance')">
      Add New
    </button>
</div>
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
