
<?php
$conn = mysqli_connect('localhost','root','','test');
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}

?>