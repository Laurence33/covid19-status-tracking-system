<?php
    include '../../includes/dbh.inc.php';
    include '../../includes/functions.inc.php';

    $reg_code = $_POST['reg_code'];
    $provinceRes = getProvinces($conn, $reg_code);
    if(!$provinceRes) {
        echo '<h1>Error getting prvinces!</h1>';
        exit();
    }
?>
<!-- Select Province -->
<div class="row">
    <div class="col input-group mb-3">
        <select class="custom-select" id="selectProvince">
            <option value="Choose..." selected >Choose...</option>
            <?php
                while($row = mysqli_fetch_array($provinceRes)) {
            ?>
            <option value="<?php echo $row['prov_code']?>"> <?php echo $row['prov_desc'] ?> </option>
            <?php
                } //end of while loop
            ?>
        </select>
        <div class="input-group-append">
            <label class="input-group-text" for="selectProvince">Province</label>
        </div>
    </div>
</div>

<div id="replace">
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
</div>

