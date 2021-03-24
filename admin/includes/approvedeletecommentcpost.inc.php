<?php
include_once 'dbh.inc.php';

$photoId = $_GET['cid'];

if (isset($_GET['approve'])) {
    $sql =  "UPDATE cposts_comments
SET cpc_approved='1'
WHERE cpc_id='$photoId';";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:../cpostcomments-approval?success");
    } else {
        echo ' Error ';
    }
} else {
    echo ' error ';
}

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM cposts_comments where cpc_id='$photoId';";
    $result = mysqli_query($conn, $sql) or die("error");

    if ($result) {
        header("location:../cpostcomments-approval?success");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    echo ' ereororoo2 ';
}
