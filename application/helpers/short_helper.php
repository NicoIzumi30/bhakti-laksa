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

if(!function_exists('get_image_profile')) {
    function get_image_profile()
    {
        $ci =& get_instance();
        $user_id = $ci->session->userdata('user_id');
        $ci->db->where('id', $user_id);
        $result = $ci->db->get('users')->row();
        if($result->path != null) {
            return base_url() . $result->path;
        }else{
            return base_url() . 'assets/images/user.jpg';
        }
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


if (!function_exists('total_nilai')) {
    function total_nilai($lecture_id, $student_id){
        $ci =& get_instance();
        $ci->load->model('MataKuliah');
        $ci->load->model('Penilaian');
        $checkGrade = $ci->Penilaian->checkHasGrade($student_id, $lecture_id);
        if($checkGrade == false){
            return ['total' => 'Belum Di Nilai','gradeCategory'=> '-'];
        }else{
            $presentaseNilai = $ci->MataKuliah->getPresentase($lecture_id);
            $presensi = round(($ci->Penilaian->getPresensiGrade($student_id, $lecture_id)/100)*$presentaseNilai->attendance, 2);
            $uts = round(($ci->Penilaian->getUtsGrade($student_id, $lecture_id)/100)*$presentaseNilai->uts, 2);
            $uas = round(($ci->Penilaian->getUasGrade($student_id, $lecture_id)/100)*$presentaseNilai->uas, 2);
            $responsi = round(($ci->Penilaian->getResponsiGrade($student_id, $lecture_id)/200)*$presentaseNilai->responsi, 2);
            $materi = round(($ci->Penilaian->getMateriGrade($student_id, $lecture_id)/1400)*$presentaseNilai->discussion, 2);
            $praktikum = round(($ci->Penilaian->getPraktikumGrade($student_id, $lecture_id)/1400)*$presentaseNilai->task, 2);
            $total = $presensi+$uts+$uas+$responsi+$materi+$praktikum;
            return [
                'total' => $total,
                'gradeCategory' => $total >= 80? 'A' : ($total >= 70? 'B' : ($total >= 60? 'C' : ($total >= 50? 'D' : 'E'))),
            ];
        }
    }
    if (!function_exists('middleware_admin')) {
        function middleware_admin()
        {
            $ci =& get_instance();
            $role = $ci->session->userdata('user_role');
            if($role == 'administrator') {
                return true;
            }else{
                redirect('/dashboard/');
            }
        }
    }
}

