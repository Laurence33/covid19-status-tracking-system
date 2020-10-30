<?php
    include_once 'header.php';
?>

<section>
    <h2>Login</h2>
    <form action="includes/login.inc.php" method="post">
        <label for="uname">Username:</label>
        <input type="text" name="uname" placeholder="Username..."> 
        <br><br>
        <label for="pword">Password</label>
        <input type="password" name="pword" placeholder="Password...">
        <br><br>
        <button type="submit" name="login">Login</button>
    </form>
</section>

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