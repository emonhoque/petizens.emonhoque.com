<?php
include_once 'dbh.inc.php';

if (isset($_POST['user_submit'])) {
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
                $fileDestination = '../img/users/' . $fileNameNew;
                $fileDestination2 = '../../img/users/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                copy($fileDestination, $fileDestination2);
                $Img =  $fileNameNew;

                $Fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
                $Lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
                $Username = mysqli_real_escape_string($conn, $_POST['username']);
                $Email = mysqli_real_escape_string($conn, $_POST['user_email']);
                $Password = mysqli_real_escape_string($conn, $_POST['user_pass']);
                $Phone = mysqli_real_escape_string($conn, $_POST['user_phone']);

                $Desc = $_POST['user_desc'];

                $sql = "INSERT INTO `users` (user_fname, user_lname, user_email, username, user_pass, user_phone, user_img, user_desc) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<script> window.location.assign('../admin-wrong'); </script>";
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssssss", $Fname, $Lname, $Email, $Username, $Password, $Phone, $Img, $Desc);
                    mysqli_stmt_execute($stmt);
                    echo "<script> window.location.assign('../user-details?success'); </script>";
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
