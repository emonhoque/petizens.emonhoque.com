<?php
require "includes/header.php";

if (
    isset($_SESSION['username']) && !empty($_SESSION['username'])
) {
    $sessionUser = $_SESSION['username'];
    $wrapper = "none";
    $wrapper2 = "grid";
} else {
    $wrapper = "grid";
    $wrapper2 = "none";
}


?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style-test.css" />
    <link rel="stylesheet" href="style/style-mfp.css" />
    <title>Petizens</title>
</head>

<main class="main-content">

    <div class="slidesflex">
        <div id="slider">
                <img src="img/homepage1.png" alt="image description"/>
                <img src="img/homepage2.png" alt="image description"/>
                <img src="img/homepage3.png" alt="image description"/>
                <img src="img/homepage4.png" alt="image description"/>
        </div>
    </div>

    <div class="homepage-body">
        <div class="homepage-main">
        <table class="userpoststable">
                <thead>
                    <h1 class="userposth1">New Articles</h1>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <tbody> 

        <?php
                    $sql = "SELECT * FROM articles ORDER BY art_id DESC LIMIT 2";
                    $res = $conn->query($sql);
                    while ($rows = $res->fetch_assoc()) {
                        $ArtID = $rows['art_id'];
                        $ArtAdmin = $rows['art_admin'];
                        $ArtCat = ucwords($rows['art_category']);
                        $ArtTitle = $rows['art_title'];
                        $ArtDate = $rows['art_date'];
                        $ArtImg = $rows['art_img'];
                        $ArtBody = $rows['art_body'];
                        $ArtTags = $rows['art_tags'];
                        $dashedTitle = $rows['art_dash'];
                        $words = explode(" ", $ArtBody);
                        $first20words = join(" ", array_slice($words, 0, 20));
                    ?>
                        <tr>
                            <td style="width: 40%;" class="tablenone">
                                <img class="userpostimg" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                            </td>
                            <td style="width: 60%;">
                                <img class="userpostimg2" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                                <h3 class="userposth3"><?php echo $ArtTitle; ?> </h3>
                                <p class="userpostcategoryp"><span style="font-weight: bold;">Category: </span><?php echo $ArtCat; ?></p>
                                <div class="userpostbodyp"><?php echo $first20words; ?>...</div>
                                <p class="userpostreadmore">
                                    <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>"><span>Read More</span></a>
                                </p>
                                <hr class="userposthr">
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
            </table>
            <p class="viewalluserstable">
                <a href="animal/all-articles"><span>View All Articles</span></a>
            </p>
        </div>

        <div class="homepage-sidebar">
            <div style="display:<?php echo $wrapper; ?>;">
            <p>Sign Up or Login!</p>
            <div class="icons">
                <a href="userlogin"><button type="button">Sign Up</button></a>
                <a href="userlogin"><button type="button">Sign In</button></a>
            </div>
            </div>
            <div style="display:<?php echo $wrapper2; ?>;">
                    Welcome Back, <?php echo $_SESSION['fname']; ?>!
                    <div class="icons">
                        <a href="user/<?php echo $_SESSION['username']; ?>"><button type="button"><i class="fas fa-user"></i> Profile</button></a><br>
                        <a href="user/<?php echo $_SESSION['username']; ?>/posts" > <button type="button"><i class="fas fa-images"></i> Posts</button></a><br>
                        <a href="pawchat"> <button type="button"><i class="fas fa-inbox"></i> Message</button></a><br>
                        <a href="community/<?php echo $_SESSION['username']; ?>"><button type="button"><i class="fas fa-rss-square"></i> Community Posts</button></a><br>
                        <a href="logout"><button type="button"><i class="fas fa-sign-out-alt"></i> Sign Out</button></a><br>       
                    </div>
                    <?php
                        //include and initialize Poll class 
                        include 'Poll.class.php';
                        $poll = new Poll;
                        //get poll and options data
                        $pollData = $poll->getPolls();
                        //if vote is submitted
                        if(isset($_POST['voteSubmit'])){
                            $voteData = array(
                                'poll_id' => $_POST['pollID'],
                                'poll_option_id' => $_POST['voteOpt']
                            );
                            //insert vote data
                            $voteSubmit = $poll->vote($voteData);
                            if($voteSubmit){
                                $statusMsg = 'Your vote has been submitted successfully.';
                            }else{
                                $statusMsg = 'Your vote has already been counted.';
                            }
                        }
                    ?>
                    <div class="pollContent">
                        <form action="" method="post" name="pollFrm">
                        <h3><?php echo $pollData['poll']['subject']; ?></h3>
                        <ul>
                            <?php foreach($pollData['options'] as $opt){
                                echo '<li><input type="radio" name="voteOpt" value="'.$opt['id'].'" >'.$opt['name'].'</li>';
                            } ?>
                        </ul>
                        <input type="hidden" name="pollID" value="<?php echo $pollData['poll']['id']; ?>">
                        <div class="icons">
                        <input type="submit" name="voteSubmit" class="button" value="Vote"> 
                        <a class="ajaxpopupcreateposts" href="results.php?pollID=<?php echo $pollData['poll']['id']; ?>"><button type="button">Results</button></a> 
                        </div>
                        </form>
                        <?php echo !empty($statusMsg)?'<p class="stmsg">'.$statusMsg.'</p>':''; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="userpostshomepagebackground">
    <div class="animaldiv animaldiv2">
        <h1> Recent Posts</h1>
    </div>
    <div class="userpostshomepageflex">
        <div class="userpostshomepage"> 
        <?php
        $sql = "SELECT * FROM posts WHERE post_approved='1' ORDER BY post_id DESC LIMIT 6;";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $Img = $rows['post_img'];
            $User = $rows['post_user'];
            $Time = $rows['post_time'];
            $dateA = date("h:i a", strtotime($Time));
            $dateB = date("F j, Y", strtotime($Time));
            $dateC = $dateA . ", " . $dateB;
            $newdate = $dateC;
        ?>
            <div class="upgallery-item2">
                <a class="upanodeco" href="user/<?php echo $User ?>/posts">
                <p><span> <strong>Post By:</strong><br><?php echo $User ?><br> <strong>Posted On:</strong><br><?php echo $newdate ?> </span></p>
                    <img src="img/posts/<?php echo $Img ?>" class="upgallery-image2" alt="A Post">
                </a>
            </div>
        <?php
        }
        ?>
        </div>
    </div>
    </div>

</main>


<script type="Text/Javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.sudoSlider.min.js"></script>
<script defer src="js/mylightbox.js"></script>
<script type="text/javascript" >
    $(document).ready(function(){	
        var sudoSlider = $("#slider").sudoSlider({ 
            effect: "pushInRight",
            pause: 5000,
            auto:true,
            prevNext:false,
            continuous: false,
            responsive: true,
            numeric: true,
            slideCount: 1
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.ajaxpopupcreateposts').magnificPopup({
            type: 'ajax'
        });

    });
</script>

<style>
    .upgallery-item {
        margin: auto;
    }
</style>

<?php
require "includes/footer.php";
?>