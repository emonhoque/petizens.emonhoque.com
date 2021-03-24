<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

$username = $_SESSION['username'];

$username2 = $_GET['uname'];

if ($username === $username2) {
    if (
        isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $username
    ) {
        $editUser = "block";
    } else {
        header("location: ../../userlogin?1");
    };
} else {
    header("location: ../../user/" . $username);
}

$photoId = $_GET['phid'];

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Edit Post</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Edit Post</h1>
    </div>

    <div class="createpostflex">
        <div class="createpost">
            <?php $sql = "SELECT * FROM posts WHERE post_id='$photoId' LIMIT 1";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $Id = $rows['post_id'];
                $Img = $rows['post_img'];
                $Caption = $rows['post_caption'];
                $User = $rows['post_user'];
            ?>
                <form id="form" method="POST" enctype="multipart/form-data" action="includes/editcaption.inc.php">
                    <div class="rowCreate">
                        <div class="backgroundrighttab">
                            <img class="px400wide" src="img/posts/<?php echo $Img ?>" alt="Post-<?php echo $Id ?>" />
                        </div>
                    </div>
                    <div class="rowCreate">
                        <strong><label class="input-fieldtext">Caption:</label></strong>
                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="post_id" name="post_id" placeholder="PhotoID" value="<?php echo $Id; ?>">
                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="post_user" name="post_user" placeholder="UserID" value="<?php echo $User; ?>">
                        <textarea class="input-field2" id="user_desc" name="post_caption" placeholder="Enter Your Caption!"><?php echo $Caption; ?></textarea>
                        <p style="color:black;">Type <span style="background-color:black; color:#dfdfdf; border-radius:5px; padding:3px;">
                                <"br">
                            </span> without the quotes to go to new a line.</p>
                        <p id="blah2" style="display:none; color:black;">*Please ensure everything is correct because<br> the picture can't be edited once uploaded, only deleted.*</p><br>
                    </div>
                    <div class="btn-editusersflex">
                        <button class="btn-editusers" type="submit" value="edit_submit" name="edit_submit"> Edit Post </button>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>

</main>

<?php
require "includes/footer.php";
?>