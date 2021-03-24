<?php
require "includes/dbh.inc.php";
session_start();
$Id = $_GET['id'];

if (
    isset($_SESSION['username']) && !empty($_SESSION['username'])
) {
    $sessionUser = $_SESSION['username'];
    $wrapper = "grid";
    $commentbox = "block";
} else {
    $sessionUser = "none";
    $wrapper = "none";
    $commentbox = "none";
}

$sql = "SELECT * FROM cposts WHERE cpost_id='$Id' AND cpost_approved='1' ORDER BY cpost_id DESC;";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Id = $rows['cpost_id'];
    $Img = $rows['cpost_img'];
    $CUser = $rows['cpost_user'];
    $Caption = $rows['cpost_caption'];
    $Time = $rows['cpost_time'];
    $dateA = date("h:i a", strtotime($Time));
    $dateB = date("F j, Y", strtotime($Time));
    $dateC = $dateB . " at " . $dateA;
    $newdate = $dateC;
?>
    <div class="cpost-box">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <div class="cpostcontent">
            <?php
            $sql3 = "SELECT * FROM users WHERE username='$CUser' LIMIT 1;";
            $res3 = $conn->query($sql3);
            while ($rows3 = $res3->fetch_assoc()) {
                $Username = $rows3['username'];
                $FName = $rows3['user_fname'];
                $LName = $rows3['user_lname'];
                $Image = $rows3['user_img'];
            ?>
                <div class="cpostrow cpostheader">
                    <div class="cpostavatar">
                        <img src="img/users/<?php echo $Image; ?>" alt="userimg" />
                    </div>
                    <?php if ($CUser == $sessionUser) {
                    ?>
                        <a class="editbuttonnostyle" href="delete-cpost/<?php echo $CUser ?>/<?php echo $Id ?>" onClick="return confirm('Are you sure you want to delete this? This can not be undone!');">
                            <button type="submit" class="editbuttonajax editbuttonajaxdelete" style="display:<?php echo $editUser ?>;"><i class="fas fa-trash-alt" style="font-size:15px;"></i></button>
                        </a>
                        <a class="editbuttonnostyle editpostpopup" href="edit-cpost/<?php echo $CUser ?>/<?php echo $Id ?>">
                            <button type="submit" class="editbuttonajax editbuttonajaxedit" style="display:<?php echo $editUser ?>;"><i class="fa fa-edit" style="font-size:15px;"></i></button>
                        </a>
                    <?php
                    } else {
                    ?>
                    <?php
                    } ?>
                    <div class="cpostname">
                        <h5><a href="user/<?php echo $Username; ?>" target="_blank"><?php echo $FName; ?> <?php echo $LName; ?></a></h5>
                        <h5><a href="user/<?php echo $Username; ?>" target="_blank">@<?php echo $Username; ?></a></h5>
                        <span class="cpostsub"><?php echo $newdate; ?></span>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="cpostrow cposttext">
                <?php echo $Caption; ?>
            </div>
            <?php
            $sql2 = "SELECT cpost_img FROM cposts WHERE cpost_id=$Id LIMIT 1;";
            $res2 = $conn->query($sql2);
            while ($rows2 = $res2->fetch_assoc()) {
                $Img = $rows2['cpost_img'];
                if ($Img == null) {
                } else {
            ?>
                    <div class="cpostrow cpostthumbnail">
                        <img src="img/cposts/<?php echo $Img; ?>" alt="Image" />
                    </div>
            <?php
                }
            }
            ?>
            <hr />
        </div>
        <div class="commentcpost">
            <div class="cpostrow cpostrowhide" style="display:<?php echo $commentbox; ?>;">
                <div class="cpostsmall-avatar">
                    <?php
                    $sql4 = "SELECT * FROM users WHERE username='$sessionUser' LIMIT 1;";
                    $res4 = $conn->query($sql4);
                    while ($rows4 = $res4->fetch_assoc()) {
                        $Image4 = $rows4['user_img'];
                    ?>
                        <img src="img/users/<?php echo $Image4; ?>" alt="userimg" />
                    <?php
                    }
                    ?>
                </div>
                <div class="cpostwrite-comment">
                    <form id="formbox" method="POST" action="includes/insertcommentcpost.inc.php">
                        <input type="text" autocomplete="off" required="true" id="cpost_comment" name="cpost_comment" placeholder="Write your comment...">
                        <input style="display: none;" required="true" readonly="readonly" class="input-field" type="text" id="cpost_user" name="cpost_user" placeholder="UserID" value="<?php echo $sessionUser; ?>">
                        <input style="display: none;" required="true" readonly="readonly" class="input-field" type="text" id="cpost_id" name="cpost_id" placeholder="PostID" value="<?php echo $Id; ?>">
                        <button class="cpostcommentbutton" type="button" id="cpostcomment_submit" value="cpostcomment_submit" name="cpostcomment_submit"> Post </button>
                    </form>
                </div>
            </div>
            <div id="commentbox" class="cpostrow">
                <?php
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
            </div>
        </div>
        <script>
            $(document).ready(function() {

                $('#cpostcomment_submit').click(function() {
                    var cpost_comment = $("#cpost_comment").val();
                    var cpost_user = $("#cpost_user").val();
                    var cpost_id = $("#cpost_id").val();

                    if (cpost_comment && cpost_user && cpost_id) {
                        $.ajax({
                            type: 'POST',
                            url: 'includes/insertcommentcpost.inc.php',
                            data: {
                                "cpost_comment": cpost_comment,
                                "cpost_id": cpost_id,
                                "cpost_user": cpost_user,
                                "cpostcomment_submit": 1
                            },
                            success: function(data) {

                            }
                        });

                        setInterval(function() {
                            $('#commentbox').load("includes/loadcpostcomments.inc.php", {
                                cpost_id: cpost_id
                            });
                        }, 00);

                        var form = document.getElementById('formbox').reset();
                        return false;
                    }
                });
            });

            $(document).ready(function() {
                $('.editpostpopup').magnificPopup({
                    type: 'ajax'
                });
            });
        </script>
    </div>
<?php
}
?>