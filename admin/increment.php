<?php

include '../includes/dbh.inc.php';
include 'process/admin-functions.inc.php';

updateRecord($conn, "tbl_brgy", "brgy_code", "012801001", "num_active", 1);