<div class="container-fluid d-flex">
    <span class="top-3-num"> <?php echo $num; $num++; ?> </span>
    <div class="container-fluid">
        <h5 class="text-left"><?php echo $row[$desc] ?> </h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="grid mt-2 mb-3">
                    <div class="row">
                        <div class="col md-2">
                            <h6>Total Cases</h6>
                            <p><?php echo $row['num_cases'] ?> </p>
                        </div>
                        <div class="col md-2">
                            <h6>Active Cases</h6>
                            <p><?php echo $row['num_active'] ?> </p>
                        </div>
                        <div class="col md-2">
                            <h6>Recovered</h6>
                            <p><?php echo $row['num_recoveries'] ?> </p>
                        </div>
                        <div class="col md-2">
                            <h6>Deaths</h6>
                            <p><?php echo $row['num_deaths'] ?> </p>
                        </div>
                        <div class="col md-2">
                            <a href="<?php echo $link.$row[$code] ?>" class="btn btn-lg btn-outline-primary">View</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<hr>