<?php 
    include '../includes/dbh.inc.php';
    include '../includes/functions.inc.php';

    $regRes = getRegions($conn);
    if (!$regRes) {
        //error
        exit(mysqli_error($conn));
    }
    $provRes = getProvinces($conn, '01');
    if (!$provRes) {
        //error
        exit(mysqli_error($conn));
    }
    $citymunRes = getCitymuns($conn, '0128');
    if (!$citymunRes) {
        //error
        exit(mysqli_error($conn));
    }
    $brgyRes = getBarangays($conn, '012801');
    if (!$brgyRes) {
        //error
        exit(mysqli_error($conn));
    }
?>

<?php 
    include 'header.php';
?>
<div class="container grid mt-5">
    <h1 class="offset-md-3">Choose address:</h1>
    <div class="row mb-3">
        <div class="col-md-6 input-group offset-md-3">
            <select id="select-region" onchange="getProvinces()" class="custom-select custom-select-lg">
                <?php while($row = mysqli_fetch_assoc($regRes)) { ?>
                    <option value="<?php echo $row['reg_code'] ?>" > <?php echo $row['reg_desc'] ?> </option>
                <?php } ?>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="select-region">Region</label>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6 input-group offset-md-3">
            <select id="select-province" class="custom-select custom-select-lg" onchange="getCitymuns()">
                <?php while($row = mysqli_fetch_assoc($provRes)) { ?>
                    <option value="<?php echo $row['prov_code'] ?>" > <?php echo $row['prov_desc'] ?> </option>
                <?php } ?>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="select-province">Province</label>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6 input-group offset-md-3">
            <select id="select-citymun" class="custom-select custom-select-lg" onchange="getBrgys()">
                <?php while($row = mysqli_fetch_assoc($citymunRes)) { ?>
                    <option value="<?php echo $row['citymun_code'] ?>" > <?php echo $row['citymun_desc'] ?> </option>
                <?php } ?>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="select-citymun">City/Municipality</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6 input-group offset-md-3">
            <select id="select-brgy" class="custom-select custom-select-lg">
                <?php while($row = mysqli_fetch_assoc($brgyRes)) { ?>
                    <option value="<?php echo $row['brgy_code'] ?>" > <?php echo $row['brgy_desc'] ?> </option>
                <?php } ?>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="select-brgy">Barangay</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6 input-group offset-md-3 align-self-center">
            <button class="btn btn-outline-primary align-self-center">Load Records</button>
        </div>
    </div>

</div>


<?php
    include 'footer.php';
?>

<script>
    function getProvinces() {
       var region = $('#select-region').val();
       $.post("form-data/prov-options.php", {
           reg_code: region
       }, function(data, status) {
           $('#select-province').html(data);
       });
    }

    function getCitymuns() {
       var province = $('#select-province').val();
       $.post("form-data/citymun-options.php", {
           prov_code: province
       }, function(data, status) {
           $('#select-citymun').html(data);
       });
    }

    function getBrgys() {
       var citymun = $('#select-citymun').val();
       $.post("form-data/brgy-options.php", {
           citymun_code: citymun
       }, function(data, status) {
           $('#select-brgy').html(data);
       });
    }

    

</script>