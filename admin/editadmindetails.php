<?php
require "../admin/includes/header.php";

$adminusernameedit = $_GET['id']

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Edit Admin Details</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="addarticlediv"><br>
        <h1>Edit <?php echo $adminusernameedit; ?>'s Details</h1><br>
        <form class="addarticle" action=includes/editadmindetails.inc.php method="POST">

            <?php
            $sql1 = "SELECT * FROM users WHERE username='$adminusernameedit'";
            $res = $conn->query($sql1);
            while ($rows = $res->fetch_assoc()) {
                $ID = $rows['user_id'];
                $Username = $rows['username'];
                $FName = $rows['user_fname'];
                $LName = $rows['user_lname'];
                $Password = $rows['user_pass'];
                $Email = $rows['user_email'];
                $Phone = $rows['user_phone'];
                $Image = $rows['user_img'];
                $Desc = $rows['user_desc'];
                $Join = $rows['user_join'];
                $arr = array(1 => '(Admin)', 0 => ' ');
                $Admin = $arr[$rows['is_admin']];
            ?>
                <strong>ID:</strong><br>
                <input type="text" required="true" name="editad_id" placeholder="ID" autocomplete="off" readonly="readonly" value="<?php echo $ID; ?>"><br>
                <strong>Admin:</strong><br>
                <input type="text" required="true" name="editad_admin" placeholder="Admin" autocomplete="off" readonly="readonly" value="<?php echo $Username; ?>"><br>
                <strong>First Name:</strong><br>
                <input type="text" required="true" name="editad_fname" placeholder="First Name" autocomplete="off" value="<?php echo $FName; ?>"><br>
                <strong>Last Name:</strong><br>
                <input type="text" required="true" name="editad_lname" placeholder="Last Name" autocomplete="off" value="<?php echo $LName; ?>"><br>
                <strong>Email:</strong><br>
                <input type="email" required="true" name="editad_email" placeholder="Email" autocomplete="off" value="<?php echo $Email; ?>"><br>
                <strong>Phone:</strong><br>
                <input type="text" required="true" name="editad_phone" placeholder="Phone" autocomplete="off" value="<?php echo $Phone; ?>"><br>
                <strong>Image:</strong><br>
                <input type="text" required="true" name="editad_img" placeholder="Image" autocomplete="off" value="<?php echo $Image; ?>"><br>
                <strong>Description:</strong><br>
                <textarea style="width:300px; height:300px;" type="text" required="true" name="editad_desc" placeholder="URL" autocomplete="off"><?php echo $Desc; ?></textarea><br>
            <?php
            }
            ?>
            <button class="btn" type="submit" value="editart_submit" name="editart_submit"> Submit Edit </button>
            <p> <strong>*Make Sure the information are accurate!*</strong></p>
        </form>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>