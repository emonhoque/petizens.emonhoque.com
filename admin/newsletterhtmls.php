<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Newsletter Panel</title>
</head>

<main class="main-content">

    <div class="admintable">
        <table class="admintablemain">
            <thead>
                <th colspan="4">
                    <h1>Newsletter Panel</h1>
                </th>
            </thead>
            <tr>
                <td style="padding:10px 10px 30px 10px" colspan="4">If you aren't an admin, you probably should not be here! Click <a class="here" href="index">here</a> to go back home!</td>
            </tr>
            <tr>
                <td><a href="../newsletters/launch"><img src="img/icons/newsletterlaunch.png" alt="locations"></a></td>
                <td><a href="../newsletters/emailverification"><img src="img/icons/newsletterlaunch.png" alt="owners"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Launch Newsletter</td>
                <td style="padding:10px">Email Verification</td>
            </tr>
            <tr>
                <td><a href="../newsletters/launch"><img src="img/icons/newsletterlaunch.png" alt="contactform"></a></td>
                <td><a href="admin"><img src="img/icons/back.png" alt="newsletter"></a></td>
            </tr>
            <tr class="attxt">
                <td style="padding:10px">Newsletter X</td>
                <td style="padding:10px">Back</td>
            </tr>
        </table>
    </div>

</main>


<?php
require "includes/footer.php";
?>