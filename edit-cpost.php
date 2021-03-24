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

$cpostId = $_GET['cpostid'];

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Edit Community Post</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Edit Community Post</h1>
    </div>

    <div class="createpostflex">
        <div class="createpost">
            <?php $sql = "SELECT * FROM cposts WHERE cpost_id='$cpostId' LIMIT 1";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $Id = $rows['cpost_id'];
                $Caption = $rows['cpost_caption'];
                $User = $rows['cpost_user'];
            ?>
                <form id="form" method="POST" action="includes/editcpost.inc.php">
                    <div class="rowCreate">
                        <strong><label class="input-fieldtext">Caption:</label></strong>
                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="cpost_id" name="cpost_id" placeholder="PhotoID" value="<?php echo $Id; ?>">
                        <textarea class="input-field2" id="cpost_caption" name="cpost_caption" placeholder="Enter Your Caption!"><?php echo $Caption; ?></textarea>
                        <p><strong>Please Note:</strong> Picture can not be changed (if any).</p>
                        <p style="color:black;">Type <span style="background-color:black; color:#dfdfdf; border-radius:5px; padding:3px;">
                                <"br">
                            </span> without the quotes to go to new a line.</p>
                        <p id="blah2" style="display:none; color:black;">*Please ensure everything is correct because<br> the picture can't be edited once uploaded, only deleted.*</p><br>
                    </div>
                    <div class="btn-editusersflex">
                        <button class="btn-editusers" type="submit" value="edit_submit" name="edit_submit"> Confirm Edit </button>
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