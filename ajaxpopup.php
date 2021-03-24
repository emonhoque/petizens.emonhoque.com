<div class="main-content2">
    <?php
    require "includes/changebasefolder.inc.php";
    require "includes/dbh.inc.php";

    header('Access-Control-Allow-Origin: https://petizens.xyz/');

    session_start();

    $Id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE post_id='$Id' LIMIT 1";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $Id = $rows['post_id'];
        $Img = $rows['post_img'];
        $Caption = $rows['post_caption'];
        $User = $rows['post_user'];
        $Time = $rows['post_time'];
        $dateA = date("h:i a", strtotime($Time));
        $dateB = date("F j, Y", strtotime($Time));
        $dateC = $dateA . ", " . $dateB;
        $newdate = $dateC;
    }

    $sql = "SELECT * FROM users WHERE username='$User';";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $FName = $rows['user_fname'];
        $LName = $rows['user_lname'];
        $Image = $rows['user_img'];
    }


    if (
        isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username'] == $User
    ) {
        $sessionUser = $_SESSION['username'];
        $createUser2 = "flex";
        $deletecommment = "flex";
    } else {
        $sessionUser = "none";
        $createUser2 = "none !important";
        $deletecommment = "none !important";
    }


    if (
        isset($_SESSION['username']) && !empty($_SESSION['username'])
    ) {
        $createUser3 = "inline-block";
    } else {
        $createUser3 = "none !important";
    }


    ?>
    <div class="ajax-text-and-image white-popup-block">
        <?php
        $sql = "SELECT * FROM posts WHERE post_id='$Id' LIMIT 1";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $Id = $rows['post_id'];
            $Img = $rows['post_img'];
            $Caption = $rows['post_caption'];
            $User = $rows['post_user'];
        ?>
            <div class="ajcol">
                <div class="ajcolflex">
                    <img src="img/posts/<?php echo $Img ?>" alt="Post-<?php echo $Id ?>" />
                </div>
            </div>
            <div class="ajcol" style="line-height: 1.231;">
                <div style="padding: 1em; display:flex;">
                    <div class="captionajaxbox" style="width: 100%; overflow-y: hidden;">
                        <h3><?php echo $FName ?> <?php echo $LName ?></h3>
                        <h4>@<?php echo $User ?></h4>
                        <p style="font-size:12px;margin-top:5px;"><?php echo $newdate ?></p>
                    </div>
                    <div class="captionajaxbox" style="width: 10%; display:<?php echo $createUser2 ?>; flex-direction:column; align-items:center;">
                        <a class="editbuttonnostyle" href="edit-caption/<?php echo $User ?>/<?php echo $Id ?>">
                            <button type="submit" class="editbuttonajax editbuttonajaxedit" style="display:<?php echo $editUser ?>;"><i class="fa fa-edit" style="font-size:15px;"></i></button>
                        </a>
                        <a class="editbuttonnostyle" href="delete-picture/<?php echo $User ?>/<?php echo $Id ?>" onClick="return confirm('Are you sure you want to delete this? This can not be undone!');">
                            <button type="submit" class="editbuttonajax editbuttonajaxdelete" style="display:<?php echo $editUser ?>;"><i class="fas fa-trash-alt" style="font-size:15px;"></i></button>
                        </a>
                    </div>
                </div>
                <div style="padding-left: 1em; padding-right: 1em;">
                    <p class="captionajaxboxmaxheight"><?php echo $Caption ?></p>
                </div>
                <hr class="hrcommentssection">
                <div class="commmentSection">
                    <div id="commentbox2" class="commentslist">
                        <?php
                        $sql = "SELECT * FROM posts_comments WHERE post_id='$Id' AND pc_approved='1';";
                        $res = $conn->query($sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($rows = $res->fetch_assoc()) {
                                $CommentID = $rows['pc_id'];
                                $CommentUser = $rows['pc_user'];
                                $Comment = $rows['pc_comment'];
                                $CommTime = $rows['pc_time'];
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
                    </div>
                    <div class="commentbox" style="display:<?php echo $createUser3 ?>;">
                        <form id="formbox" action="includes/insertcomment.inc" method="POST" autocomplete="off">
                            <input class="commentsfield" type="text" id="pc_comment" name="pc_comment" required placeholder="Enter Your Comment Here!">
                            <input style="display: none;" readonly="readonly" class="input-field" type="text" id="pc_user_account" name="pc_user_account" placeholder="UserID" value="<?php echo $User; ?>">
                            <input style="display: none;" readonly="readonly" class="input-field" type="text" id="pc_user" name="pc_user" placeholder="UserID" value="<?php echo $_SESSION['username']; ?>">
                            <input style="display: none;" readonly="readonly" class="input-field" type="text" id="post_id" name="post_id" placeholder="UserID" value="<?php echo $Id; ?>">
                            <button type="button" name="commentsbutton" id="commentsbutton" class="commentsbutton"> Post </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div style=" clear:both; line-height: 0;">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#commentsbutton').click(function() {
                var pc_comment = $("#pc_comment").val();
                var pc_user = $("#pc_user").val();
                var post_id = $("#post_id").val();
                var pc_user_account = $("#pc_user_account").val();

                if (pc_comment && pc_user && post_id && pc_user_account) {
                    $.ajax({
                        type: 'POST',
                        url: 'includes/insertcomment.inc.php',
                        data: {
                            "pc_comment": pc_comment,
                            "post_id": post_id,
                            "pc_user": pc_user,
                            "pc_user_account": pc_user_account,
                            "commentsbutton": 1
                        }
                    });

                    setInterval(function() {
                        $('#commentbox2').load("includes/loadpostcomments.inc.php", {
                            post_id: post_id
                        });
                    }, 1000);

                    var form = document.getElementById('formbox').reset();
                    return false;
                }
            });
        });
    </script>
</div>