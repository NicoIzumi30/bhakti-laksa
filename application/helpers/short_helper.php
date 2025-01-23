<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('success_notification')) {
    function success_notification($message)
    {
        return "<script>toast('success','{$message}');</script>";
    }
}
if (!function_exists('error_notification')) {
    function error_notification($message)
    {
        return "<script>toast('error','{$message}');</script>";
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

if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $ci =& get_instance();
        if (!$ci->session->userdata('user_id')) {
            redirect('login');
        }
    }
}
if (!function_exists('get_user')) {
    function get_user()
    {
        $ci =& get_instance();
        $user_id = $ci->session->userdata('user_id');
        $ci->db->where('id', $user_id);
        $result = $ci->db->get('users')->row();
        return $result;

    }
}
if (!function_exists('get_last_id')) {
    function get_last_id($table)
    {
        $ci =& get_instance();
        $last_id = $ci->db->select('id')->order_by('created_at', 'DESC')->limit(1)->get($table)->row();
        return $last_id->id;
    }
}
