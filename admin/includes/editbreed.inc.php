<?php
include_once 'dbh.inc.php';

$ID = mysqli_real_escape_string($conn, $_POST['breed_id']);
$Category = mysqli_real_escape_string($conn, $_POST['breed_category']);
$Name = mysqli_real_escape_string($conn, $_POST['breed_name']);
$Color = mysqli_real_escape_string($conn, $_POST['breed_color']);
$Details = mysqli_real_escape_string($conn, $_POST['breed_details']);
$Image = mysqli_real_escape_string($conn, $_POST['breed_img']);

if (isset($_POST['submit_breed'])) {
    $sql =  "UPDATE breed
SET breed_category='$Category',
    breed_name='$Name',
    breed_color='$Color',
    breed_details='$Details',
    breed_img='$Image'
WHERE breed_id='$ID';";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:../animalsbreeds?success");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    echo ' Please Check Your Query ';
};
