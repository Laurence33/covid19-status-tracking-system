<?php
session_start();

if(!session_destroy()) {
    echo "logout error";
}else {
    echo "logout success";
}

header("location: ../../");