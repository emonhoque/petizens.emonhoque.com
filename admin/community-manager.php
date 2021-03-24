<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Community Posts Panel</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Community Posts Manager</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="cposts-list"><img src="img/icons/cpostslist.png" alt="list"></a></td>
                <td><a href="cposts-approval"><img src="img/icons/cpostsapproved.png" alt="approvedcposts"></a></td>
                <td><a href="cpostcomments-approval"><img src="img/icons/cpostscomments.png" alt="approvedcomments"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">CPosts List</td>
                <td style="padding:10px">Approve CPosts</td>
                <td style="padding:10px">Approve<br>Comments</td>
            </tr>
            <tr>
                <td><a href="gallery-cpostsmanager"><img src="img/icons/imgcposts.png" alt="imgposts"></a></td>
                <td><a href="#"><img src="img/icons/placeholder.png" alt="Placeholder"></a></td>
                <td><a href="admin"><img src="img/icons/back.png" alt="back"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">View Images</td>
                <td style="padding:10px">Placeholder</td>
                <td style="padding:10px">Back</td>
            </tr>
        </table>
    </div>

</main>


<?php
require "includes/footer.php";
?>