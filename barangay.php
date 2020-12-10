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
<div class="container-fluid text-center mt-4">
    <div class="container">
    <h2 > <?php echo $brgy['brgy_desc'] ?> </h2>
    <h6 class="text-secondary"> City/Municipality </h6>
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
<table class="table table-hover table-striped table-bordered table-sm">
    <thead class="thead">
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
            onclick=" getUserDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['lname'].', '.$row['fname'].' '?>', 'Case');">
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
<table class="table table-hover table-striped table-bordered table-sm">
    <thead class="thead">
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
            onclick=" getUserDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['lname'].', '.$row['fname'].' '?>', 'Surveillance');">
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

<!-- View user Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="status" name="status">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="age" class="col-sm-2 col-form-label">Age: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="age" name="age">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="name" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <div id="result">
                        <input type="hidden" id="hiddenid" name="hiddenID">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   
    include_once 'footer.php';
?>

<script>

    function getUserDetails(id, status, age, name, type) {
        $('input[name="status"]').val(status);
        $('input[name="age"]').val(age);
        $('input[name="name"]').val(name);
        $("#hiddenid").val(id);
        $('#exampleModalLabel').text(type + " Detail");
    }

</script>