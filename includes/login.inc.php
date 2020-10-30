<?php

if(!isset($_POST['login'])) {
    echo '<h3>Access Violation.</h3>';
    exit();
}
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$username = $_POST['uname'];
$pword = $_POST['pword'];

if(empty($username) || empty($pword)) {
    header("location: ../login.php?login=empty");
    exit();
}

loginUser($conn, $username, $pword);
