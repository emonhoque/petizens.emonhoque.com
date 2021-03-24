<?php
include_once 'dbh.inc.php';
require_once 'emailtoken.inc.php';

$errors = array();
$fname = "";
$lname = "";
$email = "";
$phone = "";
$username = "";
$password = "";

if (isset($_POST['signup-btn'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validation
    if (empty($fname)) {
        $errors['fname'] = "First Name Required";
    }
    if (empty($lname)) {
        $errors['lname'] = "Last Name Required";
    }
    if (empty($email)) {
        $errors['email'] = "Email Required";
    }
    if (empty($username)) {
        $errors['username'] = "Username Required";
    }
    if (empty($password)) {
        $errors['password'] = "Password Required";
    }

    $emailQuery = "SELECT * FROM users WHERE user_email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if ($userCount > 0) {
        $errors['email'] = "Email Already Exists";
    }

    $usernameQuery = "SELECT * FROM users WHERE username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if ($userCount > 0) {
        $errors['username'] = "Try a different Username";
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));

        $sql = "INSERT INTO users (user_fname, user_lname, user_email, username, user_pass, user_phone, user_token) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $fname, $lname, $email, $username, $password, $phone, $token);

        if ($stmt->execute()) {
            // login user 
            $user_id = $conn->insert_id;
            ini_set('session.cookie_lifetime', '432000');
            $_SESSION['fname'] = $fname;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['user_email'] = $email;
            $UserDatabaseID2 = $user_id;

            //Verification Email
            sendVerificationEmail($email, $token);

            //flash message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['loggedin'] = true;

            $sql3 = "INSERT INTO login_details (user_id) VALUES (?);";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param('s', $UserDatabaseID2);

            if ($stmt3->execute()) {
                header('location: user/' . $username);
                exit();
            } else {
                $errors['login_failed'] = "Something Went Wrong!";
            }
        } else {
            $errors['db_error'] = "Database Error: Failed to Register";
        };
    }
}


// Login Button 
if (isset($_POST['signin-btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validation
    if (empty($username)) {
        $errors['username'] = "Username Required";
    }
    if (empty($password)) {
        $errors['password'] = "Password Required";
    }

    if (count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE username=? LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $UserDatabaseID = $user['user_id'];

        if (password_verify($password, $user['user_pass'])) {

            // Login Successful
            ini_set('session.cookie_lifetime', '432000');
            $_SESSION['id'] = $user['user_id'];
            $_SESSION['fname'] = $user['user_fname'];
            $_SESSION['lname'] = $user['user_lname'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_verified'] = $user['user_verified'];
            //flash message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['loggedin'] = true;

            $sql2 = "INSERT INTO login_details (user_id) VALUES (?);";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param('s', $UserDatabaseID);

            if ($stmt2->execute()) {
                header('location: user/' . $username);
                exit();
            } else {
                $errors['login_failed'] = "Something Went Wrong!";
            }
        } else {
            $errors['login_failed'] = "Wrong Credentials!";
        }
    }
}
