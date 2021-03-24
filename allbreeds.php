<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

if (
    !empty($_SESSION['id'])
) {
    $createUser = "inline-block";
} else {
    $createUser = "none";
}

$breedcate = ucwords($_GET['category']);

$sql = "SELECT * FROM article_categories WHERE category_name='$breedcate'";
$res = $conn->query($sql);
while ($rows = $res->fetch_assoc()) {
    $Validation = $rows['category_name'];
}

if (empty($Validation)) {
    header("location: /error-404?breed-not-found");
}

$dive = mysqli_query($conn, "SELECT * FROM breed WHERE breed_category='$breedcate' AND breed_approve='1';");
$hiderow = mysqli_num_rows($dive);

if ($hiderow < 1) {
    $HideDiv = "block";
}

ob_end_flush();
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>All <?php echo $breedcate; ?> Breeds</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <?php
        $sql = "SELECT * FROM article_categories WHERE category_name = '$breedcate'";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $CateName = ucfirst($rows['category_name']);
            $CateDesc = $rows['category_description']
        ?>
            <h1> <?php echo $CateName; ?> </h1>
            <p class="animals-tablep"> <?php echo $CateDesc; ?> </p>
        <?php
        }
        ?>
    </div>


    <div class="userpostflex">
        <div class="userposts">
            <table class="userpoststable">
                <thead>
                    <div class="noofarts">
                        <h2>Different Breeds of <?php echo ucwords($breedcate); ?> </h2>
                        <a class="editbuttonnostyle" href="add-breed">
                            <button type="submit" class="createpostbutton editbuttonusershover" style="display:<?php echo $createUser ?>;"> Add New Breed <i class="fas fa-plus" style="font-size:20px"></i></button>
                        </a>
                    </div>
                    <div class="searchbar">
                        <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
                    </div>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <h4 class="missingcontent" style="display:<?php echo $HideDiv; ?>;">There are no breeds for this category!</h4>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM breed WHERE breed_category='$breedcate' AND breed_approve='1' ORDER BY breed_id;";
                    $res = $conn->query($sql);
                    while ($rows = $res->fetch_assoc()) {
                        $BreedID = $rows['breed_id'];
                        $BreedCat = ucwords($rows['breed_category']);
                        $BreedName = $rows['breed_name'];
                        $BreedColor = $rows['breed_color'];
                        $BreedDetails = $rows['breed_details'];
                        $BreedImg = $rows['breed_img'];
                    ?>
                        <tr class="target">
                            <td style="width: 50%;" class="tablenone">
                                <img class="userpostimg21" src="img/breeds/<?php echo $BreedImg; ?>" alt="articleimg">
                            </td>
                            <td style="width: 50%;">
                                <img class="userpostimg22" src="img/breeds/<?php echo $BreedImg; ?>" alt="articleimg">
                                <h3 class="userposth32"><?php echo $BreedName; ?> </h3>
                                <p class="userpostcategoryp2"><span style="font-weight: bold;">Color: </span><?php echo $BreedColor; ?></p>
                                <div class="userpostbodyp2"><?php echo $BreedDetails; ?></div>
                                <hr class="userposthr">
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</main>


<?php
require "includes/footer.php";
?>