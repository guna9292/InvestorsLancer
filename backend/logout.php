<?php
session_start();

if(isset($_SESSION['uname']))
{
    unset($_SESSION['uname']);
    unset($_SESSION['role']);
    
    session_destroy();
    header('Location: index.php');
}
else{
    session_destroy();
    header('Location: index.php');
}
?>