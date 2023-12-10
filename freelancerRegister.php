<?php
session_start();
require 'conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_SESSION['uname']))
{
    header('Location: sample.php');
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
    $skills = validate($_POST['skills']);
    $experience = $_POST['experience'];
    $role = $_POST['role'];
    $upass = sha1($upass);

    $conn = connectSql();
    $stmt = $conn->prepare("INSERT INTO users (email, pass, roles) VALUES (?,?,?)");
    $stmt->bind_param('sss', $uemail, $upass,$role);
    $stmt->execute();

    $stmt2 = $conn->prepare("INSERT INTO freelancers (email,uname,skills,experience) VALUES (?,?,?,?)");
    $stmt2->bind_param('sssd', $uemail,$uname,$skills,$experience);
    $stmt2->execute();
    



require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
    
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'nagothigunesh.21.it@anits.edu.in';                     //SMTP username
    $mail->Password   = 'tfth nxwq hflc ruem';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, 'Investor\'s Lancer');
    $mail->addAddress($uemail);     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Greetings from INVESTOR\'S LANCER';
    $mail->Body    = 'You have registered as a freelancer in Investors lancer and the goodies will be waiting for you after facing an interview in coming 3 days';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script> alert("A confirmation mail is sent.")</script>';
} catch (Exception $e) {
    echo '<script> alert("A confirmation mail is not sent.")</script>';
}
    $_SESSION['uname'] = $uemail;
    $_SESSION['role'] = $role;
    
    echo "<script> window.location.replace('sample.php');</script>";
}
    else{
        echo "<script> window.location.replace('freelancerlogin.php');</script>";
    }
    $conn->close();


   

?>