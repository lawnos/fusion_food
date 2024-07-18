<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer
{

    public function dathangmail($maildathang, $tieude, $noidung)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        try {

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Nó tả về kiểu dữ liệu
            $mail->SMTPDebug = 0; // Im re luôn
            $mail->isSMTP(); // Gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'anhsonw24@gmail.com';


            $mail->Password = 'gqun asoy dwoc uzlr';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            $mail->setFrom('anhsonw24@gmail.com', 'Fusion Food');
            $mail->addAddress($maildathang, 'Khách Hàng'); // Add recipient email and name

            // Content
            $mail->isHTML(true);
            $mail->Subject = $tieude;
            $mail->Body = $noidung;

            $mail->send();
        } catch (Exception $e) {
            echo "Không gửi được bị lỗi: {$mail->ErrorInfo}";
        }
    }
}
