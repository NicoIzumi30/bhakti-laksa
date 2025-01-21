<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('success_notification')) {
    function success_notification($message)
    {
            return "<script>notify('success','{$message}');</script>";
    }
}
if (!function_exists('error_notification')) {
    function error_notification($message)
    {
        return "<script>notify('error','{$message}');</script>";
    }
}
if (!function_exists('validation_errors_notification')) {
    function validation_errors_notification()
    {
        // Dapatkan instance CodeIgniter
        $CI = &get_instance();
        // Ambil semua error form validation
        $errors = validation_errors();

        // Jika ada error, return dalam format JavaScript alert
        if ($errors) {
            $escaped_errors = htmlspecialchars(strip_tags($errors), ENT_QUOTES, 'UTF-8');
            return "<script>notify('error','{$escaped_errors}');</script>";
        }

        return '';
    }

}

if (!function_exists('dd')) {
    function dd($data, $exit = true)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if ($exit) {
            exit;
        }
    }
}