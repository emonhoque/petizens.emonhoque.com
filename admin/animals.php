<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Animals</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Animals Manager</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="3">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="animalsbreeds"><img src="img/icons/animalsbreeds.png" alt="animalsbreeds"></a></td>
                <td><a href="breeds-approval"><img src="img/icons/approvebreeds.png" alt="Approve Breeds"></a></td>
                <td><a href="editcategories"><img src="img/icons/animalscategory.png" alt="editcategories"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Breeds</td>
                <td style="padding:10px">Approve Breeds</td>
                <td style="padding:10px">Edit Categories</td>
            </tr>
            <tr>
                <td><a href="#"><img src="img/icons/placeholder.png" alt="deletearticles"></a></td>
                <td><a href="#"><img src="img/icons/placeholder.png" alt="editarticles"></a></td>
                <td><a href="admin"><img src="img/icons/back.png" alt="back"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Placeholder</td>
                <td style="padding:10px">Placeholder</td>
                <td style="padding:10px">Back</td>
            </tr>
        </table>
    </div>

</main>


<?php
require "includes/footer.php";
?>