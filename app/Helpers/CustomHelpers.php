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

if (!function_exists('getDraftCategories')) {
    function getDraftCategories() {
        return array(
           1 => "Side Agreements",
           2 => "Loan Agreements",
           3 => "Mercy Letters",
           4 => "Public Prosecution Apps",
           5 => "Police Reports",
           6 => "Traffic Fines Oppositions",
           7 => "NOC Letters",
           8 => "Miscellaneous Letters",
           9 => "Power of Attorney",
           10 => "Memorandum of Association",
           11 => "Amendment to MOA",
           12 => "Board Resolutions",
           13 => "Wills",
           14 => "Legal Notices",
           15 => "Affidavits",
           16 => "Share Pledge Agreements",
           17 => "Approval of Signature",
           18 => "Assignments"
        );
    }
}


if (!function_exists('getNotaryCategories')) {
    function getNotaryCategories() {
        return array(
           19 => "Power of Attorney",
           20 => "Memorandum of Association",
           21 => "Amendment to MOA",
           22 => "Board Resolutions",
           23 => "Wills",
           24 => "Legal Notices",
           25 => "Affidavits",
           26 => "Share Pledge Agreements",
           27 => "Approval of Signature",
           28 => "Assignments"
        );
    }
}
