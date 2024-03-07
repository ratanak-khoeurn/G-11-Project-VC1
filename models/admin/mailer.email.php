<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "vedor/autoload.php";

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMPTAuth = true;

$mail->Host = "smtp.exmaple.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_DEFAULT;

