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

if (isset($_POST['breed_submit'])) {
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
                $fileDestination = '../img/breeds/' . $fileNameNew;
                $fileDestination2 = '../../img/breeds/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                copy($fileDestination, $fileDestination2);
                $Img =  $fileNameNew;

                crop_image($fileDestination, "600");
                crop_image($fileDestination2, "600");

                $Category = mysqli_real_escape_string($conn, $_POST['breed_category']);
                $Name = mysqli_real_escape_string($conn, $_POST['breed_name']);
                $Color = mysqli_real_escape_string($conn, $_POST['breed_color']);
                $Desc = $_POST['breed_details'];

                $sql = "INSERT INTO `breed` (breed_category, breed_name, breed_color, breed_details, breed_img) 
                        VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<script> window.location.assign('../admin-wrong'); </script>";
                } else {
                    mysqli_stmt_bind_param($stmt, "sssss", $Category, $Name, $Color, $Desc, $Img);
                    mysqli_stmt_execute($stmt);
                    echo "<script> window.location.assign('../animalsbreeds?success'); </script>";
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
