<?php
require "includes/header.php";
require_once 'includes/login.inc.php';
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <title>User Registration</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Registration and Login</h1>
    </div>

    <div class="container">
        <div class="homepage page">
            <div class="column hidethismobile">
                <p class="app_title"></p>
            </div>
        </div>
        <div class="loginpage page">
            <div class="column">
                <div class="row">
                    <img src="img/logo/logo5.png" alt="" class="app_title">
                </div>
                <?php if (count($errors) > 0) : ?>
                    <?php foreach ($errors as $errors) : ?>
                        <div class="registrationerrorbox">
                            <span class="registrationclosebtn">&times;</span>
                            <?php echo $errors; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="row">
                    <div class="login-area">
                        <h2 class="active" data-active="signin"><a href="#signin-form" class="signBtn" data-action="signin">Sign In</a></h2>
                        <h2 data-active="signup"><a href="#signup-form signup" class="signBtn" data-action="signup">Sign Up</a></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="user-info">
                        <form action="userlogin" class="user-info__login" autocomplete="off" method="POST">
                            <div class="user-info__id">
                                <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username" required />
                                <div class="user-info__password">
                                    <input type="password" name="password" placeholder="Enter password" required />
                                </div>
                                <div class="user-info__submit">
                                    <button type="submit" name="signin-btn" class="btn-submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <form action="userlogin" class="user-info__signup hidden" autocomplete="off" method="POST">
                            <div class="user-info__id">

                                <input type="text" name="fname" value="<?php echo $fname ?>" placeholder="First Name" required />
                                <input type="text" name="lname" value="<?php echo $lname ?>" placeholder="Last Name" required />
                                <input type="email" name="email" value="<?php echo $email ?>" placeholder="E-mail Address" required />
                                <input type="tel" name="phone" value="<?php echo $phone ?>" placeholder="Phone Number (Optional)" />
                                <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username" required />
                                <div class="user-info__password">
                                    <input type="password" name="password" placeholder="Password" required />
                                </div>
                                <div class="user-info__submit">
                                    <button type="submit" name="signup-btn" class="btn-submit">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <div class="user-guide">
                            <p class="helper-text">
                                Forgot password? Email us at: <br> <a href="mailto:mypetizens@gmail.com">mypetizens@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const signBtn = document.querySelectorAll('.signBtn');
    const activeBtn = document.querySelector('.active')
    const signup = document.querySelector('.user-info__signup')
    const login = document.querySelector('.user-info__login')
    const signupActive = false

    signBtn.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const action = e.target.dataset.action
            const parent = e.target.parentNode
            if (action === 'signup') {
                activeBtn.classList.remove('active')
                parent.classList.add('active')
                signup.classList.remove('hidden')
                login.classList.add('hidden')
            } else if (action === 'signin') {
                const signupActive = document.querySelector('h2[data-active="signup"]')
                signup.classList.add('hidden')
                login.classList.remove('hidden')
                parent.classList.add('active')
                signupActive.classList.remove('active')
                alert(testing)
            }
        })
    });
</script>

<script>
    var close = document.getElementsByClassName("registrationclosebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function() {
                div.style.display = "none";
            }, 600);
        }
    }
</script>


<?php
require "includes/footer.php";
?>