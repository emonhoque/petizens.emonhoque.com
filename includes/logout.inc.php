<?php
include_once 'dbh.inc.php';

session_start();
$_SESSION['loggedin'] = false;

unset($_SESSION['id']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['username']);
unset($_SESSION['user_email']);
unset($_SESSION['user_verified']);
unset($_SESSION['message']);
unset($_SESSION['loggedin']);

session_destroy();
header('location: index?logoutsuccessful');
