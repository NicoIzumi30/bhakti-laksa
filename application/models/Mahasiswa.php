<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Model
{

    private $table = 'students';

    public function create($data)
    {
        $query = $this->db->insert($this->table, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
        return redirect('mahasiswa');
    }
    public function getAll()
    {
        $this->db->select('students.*, study_programs.name as study_program_name');
        $this->db->from($this->table);
        $this->db->join('study_programs', 'study_programs.id = students.study_program_id');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('students.*, study_programs.name as study_program_name');
        $this->db->from($this->table);
        $this->db->join('study_programs', 'study_programs.id = students.study_program_id');
        $this->db->where('students.id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update($this->table, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        return redirect('mahasiswa');
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
        return redirect('dosen');
    }
    public function count()
    {
        return $this->db->count_all($this->table);
    }

}