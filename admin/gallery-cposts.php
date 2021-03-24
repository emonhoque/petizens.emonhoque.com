<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Community Posts Gallery</title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Community Posts Gallery</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>

    <div style="display: inline-block; text-align: center;">
        <div class="galleryimgdiv">
            <table class="galleryimgtable">
                <th colspan=3 style="border-bottom: 3px solid black;">
                    <h2>Pictures</h2>
                </th>
                <tr>
                    <th>Name</th>
                    <th>Img</th>
                    <th class="lastgallerycell">Delete</th>
                </tr>
                <?php
                $dirname = "../img/cposts/";
                $images = glob($dirname . "*.*");
                foreach ($images as $image) {
                ?>
                    <tr class="target">
                        <td><?php echo $image; ?></td>
                        <td><?php echo '<img style="width:150px; margin: 10px 10px;" src="' . $image . '" />'; ?></td>
                        <td class="lastgallerycell">
                            <form action="includes/deletegallery.inc" method="POST">
                                <input type="checkbox" id="deletegal" name="deletegal" value="<?php echo $image; ?>">
                                <label for="deletegal"> I want to delete this picture! </label><br>
                                <button class="delete-gallery-a" type="deletegalleryname" name="deletegalleryname">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <p class="backtoadminpanel"> <a href="gallery">Go Back to Gallery! </a></p>

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