<?php
    include_once 'header.php';
?>

<section>
    <h2>Signup</h2>
    <form action="includes/signup.inc.php" method="post">
        <label for="uname">Username:</label>
        <input type="text" name="uname" placeholder="Username..."> 
        <br><br>
        <label for="pword">Password:</label>
        <input type="password" name="pword" placeholder="Password...">
        <br><br>
        <label for="pword">Confirm Password:</label>
        <input type="password" name="cpword" placeholder="Password...">
        <br><br>
        <button type="submit" name="signup">Signup</button>
    </form>
</section>
<?php
    if(isset($_GET['signup'])) {

        if($_GET['signup'] == 'usernameExists') {
            echo '<h5>Username taken.</h5>';
        }else if ($_GET['signup'] == 'pwordNotMatched') {
            echo '<h5>Password does not match.</h5>';
        }else {
            echo '<h5>You successfully sign up.</h5>';
        }
        
    }
    
?>
<?php   
    include_once 'footer.php';
?>