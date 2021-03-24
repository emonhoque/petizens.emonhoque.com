<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "password";
$dbName = "petizens";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
