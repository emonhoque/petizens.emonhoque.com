<?php
require "dbh.inc.php";

session_start();
$sessionUser = $_SESSION['username'];
$Id = $_POST['cpost_id'];

$sql5 = "SELECT * FROM cposts_comments WHERE cpost_id='$Id' AND cpc_approved='1';";
$res5 = $conn->query($sql5);
if (mysqli_num_rows($res5) > 0) {
    while ($rows5 = $res5->fetch_assoc()) {
        $CommentID = $rows5['cpc_id'];
        $CommentUser = $rows5['cpc_user'];
        $Comment = $rows5['cpc_comment'];
        $CommTime = $rows5['cpc_time'];
        $date1 = date("h:i a", strtotime($CommTime));
        $date2 = date("F j, Y", strtotime($CommTime));
        $date3 = $date2 . " at " . $date1;
        $newdate = $date3;
?>
        <div class="cpostsmall-avatar2">
            <?php
            $sql6 = "SELECT * FROM users WHERE username='$CommentUser' LIMIT 1;";
            $res6 = $conn->query($sql6);
            while ($rows6 = $res6->fetch_assoc()) {
                $Image6 = $rows6['user_img'];
            ?>
                <a href="user/<?php echo $CommentUser; ?>" target="_blank"><img src="img/users/<?php echo $Image6; ?>" alt="userimg" /></a>
            <?php
            }
            ?>
        </div>
        <div class="cpostwrite-comment2">
            <?php if ($CommentUser == $sessionUser) {
            ?>
                <a class="editbuttonnostyle" href="delcposcomm/<?php echo $CommentID ?>" onClick="return confirm('Are you sure you want to delete this? This can not be undone!');">
                    <button type="submit" class="commentsdeletebutton"><i class="fas fa-trash-alt" style="font-size:15px; "></i></button>
                </a>
            <?php
            } else {
            ?>
            <?php
            } ?>
            <h5>
                <a href="user/<?php echo $CommentUser; ?>" target="_blank"><?php echo $CommentUser; ?></a> - <span class="commenttime"><?php echo $newdate; ?></span>
            </h5>
            <p><?php echo $Comment; ?></p>
        </div>
    <?php
    }
} else {
    ?>
    <p> There Are No Comments! </p>
<?php
}
?>