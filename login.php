<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID19 Status Tracking System</title>
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="css/login.css"/>
</head>
<body>
    
<div class="wrapper">
      <div class="title">Login</div>
<form action="includes/login.inc.php" method="post"">
        <div class="field">
          <input type="username" placeholder="username" name="uname" required>
          <label>Email Address</label>
        </div>
          <div class="field">
          <input  type="password"  placeholder="password" name="pword">
          <label>Password</label>
        </div>
            <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
            <div class="pass-link">
                 <a href="#">Forgot password?</a></div>
            </div>
            <div class="field">
                <input type="submit" name="login" value="Login">
             </div>
            <div class="signup-link">
             Not a member? <a href="#">Signup now</a></div>
</form>
</div>


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
