<?php
session_start();
require 'conn.php';

if(!isset($_SESSION['uname']))
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


    $id = validate($_GET['pid']);
    $user = validate($_GET['us']);
    $conn = connectSql();
    $stmt = $conn->prepare("UPDATE freelancers set projectID=? where email=?");
    $stmt->bind_param('ss',$id,$user);
    $stmt->execute();

    $res = $conn->query("SELECT * FROM projects where projectID='$id'");
    $row = $res->fetch_assoc();
    $noe = $row['noe'];
    $noe = $noe+1;
    $stmt2 = $conn->prepare("UPDATE projects set noe=? where projectID=?");
    $stmt2->bind_param('ds', $noe,$id);
    $stmt2->execute();
    echo "<script> window.location.replace('index.php');</script>";

    $conn->close();


   

?>