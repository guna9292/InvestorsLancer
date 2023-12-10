<?php
session_start();
require 'conn.php';

if(isset($_SESSION['uname']))
{
    header('Location: index.php');
}


function validate($str)
{
    $res = htmlspecialchars($str);
    $res = trim($str);
    $res = strip_tags($str);
    $res = stripslashes($str);
    return $res;
}

if (isset($_POST['submit']))
{
    $uemail = validate($_POST['uemail']);
    $upass = validate($_POST['upass']);
    $upass = sha1($upass);
    $conn = connectSql();
    $res = $conn->query("SELECT * FROM users WHERE email='$uemail' AND pass='$upass'");
    if($res->num_rows > 0)
    {
        $row = $res->fetch_assoc();
        $role = $row['roles'];
        $_SESSION['uname'] = $uemail;
        $_SESSION['role'] = $role;
        echo "<script> window.location.replace('sample.php');</script>";
    }
    else{
        echo "<script> alert('Login Credentials not Found')</script>";
    }
    $conn->close();


}   

?>