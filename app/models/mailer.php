<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
    public function sendVerificationCode($email, $verificationCode)
    {
        $mail = new PHPMailer(true);
        try {
            // Cấu hình email
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ngongocanh15072311@gmail.com';
            $mail->Password = 'dpjr otuv enqy otax';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('ngongocanh15072311@gmail.com', 'babyStress');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Mã xác nhận';
            $mail->Body = "Mã xác nhận của bạn là: <b>$verificationCode</b>";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Không thể gửi email: " . $mail->ErrorInfo);
            return false;
        }
    }
}

