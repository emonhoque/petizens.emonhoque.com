<?php
include_once 'dbh.inc.php';

$ID = mysqli_real_escape_string($conn, $_POST['editad_id']);
$Username = mysqli_real_escape_string($conn, $_POST['editad_admin']);
$Fname = mysqli_real_escape_string($conn, $_POST['editad_fname']);
$Lname = mysqli_real_escape_string($conn, $_POST['editad_lname']);
$Email = mysqli_real_escape_string($conn, $_POST['editad_email']);
$Phone = mysqli_real_escape_string($conn, $_POST['editad_phone']);
$Img = mysqli_real_escape_string($conn, $_POST['editad_img']);
$Desc = $_POST['editad_desc'];



$sql =  "UPDATE users
SET user_id='$ID', 
    username='$Username', 
    user_fname='$Fname', 
    user_lname='$Lname', 
    user_email='$Email',
    user_phone='$Phone',
    user_img='$Img',
    user_desc='$Desc'
WHERE user_id='$ID';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../user-details?success");
} else {
    echo ' Replace 1 apostrophes with 2 apostrophes please ';
}
