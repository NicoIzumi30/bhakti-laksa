<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Model
{

    private $table = 'student_grades'; // Nama tabel di database
    private $table2 = 'lectures'; // Nama tabel di database
    private $table3 = 'student_courses'; // Nama tabel di database

    public function countMahasiswaHasGrade($id){
        $this->db->where('lecture_id', $id);
        $this->db->group_by('student_id');
        return $this->db->count_all_results($this->table);
    } 
    public function getStudentNotHasGrade($id) {
        $this->db->select('students.id as student_id, students.name, students.nim');
        $this->db->from('student_courses');
        $this->db->join('students', 'students.id = student_courses.student_id');
        $this->db->join('student_grades', 'student_grades.student_id = students.id AND student_grades.lecture_id = student_courses.lecture_id', 'left');
        $this->db->where('student_courses.lecture_id', $id); // Filter untuk mata kuliah tertentu
        $this->db->where('student_grades.id IS NULL');       // Filter mahasiswa yang belum dinilai pada mata kuliah ini
        return $this->db->get()->result();
    }
    
    
    public function create($data){
        $this->db->insert($this->table, $data);
        return true;
    } 

    public function getPresensiGrade($student_id, $lecture_id) {
        $this->db->select('grade');
        $this->db->from($this->table);
        $this->db->where('type', 'presensi');
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $query = $this->db->get();
        return $query->row()->grade; // Mengembalikan nilai presensi grade
    }
    public function getUtsGrade($student_id, $lecture_id) {
        $this->db->select('grade');
        $this->db->from($this->table);
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->where('type', 'uts');
        return $this->db->get()->row()->grade;
    } 

    public function getUasGrade($student_id, $lecture_id) {
        $this->db->select('grade');
        $this->db->from($this->table);
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->where('type', 'uas');
        return $this->db->get()->row()->grade;
    }
    public function getResponsiGrade($student_id, $lecture_id) {
        $this->db->select_sum('grade'); // Menggunakan select_sum untuk menghitung total
        $this->db->from($this->table);
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->where('type', 'responsi');
        $query = $this->db->get();
        return $query->row()->grade; // Mengembalikan nilai total grade
    }
    public function getMateriGrade($student_id, $lecture_id) {
        $this->db->select_sum('grade'); // Menggunakan select_sum untuk menghitung total
        $this->db->from($this->table);
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->where('type', 'diskusi');
        $query = $this->db->get();
        return $query->row()->grade; // Mengembalikan nilai total grade
    }
    public function getPraktikumGrade($student_id, $lecture_id) {
        $this->db->select_sum('grade'); // Menggunakan select_sum untuk menghitung total
        $this->db->from($this->table);
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->where('type', 'praktikum');
        $query = $this->db->get();
        return $query->row()->grade; // Mengembalikan nilai total grade
    }
    public function checkHasGrade($student_id, $lecture_id) {
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }
    public function getEditData($student_id, $lecture_id) {
        $base_conditions = ['student_id' => $student_id, 'lecture_id' => $lecture_id];
        $presensi = $this->db->get_where($this->table, array_merge($base_conditions, ['type' => 'presensi']))->row();
        $uts = $this->db->get_where($this->table, array_merge($base_conditions, ['type' => 'uts']))->row();
        $uas = $this->db->get_where($this->table, array_merge($base_conditions, ['type' => 'uas']))->row();
        $responsi = $this->db->order_by('position', 'asc')
                             ->get_where($this->table, array_merge($base_conditions, ['type' => 'responsi']))
                             ->result();
    
        $materi = $this->db->order_by('position', 'asc')
                            ->get_where($this->table, array_merge($base_conditions, ['type' => 'diskusi']))
                            ->result();
    
        $praktikum = $this->db->order_by('position', 'asc')
                              ->get_where($this->table, array_merge($base_conditions, ['type' => 'praktikum']))
                              ->result();
    
        $data = [
            'presensi' => $presensi,
            'uts' => $uts,
            'uas' => $uas,
            'responsi' => $responsi,
            'materi' => $materi,
            'praktikum' => $praktikum,
            'student_id' => $student_id,
            'lecture_id' => $lecture_id,
        ];
    
        return $data;
    }
    public function deleteGrade($student_id, $lecture_id){
        $this->db->where('student_id', $student_id);
        $this->db->where('lecture_id', $lecture_id);
        $this->db->delete($this->table);
        return true;
    } 
}
