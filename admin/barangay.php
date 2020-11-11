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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCaseModal">
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
            onclick=" getUserDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['lname'].', '.$row['fname'].' '.$row['mname']?>', 'Case');">
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSurModal">
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
            onclick=" getUserDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['lname'].', '.$row['fname'].' '.$row['mname']?>', 'Surveillance');">
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


<!-- Add Case Modal -->
<form action="process/add-case.php" method="POST">
    <div class="modal fade" id="addCaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Case</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectStatus" name="status">
                        <option selected>Choose...</option>
                        <option value="Active">Active</option>
                        <option value="Recovery">Recovery</option>
                        <option value="Death">Death</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectStatus">Status</label>
                    </div>
                </div>
            </div>
            <!-- First name, Last name, age -->
            <div class="row">
                <div class="input-group mb-3">
                    <div class="col col-md-5">
                    <input type="text" class="form-control" placeholder="First name" name="fname">
                    </div>
                    <div class="col col-md-5">
                    <input type="text" class="form-control" placeholder="Last name" name="lname">
                    </div>
                    <div class="col col-md-2">
                    <input type="text" class="form-control" placeholder="Age" name="age">
                    </div>
                </div>
            </div>
            <!-- Address Select -->
                <!-- Select Province -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $prov_code?>"  name="prov_code">
                    <select class="custom-select" id="selectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="selectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="selectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectBrgy">Brgy</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add-case" class="btn btn-primary">Add record</button>
            </div>
        </div>
    </div>
    </div>
</form>

<!-- Add Surveillance Modal -->
<form action="process/add-sur.php" method="POST">
    <div class="modal fade" id="addSurModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Surveillance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectStatus" name="status">
                        <option selected>Choose...</option>
                        <option value="Suspect">Suspect</option>
                        <option value="Probable">Probable</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Contact">Contact</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectStatus">Status</label>
                    </div>
                </div>
            </div>
            <!-- First name, Last name, age -->
            <div class="row">
                <div class="input-group mb-3">
                    <div class="col col-md-5">
                    <input type="text" class="form-control" placeholder="First name" name="fname">
                    </div>
                    <div class="col col-md-5">
                    <input type="text" class="form-control" placeholder="Last name" name="lname">
                    </div>
                    <div class="col col-md-2">
                    <input type="text" class="form-control" placeholder="Age" name="age">
                    </div>
                </div>
            </div>
            <!-- Address Select -->
                <!-- Select Province -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $prov_code?>"  name="prov_code">
                    <select class="custom-select" id="selectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="selectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="selectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectBrgy">Brgy</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add-sur" class="btn btn-primary">Add record</button>
            </div>
        </div>
    </div>
    </div>
</form>


<?php
    include 'footer.php';
?>