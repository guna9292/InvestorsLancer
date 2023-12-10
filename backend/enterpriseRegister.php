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
    $uname = validate($_POST['uname']);
    $uemail = validate($_POST['uemail']);
    $upass = validate($_POST['upass']);
    $company = validate($_POST['company']);
    $companyDomain = validate($_POST['companyDomain']);
    $role = $_POST['role'];
    $upass = sha1($upass);

    $conn = connectSql();
    $stmt = $conn->prepare("INSERT INTO users (email, pass, roles) VALUES (?,?,?)");
    $stmt->bind_param('sss', $uemail, $upass,$role);
    $stmt->execute();

    $stmt2 = $conn->prepare("INSERT INTO enterprise (email,uname,company,companyDomain) VALUES (?,?,?,?)");
    $stmt2->bind_param('ssss', $uemail,$uname,$company,$companyDomain);
    $stmt2->execute();
    
    
    $_SESSION['uname'] = $uemail;
    $_SESSION['role'] = $role;
    
    echo "<script> window.location.replace('index.php');</script>";
}
    else{
        echo "<script> window.location.replace('freelancerlogin.php');</script>";
    }
    $conn->close();


   

?>