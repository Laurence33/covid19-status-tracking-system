<?php
    include 'header.php';
?>

<?php
    if(!isset($_GET['reg_code']) || !isset($_GET['prov_code']) || !isset($_GET['citymun_code'])){
        echo '<h1>Access Violation.</h1>';
        exit();
    }

    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $reg_code = $_GET['reg_code'];
    $prov_code = $_GET['prov_code'];
    $citymun_code = $_GET['citymun_code'];

    $brgyRes = getBarangays($conn, $citymun_code);
    if(!$brgyRes) {
        echo "eroorororor";
        echo '<h1>Error on getting Barangays.</h1>';
        exit();
    }
?>



<div class="container">
    <div class="row justify-content-md-center mt-3">
        <?php
            while($row = mysqli_fetch_array($brgyRes)) {
        ?>
        <div class="card bg-light mb-3 m-3" style="max-width: 18rem;">
            <div class="card-header">Barangay</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['brgy_desc'] ?></h5>
                <p class="card-text">Put the records here</p>
                <ul class="card-body list-group list-group-flush">
                    <li class="list-group-item card-text">Cases: <?php echo $row['num_cases']?></li>
                    <li class="list-group-item card-text">Surveillances: <?php echo $row['num_surveillances']?></li>
                </ul>
            </div>
            <div class="card-footer text-right">
                <a href="" class="btn btn-link">View Records</a>
                <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add New</button>
            </div>
        </div>
        <?php
            }
        ?>

    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Case
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <!-- Status Select -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectStatus">
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
                <!-- Select Region -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectRegion">
                        <option value="Choose...">Choose...</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectRegion">Region</label>
                    </div>
                </div>
            </div>
            <!-- Select Province -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectProvince" disabled>
                        <option value="select">Choose...</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectProvince">Province</label>
                    </div>
                </div>
            </div>
            <!-- Select Citymun -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectCitymun" disabled>
                        <option value="select">Choose...</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectCitymun">City/Municipality</label>
                    </div>
                </div>
            </div>
            <!-- Select Barangay -->
            <div class="row">
                <div class="col input-group mb-3">
                    <select class="custom-select" id="selectBrgy" disabled>
                        <option value="select">Choose...</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="selectBrgy">Brgy</label>
                    </div>
                </div>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>