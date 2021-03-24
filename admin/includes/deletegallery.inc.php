<?php
include_once 'dbh.inc.php';


$directory = $_POST['deletegal'];

$path = "../$directory";

if (!unlink($path)) {
    echo "You have an error!";
} else {
    echo "You have deleted the file!";
    header("location: ../gallery?deletesuccess");
}
