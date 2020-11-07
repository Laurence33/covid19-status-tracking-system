<?php
    include_once 'header.php';
    session_start();
?>

<?php
    include_once '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $caseRes = getLatestCases($conn);
    if(!$caseRes) {
        echo '<h1>An error occured while getting Cases</h1>';
        exit();
    }

    $surRes = getLatestSurveillances($conn);
    if(!$surRes) {
        echo '<h1>An error occured while getting Surveillances</h1>';
        exit();
    }
?>
<style>
    .pointer:hover {
        cursor: pointer;
    }
</style>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<h3>You have successfully logged in.</h3>

<h2>Latest Cases</h2>
<table class="table table-hover table-striped table-bordered table-sm">
    <thead class="thead-dark">
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
        <tr data-toggle="modal" data-target="#editModal" class="pointer"
            onclick=" getUserDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['lname'].', '.$row['fname'].' '.$row['mname']?>', 'Case');">
            <th><?php echo $row['id']; ?></th>
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
<h2>Latest Surveillances</h2>
<table class="table table-hover table-striped table-bordered table-sm">
    <thead class="thead-dark">
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
        <tr data-toggle="modal" data-target="#editModal" class="pointer"
            onclick=" getUserDetails(<?php echo $row['id']?>, '<?php echo $row['status']?>', '<?php echo $row['age']?>', '<?php echo $row['lname'].', '.$row['fname'].' '.$row['mname']?>', 'Case');">
            <th><?php echo $row['id']; ?></th>
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

<!-- Edit user Modal -->
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