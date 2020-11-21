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


<!-- Add Case Modal -->
<form action="process/add-case.php" method="POST">
    <div class="modal fade" id="addCaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalTitle">Add Case</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="addCaseSelectStatus" name="status">
                        <!-- <option selected>Choose...</option> -->
                        <option value="Active">Active</option>
                        <option value="Recovery">Recovery</option>
                        <option value="Death">Death</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addCaseSelectStatus">Status</label>
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
                    <select class="custom-select" id="addCaseSelectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addCaseSelectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="addCaseSelectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addCaseSelectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="addCaseSelectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addCaseSelectBrgy">Brgy</label>
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
                    <select class="custom-select" id="addSurSelectStatus" name="status">
                        <!-- <option selected>Choose...</option> -->
                        <option value="Suspect">Suspect</option>
                        <option value="Probable">Probable</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Contact">Contact</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSurSelectStatus">Status</label>
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
                    <select class="custom-select" id="addSurSelectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSurSelectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="addSurSelectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSurSelectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="addSurSelectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="addSurSelectBrgy">Brgy</label>
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

<!-- Edit Case/Surveillance Modal -->
<form action="changed with JQuery" method="POST" id="edit-form">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalTitle">This will be changed with the JQuery</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="editSelectStatus" name="status">
                        <!-- <option selected>Choose...</option> -->
                        <!-- <option value="Active">Active</option>
                        <option value="Recovery">Recovery</option>
                        <option value="Death">Death</option> -->
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectStatus">Status</label>
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
                    <select class="custom-select" id="editSelectProvince" disabled>
                        <option><?php echo $address['prov_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectProvince">Province</label>
                    </div>
                </div>
            </div>
                <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $citymun_code ?>" name="citymun_code">
                    <select class="custom-select" id="editSelectCitymun" disabled>
                        <option><?php echo $address['citymun_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
                <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <input type="hidden" value="<?php echo $brgy_code ?>" name="brgy_code">
                    <select class="custom-select" id="editSelectBrgy" disabled>
                        <option><?php echo $address['brgy_desc'] ?></option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="editSelectBrgy">Brgy</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <a href="" id="delete-link" class="btn btn-link text-danger">Delete</a>
                <button type="submit" id="edit-submit-button" name="changed with JQuery" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
    </div>
</form>

<input type="text" disabled>

<?php
    include 'footer.php';
?>

<script>

    function getCaseDetails(id, status, age, fname, lname, type) {
        $('input[name=id]').val(id);
        $('input[name="age"]').val(age);
        $('input[name="fname"]').val(fname);
        $('input[name="lname"]').val(lname);
        $("#hiddenid").val(id);
        $('#editModalTitle').text("Edit " + type);
        $("#delete-link").attr('href', 'process/delete-record.php?id=' + id + '&type=' + type + '<?php echo '&prov_code='.$prov_code.'&citymun_code='.$citymun_code.'&brgy_code='.$brgy_code?>');
        if(type == "Case") {
            $('#edit-submit-button').attr('name', 'edit-case');
            $('#edit-form').attr('action', 'process/edit-case.php');
            $("#editSelectStatus").empty();
            $("#editSelectStatus").append('<option value="Active">Active</option><option value="Recovery">Recovery</option><option value="Death">Death</option>');
        }else if(type = "Surveillance") {
            $('#edit-submit-button').attr('name', 'edit-sur');
            $('#edit-form').attr('action', 'process/edit-sur.php');
            $("#editSelectStatus").empty();
            $("#editSelectStatus").append('<option value="Suspect">Suspect</option><option value="Probable">Probable</option><option value="Confirmed">Confirmed</option><option value="Contact">Contact</option>');
        }
        $('select[name="status"]').val(status);
    }

</script>