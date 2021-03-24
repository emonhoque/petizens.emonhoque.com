<?php
include_once 'dbh.inc.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

//verify user by token

function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE user_token='$token' LIMIT 1;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET user_verified=1 WHERE user_token='$token';";

        if (mysqli_query($conn, $update_query)) {
            // Log User In
            $_SESSION['id'] = $user['user_id'];
            $_SESSION['fname'] = $user['user_fname'];
            $_SESSION['lname'] = $user['user_lname'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_verified'] = 1;
            //flash message
            $_SESSION['message'] = "Your email was successfully verified";
            $_SESSION['loggedin'] = true;
            header('location: index?verificationsuccessful');
            exit();
        }
    } else {
        echo 'User not found';
    }
}
