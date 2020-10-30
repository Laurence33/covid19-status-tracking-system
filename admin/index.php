<?php
    include_once 'header.php';
    session_start();
?>

<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<h3>You have successfully logged in.</h3>

<?php   
    include_once 'footer.php';
?>