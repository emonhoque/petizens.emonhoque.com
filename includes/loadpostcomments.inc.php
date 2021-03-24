<?php
require "dbh.inc.php";
session_start();
$Id = $_POST['post_id'];
$sessionUser = $_SESSION['username'];

$sql33 = "SELECT * FROM posts WHERE post_id='$Id' LIMIT 1";
$res33 = $conn->query($sql33);
while ($rows33 = $res33->fetch_assoc()) {
    $User = $rows33['post_user'];
}



$sql4 = "SELECT * FROM posts_comments WHERE post_id='$Id' AND pc_approved='1';";
$res4 = $conn->query($sql4);
if (mysqli_num_rows($res4) > 0) {
    while ($rows4 = $res4->fetch_assoc()) {
        $CommentID = $rows4['pc_id'];
        $CommentUser = $rows4['pc_user'];
        $Comment = $rows4['pc_comment'];
        $CommTime = $rows4['pc_time'];
?>
        <p class="commentstext">
            <strong><a href="user/<?php echo $CommentUser ?>"><?php echo $CommentUser ?></a>:</strong> <?php echo $Comment ?>
            <?php if ($CommentUser == $sessionUser) {
            ?>
                <a class="editbuttonnostyle" href="delete-comment/<?php echo $CommentID ?>" onClick="return confirm('Are you sure you want to delete this? This can not be undone!');">
                    <button type="submit" class="commentsdeletebutton" style="float: right;"><i class="fas fa-trash-alt" style="font-size:15px; "></i></button>
                </a>
            <?php
            } elseif ($User == $sessionUser) {
            ?>
                <a class="editbuttonnostyle" href="delete-comment/<?php echo $CommentID ?>" onClick="return confirm('Are you sure you want to delete this? This can not be undone!');">
                    <button type="submit" class="commentsdeletebutton" style="display:<?php echo $createUser2 ?>;float: right;"><i class="fas fa-trash-alt" style="font-size:15px; "></i></button>
                </a>
            <?php
            } ?>
        </p>
    <?php
    }
} else {
    $CommentUser = '';
    $Comment = 'There Are No Comments';
    ?>
    <p class="commentstext"><strong><?php echo $CommentUser ?></strong> <?php echo $Comment ?></p>
<?php
};
?>