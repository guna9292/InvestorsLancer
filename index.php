<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invertor's Lancers</title>
</head>
<body>
    <h1> Home page </h1>
    <h3> name : <?php echo (isset($_SESSION['uname']))?$_SESSION['uname']:'none' ?> </h3>
    <h3> role : <?php echo (isset($_SESSION['role']))?$_SESSION['role']:'none' ?> </h3>
    <a href="freelancerlogin.php">Freelancers login</a>
    <br>
    <a href="enterpriselogin.php">Enterpreneurs login </a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>