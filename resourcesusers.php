<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style-test.css" />
    <title>All Users</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>All Users</h1>
    </div>

    <div class="searchbar">
        <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>

    <div class="usersfigureclass">
        <?php
        $sql = "SELECT * FROM users;";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $ID = $rows['user_id'];
            $Username = $rows['username'];
            $FName = $rows['user_fname'];
            $LName = $rows['user_lname'];
            $Email = $rows['user_email'];
            $Phone = $rows['user_phone'];
            $Image = $rows['user_img'];
            $Desc = $rows['user_desc'];
            $Join = $rows['user_join'];
            $newdate = date("F j, Y", strtotime($Join));
            $newdate = $newdate;
        ?>
            <div class="snip1578 target">
                <img src="img/users/<?php echo $Image; ?>" alt="userimg" />
                <div class="divcaptions">
                    <h3><?php echo $FName; ?> <?php echo $LName; ?></h3>
                    <div class="icons">
                        <a href="user/<?php echo $Username; ?>" class="icon1"> <i class="fas fa-user"><span class="tooltiptext2">Profile</span></i></a>
                        <a href="user/<?php echo $Username; ?>/posts" class="icon2"> <i class="fas fa-images"><span class="tooltiptext2">Posts</span></i></a>
                        <a href="pawchat" class="icon3"> <i class="fas fa-inbox"><span class="tooltiptext2">Message</span></i></a>
                        <a href="community/<?php echo $Username; ?>" class="icon4"> <i class="fas fa-rss-square"><span class="tooltiptext2">Community Posts</span></i></a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


</main>


<?php
require "includes/footer.php";
?>