<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="uname">
        <label for="password">Password:</label>
        <input type="password" name="password" id="pword">

        <button type="submit">Login</button>
    </form>

    <?php
        if(isset($_POST['username']) and isset($_POST['password'])) {
            if($_POST['username'] == "Laurence" && $_POST['password'] == "Cortez"){
                echo '<h3>You are now logged in.</h3>';
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];

                echo '<span><b>Username: </b></span>' . $_SESSION['username'] . '<br>';
                echo '<span><b>Password: </b></span>' . $_SESSION['password'] . '<br>';
            }
            else
                echo '<h3>Wrong username or password.</h3>';
        }
    ?>
</body>
</html>