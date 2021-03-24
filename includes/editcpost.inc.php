<?php
include_once 'dbh.inc.php';

//Details
if (isset($_POST['edit_submit'])) {

    $ID = mysqli_real_escape_string($conn, $_POST['cpost_id']);
    $Caption = $_POST['cpost_caption'];

    $sql =  "UPDATE cposts
    SET cpost_caption='$Caption'
    WHERE cpost_id='$ID';";

    $result = mysqli_query($conn, $sql);

    header('location:../community');
} else {
    header('location:../error-wrong?2');
}
