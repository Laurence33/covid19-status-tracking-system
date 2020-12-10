<?php
    include "header.php";
?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 ">What is COVID-Check?</h1>
            <p class="lead">COVID-Check is a simple website that provides you accurate and updated <br> record on the current COVID19 cases and sureveillances <br> in the Philippines.</p>
        </div>
    </div>

<?php include 'includes/ph-case-overview.inc.php'; ?>

    <div class="container-fluid text-center pt-5 pb-5 bg-dark">
        <h2 class="text-white">Updated records on the fly!</h2>
        <h3 class="lead text-white mt-5 mb-5">We update our record in real-time, so you can check it out as much as you want. We also provide case overviews for each Region, Province, City/Municipality, and also Barangay! </h3>
    </div>
<?php
    include 'includes/highest-regions.inc.php';
    include "footer.php";
?>  