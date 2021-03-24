<?php
include_once "includes/dbh.inc.php"
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="description" content="Petizens: An Online Animal Community Based in Malaysia!" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="img/logo/logo3-admin.png" type="image/x-icon">
  <link rel="stylesheet" href="style/admin-header.css" />
  <link rel="stylesheet" href="style/admin-extras.css" />
  <link rel="stylesheet" href="style/admin-style-mobile.css" />
  <script src="js/admin-header.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <nav>
    <div class="logo"><a href="admin"><img src="img/logo/logo6-admin.png" alt="Petizens Logo"></a></div>

    <label for="btn" class="icon">
      <span class="fa fa-bars"></span>
    </label>
    <input type="checkbox" id="btn" />
    <ul>
      <li><a href="admin">Admin</a></li>
      <li>
        <label for="btn-1" class="show">Articles +</label>
        <a href="articles">Articles</a>
        <input type="checkbox" id="btn-1" />
        <ul>
          <li class="visibleanimalsformobile"><a href="articles">Articles Manager</a></li>
          <li><a href="addarticle">Create New</a></li>
          <li><a href="listarticles">View All</a></li>
        </ul>
      </li>
      <li>
        <label for="btn-2" class="show">Accounts +</label>
        <a href="#">Accounts</a>
        <input type="checkbox" id="btn-2" />
        <ul>
          <li><a href="admin-details">Admins</a></li>
          <li><a href="user-details">Users</a></li>
        </ul>
      </li>
      <li>
        <label for="btn-3" class="show">Gallery +</label>
        <a href="gallery">Gallery</a>
        <input type="checkbox" id="btn-3" />
        <ul>
          <li class="visibleanimalsformobile"><a href="gallery">View Gallery</a></li>
          <li><a href="image-upload">Upload</a></li>
        </ul>
      </li>
      <li>
        <label for="btn-4" class="show">Others +</label>
        <a href="#">Others</a>
        <input type="checkbox" id="btn-4" />
        <ul>
          <li><a href="animals">Animals</a></li>
          <li><a href="newsletter-subs">Newsletter</a></li>
          <li><a href="contact-form-enquries">Form</a></li>
          <li><a href="posts-manager">Posts</a></li>
          <li><a href="locations">Locations</a></li>
          <li><a href="#">Animal-8</a></li>
          <li><a href="#">Animal-9</a></li>
        </ul>
      </li>
      <li><a href="../index">Website</a></li>
    </ul>
  </nav>



</body>

</html>
</header>
</body>

</html>