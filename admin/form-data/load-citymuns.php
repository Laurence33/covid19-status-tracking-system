<?php
    include '../../includes/dbh.inc.php';
    include '../../includes/functions.inc.php';

    $prov_code = $_POST['prov_code'];
    $citymunRes = getCitymuns($conn, $prov_code);
    if(!$citymunRes) {
        echo '<h1>Error getting provinces!</h1>';
        exit();
    }
?>
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


<div id="replace">
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