<?php
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

//Image
if (isset($_POST['img_submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg', 'gif');

    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    $fileDestination = '../img/users/' . $fileNameNew;
    $fileDestination2 = '../admin/img/users/' . $fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);
    copy($fileDestination, $fileDestination2);
    $Img =  $fileNameNew;

    crop_image($fileDestination, "1000");
    crop_image($fileDestination2, "1000");

    $ID2 = mysqli_real_escape_string($conn, $_POST['user_id2']);
    $Username2 = mysqli_real_escape_string($conn, $_POST['username2']);

    $sql2 =  "UPDATE users
        SET user_img='$Img'
        WHERE user_id='$ID2';";
    $result2 = mysqli_query($conn, $sql2);

    header('location:../edit-details');
} else {
    header('location:../error-wrong?1');
}
