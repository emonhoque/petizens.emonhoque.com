<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Posts Panel</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Posts Manager</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="posts-list"><img src="img/icons/postslist.png" alt="list"></a></td>
                <td><a href="posts-approval"><img src="img/icons/postsapproved.png" alt="approvedposts"></a></td>
                <td><a href="comments-approval"><img src="img/icons/postscomments.png" alt="approvedcomments"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Posts List</td>
                <td style="padding:10px">Approve Posts</td>
                <td style="padding:10px">Approve<br>Comments</td>
            </tr>
            <tr>
                <td><a href="../admin/gallery-postsmanager"><img src="../admin/img/icons/imgposts.png" alt="imgposts"></a></td>
                <td><a href="#"><img src="../admin/img/icons/placeholder.png" alt="Placeholder"></a></td>
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