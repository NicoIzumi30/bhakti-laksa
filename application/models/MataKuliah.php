<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;

class MataKuliah extends CI_Model
{

    private $table = 'lectures';
    private $table2 = 'lecture_details'; 
    private $table3 = 'student_courses'; 

    public function count()
    {
        return $this->db->count_all($this->table);
    }
    public function create($data)
    {
        $query = $this->db->insert($this->table, $data);
        if ($query) {
            $id = Uuid::uuid4();
            $matakuliahId = get_last_id($this->table);
            $data = [
                'id' => $id,
                'lecture_id' => $matakuliahId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            if($this->db->insert($this->table2, $data)){
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            }else{
                $this->db->delete($this->table, ['id'=>$matakuliahId]);
                $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            }
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
        return redirect('mata-kuliah');
    }
    public function getAll()
    {
        $this->db->select('lectures.*, study_programs.name as study_program_name, users.name as dosen_name');
        $this->db->from($this->table);
        $this->db->join('study_programs', 'study_programs.id = lectures.study_program_id');
        $this->db->join('users', 'users.id = lectures.user_id');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('lectures.*, study_programs.name as study_program_name, users.name as dosen_name');
        $this->db->from($this->table);
        $this->db->join('study_programs', 'study_programs.id = lectures.study_program_id');
        $this->db->join('users', 'users.id = lectures.user_id');
        $this->db->where('lectures.id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data,$dataPresentase)
    {
        $this->db->where('id', $id);
        $query = $this->db->update($this->table, $data);
        if ($query) {
            $this->db->where('lecture_id', $id);
            $this->db->update($this->table2, $dataPresentase);
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        return redirect('mata-kuliah');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        return redirect('mata-kuliah');
    }
    public function getPresentase($id){
        $this->db->select('*');
        $this->db->where('lecture_id', $id);
        return $this->db->get($this->table2)->row();
    } 
    
    public function getStudentCourse($id){
        $this->db->select('student_courses.*,students.name,students.nim,students.class_of,students.study_program_id,study_programs.name as study_program_name');
        $this->db->from($this->table3);
        $this->db->join('students', 'students.id = student_courses.student_id');
        $this->db->join('study_programs', 'study_programs.id = students.study_program_id');
        $this->db->where('student_courses.lecture_id', $id);
        return $this->db->get()->result();
    } 
    public function getStudentNotHasCourse($id) {
        $this->db->select('students.id, students.name, students.nim');
        $this->db->from('students');
        $this->db->join($this->table3, 'students.id = student_courses.student_id', 'left');
        $this->db->where('student_courses.lecture_id !=', $id);
        $this->db->or_where('student_courses.lecture_id IS NULL');
        return $this->db->get()->result();
    }
    public function addStudentCourse($data){
        $query = $this->db->insert($this->table3, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
    }      
    public function deleteStudentCourse($id){
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table3);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
    } 
    public function getMataKuliahByDosen(){
        $id = $this->session->userdata('user_id');
        $this->db->select('id,user_id,name,learning_type');
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->result();
    } 
}