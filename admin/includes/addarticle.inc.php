<?php
include_once 'dbh.inc.php';


#Upload Image
if (isset($_POST['addart_submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../img/articles/' . $fileNameNew;
                $fileDestination2 = '../../img/articles/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                copy($fileDestination, $fileDestination2);
                $Img =  $fileNameNew;

                $admin = mysqli_real_escape_string($conn, $_POST['addart_admin']);
                $category = mysqli_real_escape_string($conn, $_POST['addart_category']);
                $title = $_POST['addart_title'];
                $body = $_POST['addart_body'];
                $tags = mysqli_real_escape_string($conn, $_POST['addart_tags']);

                $words = explode(" ", $title);
                $firstfivewords = join(" ", array_slice($words, 0, 5));
                $dashedTitle2 = str_replace(" ", "-", $firstfivewords);
                $dashedTitle = preg_replace('/[^A-Za-z0-9\-]/', '', $dashedTitle2);

                $sql = "INSERT INTO `articles` (art_admin, art_category, art_title, art_img, art_body, art_tags, art_dash) 
                VALUES (?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<script> window.location.assign('../admin-wrong'); </script>";
                } else {
                    mysqli_stmt_bind_param($stmt, "sssssss", $admin, $category, $title, $Img, $body, $tags, $dashedTitle);
                    mysqli_stmt_execute($stmt);
                    echo "<script> window.location.assign('../articles?success'); </script>";
                }
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You can't upload files of this type!";
    }
}
