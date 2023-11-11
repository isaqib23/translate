<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (!function_exists('getCountryName')) {
    function getCountryName($key) {
        $arr = [
            1 => 'English',
            2 => 'Spanish',
            3 => 'Hindi',
            4 => 'Japanese',
            5 => 'Portuguese',
            6 => 'Chinese',
            7 => 'Russian',
            8 => 'Persian',
            9 => 'Arabic'
        ];

        return $arr[$key] ?? null;
    }
}

if (!function_exists('sendEmail')) {
    function sendEmail($to, $subject, $body) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output (You can disable it once testing is done)
            $mail->isSMTP();   // Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth   = true;  // Enable SMTP authentication
            $mail->Username   = 'info@spotlightpos.com';  // SMTP username
            $mail->Password   = 'kGM9S5jdEYkgbyX';  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('info@spotlightpos.com', 'Oxinus');
            $mail->addAddress($to); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
