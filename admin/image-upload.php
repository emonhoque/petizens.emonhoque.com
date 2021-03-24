<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Image Upload</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Image Upload</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="../admin/image-upload-articles"><img src="../admin/img/icons/articleupload.png" alt="articles"></a></td>
                <td><a href="../admin/image-upload-users"><img src="../admin/img/icons/usersupload.png" alt="admin"></a></td>
                <td><a href="../admin/image-upload-animals"><img src="../admin/img/icons/animalsupload.png" alt="users"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Articles Images</td>
                <td style="padding:10px">Users Images</td>
                <td style="padding:10px">Animals Images</td>
            </tr>
            <tr>
                <td><a href="../admin/image-upload-breeds"><img src="../admin/img/icons/breedsupload.png" alt="placeholder"></a></td>
                <td><a href="../admin/image-upload-posts"><img src="../admin/img/icons/postsupload.png" alt="placeholder"></a></td>
                <td><a href="../admin/image-upload-cposts"><img src="img/icons/cpostsupload.png" alt="newsletter"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px"> Breeds Images </td>
                <td style="padding:10px"> Posts Images </td>
                <td style="padding:10px"> CPosts Images </td>
            </tr>
            <tr>
                <td><a href="../admin"><img src="img/icons/back.png" alt="back"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Back</td>
            </tr>
        </table>
    </div>

</main>

<?php
require "includes/footer.php";
?>