<?php
require "../admin/includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Admin Panel</title>
</head>

<main class="main-content" style="text-align: center;">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Admin Panel</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="../index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="../admin/articles"><img src="../admin/img/icons/articles.png" alt="articles"></a></td>
                <td><a href="../admin/animals"><img src="../admin/img/icons/animals.png" alt="animals"></a></td>
                <td><a href="../admin/admin-details"><img src="../admin/img/icons/admin.png" alt="admin"></a></td>
                <td><a href="../admin/user-details"><img src="../admin/img/icons/users.png" alt="users"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Articles</td>
                <td style="padding:10px">Animals</td>
                <td style="padding:10px">Admins</td>
                <td style="padding:10px">Users</td>
            </tr>
            <tr>
                <td><a href="../admin/posts-manager"><img src="../admin/img/icons/posts.png" alt="posts"></a></td>
                <td><a href="../admin/community-manager"><img src="../admin/img/icons/community.png" alt="Community"></a></td>
                <td><a href="../admin/locations"><img src="../admin/img/icons/location.png" alt="locations"></a></td>
                <td><a href="../admin/contact-form-enquries"><img src="../admin/img/icons/contactform.png" alt="contactform"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Posts</td>
                <td style="padding:10px">Community</td>
                <td style="padding:10px">Locations</td>
                <td style="padding:10px">Contact Forms</td>
            </tr>
            <tr>
                <td><a href="../admin/gallery"><img src="../admin/img/icons/gallery.png" alt="gallery"></a></td>
                <td><a href="../admin/image-upload"><img src="../admin/img/icons/upload.png" alt="upload"></a></td>
                <td><a href="../admin/newsletterhtmls"><img src="../admin/img/icons/newsletterlaunch.png" alt="newsletter launch"></a></td>
                <td><a href="../admin/newsletter-subs"><img src="../admin/img/icons/newsletter.png" alt="newsletter"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Gallery</td>
                <td style="padding:10px">Image Upload</td>
                <td style="padding:10px">Newsletters</td>
                <td style="padding:10px">Newsletters Subs</td>
            </tr>
        </table>
    </div>

</main>


<?php
require "../admin/includes/footer.php";
?>