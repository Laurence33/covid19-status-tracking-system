<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID19 Status Tracking System</title>
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="css/login.css"/>
</head>
<body>
    <div class="login-div">
        <div class="logo"><img src="img/logo.png" alt=""></div>
            <div class="title">Covid-19 Status Tracking System</div>
            <div class="sub-title">Login</div>
                <form action="">
                    <div class="fields">
                        <div class="username">
                            <input type="username" class="user-input" placeholder="username" />
                        </div>
                        <div class="password">
                            <input type="password" class="pass-input" placeholder="password" />
                        </div>
                    </div>
                        <button class="signin-button">Login</button>
                </form>
        <div class="link">
            <a href="#">Forgot password?</a> or <a href="#">Sign up</a>
        </div>
    </div>

</body>

<?php
    if(isset($_GET['login'])) {
        if($_GET['login'] == 'error') {
            echo '<h3>Incorrect Username or Password</h3>';
        }
    }
?>

<?php   
    include_once 'footer.php';
?>
