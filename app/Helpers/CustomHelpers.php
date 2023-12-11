<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (!function_exists('getCountryName')) {
    function getCountryName($key) {
        $arr = [
           1 => 'Arabic',
           2 => 'English',
           3 => 'Russian',
           4 => 'German',
           5 => 'German',
           6 => 'Chinese',
           7 => 'Spanish',
           8 => 'Italy',
           9 => 'Farsi',
           10 => 'Turkish'
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

if (!function_exists('getCountries')) {
    function getCountries() {
        return [
                  1 => 'Arabic',
                  2 => 'English',
                  3 => 'Russian',
                  4 => 'German',
                  5 => 'German',
                  6 => 'Chinese',
                  7 => 'Spanish',
                  8 => 'Italy',
                  9 => 'Farsi',
                  10 => 'Turkish'
              ];
    }
}

if (!function_exists('identifyAndFormat')) {
    function identifyAndFormat($input) {
        // Check if the input is a valid email
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return ["type" => "email", "input" => $input];
        } else {
            // Define default country code
            $defaultCountryCode = '971';

            // Remove non-numeric characters (like dashes, spaces, etc.)
            $number = preg_replace('/\D/', '', $input);

            // Check for leading country code (00 or +)
            if (substr($number, 0, 2) === '00') {
                $number = substr($number, 2); // Remove leading zeroes
            } elseif (substr($number, 0, 1) === '0') {
                $number = $defaultCountryCode . substr($number, 1); // Replace leading zero with default country code
            } elseif (substr($number, 0, strlen($defaultCountryCode)) !== $defaultCountryCode) {
                $number = $defaultCountryCode . $number; // Prepend default country code if not present
            }

            return ["type" => "mobile", "input" => $input];
        }
    }
}
