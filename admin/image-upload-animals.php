<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Image Upload for Animals</title>
</head>

<main class="main-content">
    <div class="listarticlesdiv"><br>
        <h1>Upload File for Animals</h1><br>
    </div>

    <form action="includes/uploadmanageranimals.inc" method="post" enctype="multipart/form-data">
        <label class="fileuploadname" for=" fileSelect">Filename:</label><br><br>
        <input class="fileupload" type="file" name="file" id="file"><br><br>
        <button class="imgupload" type="submit" name="submit">UPLOAD</button>
        <p><strong>Note:</strong> Only upload images required for animals here!</p>
    </form>


    <p class="backtoadminpanel"> <a href="image-upload">Go Back to Image Upload! </a></p>


</main>



<?php
require "includes/footer.php";
?>