<?php
include_once 'dbh.inc.php';

$photoId = $_GET['cid'];

if (isset($_GET['approve'])) {
    $sql =  "UPDATE posts_comments
SET pc_approved='1'
WHERE pc_id='$photoId';";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location:../comments-approval?success");
    } else {
        echo ' Error ';
    }
} else {
    echo ' ereororoor ';
}

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM posts_comments where pc_id='$photoId';";
    $result = mysqli_query($conn, $sql) or die("error");

    if ($result) {
        header("location:../comments-approval?success");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    echo ' ereororoo2 ';
}
