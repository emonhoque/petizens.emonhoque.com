<?php
include_once "dbh.inc.php";

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

ob_start();
session_start();

if (!isset($_SESSION['loggedin'])) {
  $InputUser = "userlogin";
  $InputUserPosts = "userlogin";
  $InputUserText = "User";
  $controller = "userlogin";
  $controllerText = "Login";
  $displaynone = "none";
} else {
  $InputUser = "user/" . $_SESSION['username'];
  $InputUserPosts = "user/" . $_SESSION['username'] . "/posts";
  $InputUserDetails = "edit-details";
  $InputUserText = $_SESSION['fname'];
  $controller = "logout";
  $controllerText = "Logout";
};
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="description" content="Petizens: An Online Animal Community Based in Malaysia!" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:image" content="img/logo/logofb.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="img/logo/apple-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="img/logo/apple-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="img/logo/apple-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="img/logo/apple-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="img/logo/apple-icon-180x180.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="img/logo/apple-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="img/logo/apple-icon-167x167.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="img/logo/apple-icon-152x152.png" />
  <link rel="shortcut icon" href="img/logo/logo3.png" type="image/x-icon">
  <link rel="stylesheet" href="style/header.css" />
  <link rel="stylesheet" href="style/extras.css" />
  <link rel="stylesheet" href="style/style-mobile.css" />
  <script src="js/header.js" type="text/javascript"></script>
  <script src="js/searchloc.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <nav>
    <div class="logo"><a href="index"><img src="img/logo/logo6.png" alt="Petizens Logo"></a></div>
    <label for="btn" class="icon">
      <span style="line-height: 2.5;" class="fa fa-bars"></span>
    </label>
    <input type="checkbox" id="btn" />
    <ul>
      <li><a href="index">Home</a></li>
      <li>
        <label for="btn-1" class="show">Resources +</label>
        <a href="#">Resources</a>
        <input type="checkbox" id="btn-1" />
        <ul>
          <li><a href="community">Community</a></li>
          <li><a href="locations">Locations</a></li>
          <li style="display:<?php echo $displaynone; ?>;"><a href="users">All Users</a></li>
        </ul>
      </li>
      <li>
        <label for="btn-2" class="show">Animals +</label>
        <a href="animals">Animals</a>
        <input type="checkbox" id="btn-2" />
        <ul>
          <li class="visibleanimalsformobile"><a href="animals">All Animals</a></li>
          <li><a href="animals/cats">Cats</a></li>
          <li><a href="animals/dogs">Dogs</a></li>
          <li><a href="animals/birds">Birds</a></li>
          <li><a href="animals/fishes">Fishes</a></li>
          <li>
            <label for="btn-3" class="show">More +</label>
            <a href="#">More <span class="fa fa-plus"></span></a>
            <input type="checkbox" id="btn-3" />
            <ul>
              <li><a href="animals/rodents">Rodents</a></li>
              <li><a href="animals/exotic">Exotic Pets</a></li>
              <li><a href="animals/others">Others</a></li>
              <li><a href="animal/all-articles">All Articles</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li>
        <label for="btn-4" class="show"><?php echo $InputUserText; ?> +</label>
        <a href="<?php echo $InputUser; ?>"><?php echo $InputUserText; ?></a>
        <input type="checkbox" id="btn-4" />
        <ul>
          <li><a href="<?php echo $InputUser; ?>">My Profile</a></li>
          <li><a href="<?php echo $InputUserPosts; ?>">My Posts</a></li>
          <li style="display:<?php echo $displaynone; ?>;"><a href="<?php echo $InputUserDetails; ?>">Edit Details</a></li>
          <li style="display:<?php echo $displaynone; ?>;"><a href="pawchat">PawChat</a></li>
          <li><a href="<?php echo $controller; ?>"><?php echo $controllerText; ?></a></li>
        </ul>
      </li>
      <li><a href="about-us">About Us</a></li>
      <li><a href="contacts">Contacts</a></li>
    </ul>
  </nav>