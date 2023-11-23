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
