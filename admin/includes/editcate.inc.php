<?php
include_once 'dbh.inc.php';

$CateName = mysqli_real_escape_string($conn, $_POST['category_name']);
$CateDesc = $_POST['category_description'];
$CateShortDesc = $_POST['category_descshort'];
$Img = mysqli_real_escape_string($conn, $_POST['category_img']);
$CateLF = mysqli_real_escape_string($conn, $_POST['category_lifeexpect']);

$sql =  "UPDATE article_categories
SET category_description='$CateDesc',
    category_descshort='$CateShortDesc',
    category_img='$Img',
    category_lifeexpect='$CateLF'
WHERE category_name='$CateName';";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:../editcategories?success");
} else {
    echo ' Please Check Your Query ';
}
