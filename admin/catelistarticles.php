<?php
require "includes/header.php";

$CatName = $_GET['category_name'];
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>List Articles</title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>All <?php echo $CatName; ?> Articles</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>
    <div class="scrollll">
        <table class="listarticles">
            <tr>
                <th> ID </th>
                <th> Admin </th>
                <th> Category </th>
                <th> Title </th>
                <th> Date </th>
                <th> Image </th>
                <th> Tags </th>
                <th class="last3cells"> View </th>
                <th class="last3cells"> Edit </th>
                <th class="last3cells"> Delete </th>
            </tr>
            <?php
            $sql = "SELECT * FROM articles WHERE art_category='$CatName'";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ArtID = $rows['art_id'];
                $ArtAdmin = $rows['art_admin'];
                $ArtCat = $rows['art_category'];
                $ArtTitle = $rows['art_title'];
                $ArtDate = $rows['art_date'];
                $ArtImg = $rows['art_img'];
                $ArtTags = $rows['art_tags'];
                $dashedTitle = $rows['art_dash'];
            ?>
                <tr class="target">
                    <td> <?php echo $ArtID; ?> </td>
                    <td> <?php echo $ArtAdmin; ?> </td>
                    <td> <?php echo $ArtCat; ?> </td>
                    <td> <?php echo $ArtTitle; ?> </td>
                    <td> <?php echo $ArtDate; ?> </td>
                    <td> <?php echo $ArtImg; ?> </td>
                    <td> <?php echo $ArtTags; ?> </td>
                    <td class="last3cells"> <a class="view-art" href="../article/<?= $ArtCat ?>/<?= $ArtID ?>/<?= $dashedTitle ?>">VIEW</a> </td>
                    <td class="last3cells"> <a class="edit-art" href="articleseditpage?art_id=<?php echo $ArtID; ?>">EDIT</a> </td>
                    <td class="last3cells"> <a class="delete-art" href="includes/deletearticle.inc?art_id=<?php echo $ArtID; ?>">DELETE</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>


    <p class="backtoadminpanel"> <a href="catearticles">Go Back to Categories! </a></p>


</main>

<script>
    function locfunction() {
        var input = document.getElementById("searchloc");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName('target');

        for (i = 0; i < nodes.length; i++) {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].style.display = "table-row";
            } else {
                nodes[i].style.display = "none";
            }
        }
    }
</script>

<?php
require "includes/footer.php";
?>