<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Something Went Wrong!</title>
</head>

<main class="main-content">

    <div class="content">
        <header>Oh No! Something went wrong!</header><br>
        <p>
            Click <a class="here" href="index">here</a> to try again, if you are not redirected to the homepage in <span id="counter">10</span> seconds!
        </p>
        <p>
            Sorry about that!
        </p>
        <img style="width: 300px;" src="img/logo/logo2.png">

    </div>

</main>

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



<?php
require "includes/footer.php";
?>