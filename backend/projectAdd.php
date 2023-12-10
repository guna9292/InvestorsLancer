<?php
session_start();
require 'conn.php';

if(!isset($_SESSION['uname']))
{
    header('Location: index.php');
}

if(!($_SESSION['role'] == 'freelancer'))
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
    $email = $_SESSION['uname'];
    $id = validate($_POST['projectID']);
    $name = validate($_POST['projectname']);
    $domain = validate($_POST['projectDomian']);
    $duration = $_POST['duration'];    
    $budget = $_POST['budget'];
    $noe = 0;
    $conn = connectSql();
    $stmt2 = $conn->prepare("UPDATE enterprise set projectID = ? where email=?");
    $stmt2->bind_param('ss',$id,$email);
    $stmt2->execute();
    $stmt = $conn->prepare("INSERT INTO projects (id, projectName,projectDomain, duration,noe,budget) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssds', $id, $name, $domain, $duration, $noe,$budget);
    $stmt->execute();
    echo "<script> window.location.replace('index.php');</script>";
}
    else{
        echo "<script> window.location.replace('freelancerlogin.php');</script>";
    }
    $conn->close();


   

?>