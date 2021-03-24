<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

$ArtCate = $_GET['cate'];
$ArtID = $_GET['artid'];
$dashedTitle = $_GET['title'];

$sql = "SELECT * FROM articles WHERE art_id='$ArtID'";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Validation = $rows['art_id'];
}

if (empty($Validation)) {
    header("location: /error-articles?not-found");
}

ob_end_flush();
?>

<style>
    .fa {
        line-height: inherit;
    }
</style>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <?php
    $sql = "SELECT * FROM articles WHERE art_id='$ArtID'";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $ArtTitle = $rows['art_title'];
    ?>
        <title><?php echo $ArtTitle; ?></title>
    <?php
    }
    ?>
</head>

<main class="main-content">


    <div class="artpage">
        <div class="mainartbody">
            <?php
            $sql = "SELECT * FROM articles WHERE art_id='$ArtID'";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID2 = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = strtolower($rows['art_category']);
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtBody = $rows['art_body'];
                $ArtTags = $rows['art_tags'];
                $date = "$ArtDate";
                //converts date and time to seconds  
                $sec = strtotime($date);
                //converts seconds into a specific format  
                $newdate = date("h:i A d/m/Y", $sec);
                //Appends seconds with the time  
                $newdate = $newdate;
            ?>
                <h1 class="arttitlepage"><?php echo $ArtTitle; ?></h1>
                <img class="artimgpage" src="img/articles/<?php echo $ArtImg; ?>" alt="articleimg">
                <br><br>
                <p class="artadminpage"><span style="font-weight: normal;"> Written By: </span><a href="user/<?php echo $ArtAdmin; ?>"><?php echo $ArtAdmin; ?></a></p>
                <p class="artadminpage"><span style="font-weight: normal;"> Category: </span><a href="animals/<?php echo $ArtCat; ?>"><?php echo $ArtCat; ?></a></p>
                <p class="artdatepage"><span style="font-weight: normal;"> Last Edited: </span><?php echo $newdate; ?></p><br>
                <div class="artbodypage">
                    <?php echo $ArtBody; ?>
                </div><br>
            <?php
            }
            ?>
        </div>
        <div class="artsidebar">
            <h1 style="padding-top: 10px; font-size:larger;"> Other Articles! </h1>
            <div class="sidebaranimals-row-flex">
                <?php
                $sql = "SELECT * FROM articles WHERE art_category ='$ArtCate' ORDER BY art_id DESC LIMIT 3";
                $res = $conn->query($sql);
                while ($rows = $res->fetch_assoc()) {
                    $ArtID = $rows['art_id'];
                    $ArtCat = $rows['art_category'];
                    $ArtTitle = $rows['art_title'];
                    $ArtImg = $rows['art_img'];
                    $dashedTitle = $rows['art_dash'];
                ?>
                    <div class="sidebaranimals-row">
                        <h3 class="sidebararicle-animals-title"> <?php echo $ArtTitle; ?> </h3>
                        <img class="sidebararicle-animals-image" src="img/articles/<?php echo $ArtImg; ?>">
                        <p class="sidebaranimals-readmore">
                            <a href="article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">Read More</a> </p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="share">
                <p style="padding-bottom: 10px;">Share With Friends!</p>
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_copy_link"></a>
                    <a class="a2a_button_email"></a>
                </div>
                <br>
            </div>
        </div>
        <div class="sharemobile"><br>
            <p style="padding-bottom: 10px; color:ivory;">Share With Friends!</p>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class=" a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_copy_link"></a>
                <a class="a2a_button_email"></a>
            </div>
            <br>
        </div>
    </div>

</main>

<script>
    var documenttitle = document.title;
    var modifiedtitle = documenttitle + " " + "on Petizens!";
    document.title = modifiedtitle;

    var a2a_config = a2a_config || {};
    a2a_config.num_services = 6;
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<?php
require "includes/footer.php";
?>