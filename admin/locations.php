<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Locations Panel</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Locations Manager</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="listlocations"><img src="img/icons/listlocations.png" alt="listlocations"></a></td>
                <td><a href="addlocation"><img src="img/icons/addlocations.png" alt="addlocations"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">View All Locations</td>
                <td style="padding:10px">Add New Location</td>
            </tr>
            <tr>
                <td><a href="deletelocations"><img src="img/icons/deletelocations.png" alt="deletelocations"></a></td>
                <td><a href="admin"><img src="img/icons/back.png" alt="newsletter"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Delete Location</td>
                <td style="padding:10px">Back</td>
            </tr>
        </table>
    </div>

</main>


<?php
require "includes/footer.php";
?>