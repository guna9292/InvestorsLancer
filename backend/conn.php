<?php


function connectSql()
{
$HOST = 'localhost'; 
$NAME = 'root';
$PASS = "";
$DB = 'test';
$mysqli = new mysqli($HOST,$NAME,$PASS,$DB);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    return $mysqli;
}
?>

