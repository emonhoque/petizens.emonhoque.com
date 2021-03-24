<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Subscription Successful</title>
</head>

<main class="main-content">

    <div class="content">
        <header>Subscription Successful!</header><br>
        <p>
            Click <a class="here" href="index">here</a> if you are not redirected to
            the homepage in <span id="counter">10</span> seconds!
        </p>
        <p>
            We will email you once we are ready!
        </p>
        <img style="width: 300px;" src="img/logo/logo2.png">

    </div>

    <script type="text/javascript">
        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML) <= 1) {
                location.href = 'index';
            }
            if (parseInt(i.innerHTML) != 0) {
                i.innerHTML = parseInt(i.innerHTML) - 1;
            }
        }
        setInterval(function() {
            countdown();
        }, 1000);
    </script>

</main>


<?php
require "includes/footer.php";
?>