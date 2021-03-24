<?php
include_once 'dbh.inc.php';

//Details
if (isset($_POST['edit_submit'])) {

    $ID = mysqli_real_escape_string($conn, $_POST['post_id']);
    $Caption = $_POST['post_caption'];
    $Username = mysqli_real_escape_string($conn, $_POST['post_user']);

    $sql =  "UPDATE posts
    SET post_caption='$Caption'
    WHERE post_id='$ID';";

    $result = mysqli_query($conn, $sql);

    header('location:../user/' . $Username . '/posts');
} else {
    header('location:../error-wrong?2');
}
