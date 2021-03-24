<?php
include_once 'dbh.inc.php';

$ArtID = mysqli_real_escape_string($conn, $_POST['addart_id']);
$admin = mysqli_real_escape_string($conn, $_POST['addart_admin']);
$category = strtolower(mysqli_real_escape_string($conn, $_POST['addart_category']));
$title = $_POST['addart_title'];
$img = mysqli_real_escape_string($conn, $_POST['addart_img']);
$body = $_POST['addart_body'];
$tags = mysqli_real_escape_string($conn, $_POST['addart_tags']);

$words = explode(" ", $title);
$firstfivewords = join(" ", array_slice($words, 0, 5));
$dashedTitle2 = str_replace(" ", "-", $firstfivewords);
$dashedTitle = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $dashedTitle2));

$sql =  "UPDATE articles
SET art_id='$ArtID', 
    art_admin='$admin', 
    art_category='$category', 
    art_title='$title', 
    art_img='$img', 
    art_body='$body',
    art_tags='$tags',
    art_dash='$dashedTitle'
WHERE art_id='$ArtID';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../editarticles?success");
} else {
    echo ' Replace 1 apostrophes with 2 apostrophes please ';
}
