<?php
require "../admin/includes/header.php";

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Add User Details</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>New User Details</h1><br>
        <form class="addarticle" action=includes/adduserdetails.inc.php method="POST" enctype="multipart/form-data">
            <strong>Username:</strong><br>
            <input type="text" required="true" name="username" placeholder="Username" autocomplete="off" value=""><br>
            <strong>First Name:</strong><br>
            <input type="text" required="true" name="user_fname" placeholder="First Name" autocomplete="off" value=""><br>
            <strong>Last Name:</strong><br>
            <input type="text" required="true" name="user_lname" placeholder="Last Name" autocomplete="off" value=""><br>
            <strong>Email:</strong><br>
            <input type="email" required="true" name="user_email" placeholder="Email" autocomplete="off" value=""><br>
            <strong>Password:</strong><br>
            <input type="password" required="true" name="user_pass" placeholder="Password" autocomplete="off" value=""><br>
            <strong>Phone:</strong><br>
            <input type="text" required="true" name="user_phone" placeholder="Phone" autocomplete="off" value=""><br>
            <label class="fileuploadname" for=" fileSelect"><strong>Picture:</strong></label><br><br>
            <input class="fileupload" type="file" name="file" id="file"><br><br>
            <strong>Description:</strong><br>
            <textarea style="width:300px; height:300px;" type="text" required="true" name="user_desc" placeholder="Description" autocomplete="off"></textarea><br>
            <button class="btn" type="submit" value="user_submit" name="user_submit"> Submit User </button>
            <p> <strong>*Make Sure the information are accurate!*</strong></p>
        </form>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>