<?php
session_start();
include_once 'dbh.inc.php';

function crop_image($file, $max_resolution)
{
    if (file_exists($file)) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if ($extension == 'jpg' || $extension == 'jpeg') {
            $original_image = imagecreatefromjpeg($file);
        } else if ($extension == 'png') {
            $original_image = imagecreatefrompng($file);
        } else {
            $original_image = imagecreatefromgif($file);
        }

        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);

        //try max width first...
        if ($original_height > $original_width) {
            $ratio = $max_resolution / $original_width;
            $new_width = $max_resolution;
            $new_height = $original_height * $ratio;

            $diff =  $new_height - $new_width;

            $x = 0;
            $y = round($diff / 2);
        } else {
            $ratio = $max_resolution / $original_height;
            $new_height = $max_resolution;
            $new_width = $original_width * $ratio;
            $diff =  $new_width - $new_height;

            $x = round($diff / 2);
            $y = 0;
        }
    }
    if ($original_image) {
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

        $new_crop_image = imagecreatetruecolor($max_resolution, $max_resolution);
        imagecopyresampled($new_crop_image, $new_image, 0, 0, $x, $y, $max_resolution, $max_resolution, $max_resolution, $max_resolution);

        imagejpeg($new_crop_image, $file, 100);
    };
};

$id = $_SESSION['id'];
$User = mysqli_real_escape_string($conn, $_POST['cpost_user']);
$Caption = $_POST['cpost_caption'];

//Text
if (isset($_POST['create_txtcpost'])) {

    $sql = "INSERT INTO cposts (cpost_user, cpost_caption) 
                VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../error-wrong?uploadFailed1');
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $User, $Caption);
        mysqli_stmt_execute($stmt);
        header('location:../community');
    }
}

//Image
if (isset($_POST['create_imgcpost'])) {
    $file = $_FILES['file_post']['name'];
    $fileTmpName = $_FILES['file_post']['tmp_name'];
    $fileExt = explode('.', $file);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg');
    $fileNameNew = $User . ".cpost" . uniqid('', true) . "." . $fileActualExt;
    $fileDestination = '../img/cposts/' . $fileNameNew;
    $fileDestination2 = '../admin/img/cposts/' . $fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);
    copy($fileDestination, $fileDestination2);

    $Img =  $fileNameNew;

    crop_image($fileDestination, "600");
    crop_image($fileDestination2, "600");

    $sql = "INSERT INTO cposts (cpost_user, cpost_img, cpost_caption) 
                VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../error-wrong?uploadFailed3');
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $User, $Img, $Caption);
        mysqli_stmt_execute($stmt);
        header('location:../community');
    }
}
