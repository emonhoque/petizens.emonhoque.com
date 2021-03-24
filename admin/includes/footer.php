<head>
    <link rel="stylesheet" href="style/admin-footer.css" />
</head>

<footer>
    <div class="footer-container">
        <div class="left-col">
            <img src="img/logo/logo4-admin.png" alt="" class="logo">
            <div class="social-media">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                <a href="https://www.tumblr.com/"><i class="fab fa-tumblr"></i></a>
                <a href="admin"><i class="fa fa-user"></i></a>
            </div>
            <p class="rights-text">© 2020 Created By Tofazzal. All Rights Reserved.</p>
        </div>
        <div class="right-col">
            <h1>Our Newsletter</h1>
            <div class="border"></div>
            <p>Enter Your Email to get our news and updates.</p>
            <form action="newsletter.inc.php" class="newsletter-form" method="POST">
                <input type="email" name="newsletter" class="newsletter" required="true" placeholder="Enter Your Email*">
                <button type="submit" name="btn-newsletter" class="btn-newsletter" value="submit">Submit</button>
            </form>
        </div>
    </div>
</footer>

<button class="bttop" onclick="topFunction()" id="bttop" title="Go to top">
    <i class="fas fa-chevron-up"></i>
</button>
<script>
    //Get the button
    var mybutton = document.getElementById("bttop");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

</body>

</html>