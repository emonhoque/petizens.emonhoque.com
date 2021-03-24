<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Gallery</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Image Gallery</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="../admin/gallery-articles"><img src="../admin/img/icons/imgarticles.png" alt="articles"></a></td>
                <td><a href="../admin/gallery-users"><img src="../admin/img/icons/imgusers.png" alt="admin"></a></td>
                <td><a href="../admin/gallery-animals"><img src="../admin/img/icons/imganimals.png" alt="users"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Articles Gallery</td>
                <td style="padding:10px">Users Gallery</td>
                <td style="padding:10px">Animals Gallery</td>
            </tr>
            <tr>
                <td><a href="../admin/gallery-breeds"><img src="../admin/img/icons/imgbreeds.png" alt="breeds"></a></td>
                <td><a href="../admin/gallery-posts"><img src="../admin/img/icons/imgposts.png" alt="posts"></a></td>
                <td><a href="../admin/gallery-cposts"><img src="img/icons/imgcposts.png" alt="cposts"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px"> Breeds Gallery </td>
                <td style="padding:10px"> Posts Gallery </td>
                <td style="padding:10px"> Cposts Gallery </td>
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