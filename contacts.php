<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Contacts</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Contact Us</h1>
    </div>

    <div class="contact-form-div">
        <form class="contact-form" action=includes/contactform.inc.php method="POST">
            <h2>Have a question for us?<br> Feel Free to hit us up!</h2>
            <input type="text" required="true" name="cf_name" placeholder="Full Name*"><br>
            <input type="email" required="true" name="cf_email" placeholder="Your Email*"><br>
            <input type="text" name="cf_phone" placeholder="Phone Number (Optional)"><br>
            <input type="text" required="true" name="cf_subject" placeholder="Subject*"><br>
            <textarea name="cf_message" placeholder="  Write your message in 200 Words*" required="true"></textarea><br>
            <button class="btn" type="submit" value="cf_submit" name="cf_submit"> Submit </button>
            <p class="urgent"> Urgent Matter? Email us at: <br> <a href="mailto:mypetizens@gmail.com">mypetizens@gmail.com</a></p>
        </form>
    </div>

</main>


<?php
require "includes/footer.php";
?>