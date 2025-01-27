<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    private $table = 'users';

    public function countDosen()
    {
        return $this->db->where('role', 'dosen')->count_all_results($this->table);
    }
    public function getDosen()
    {
        return $this->db->where('role', 'dosen')->get($this->table)->result();
    }
    public function listDosen()
    {
        $this->db->select('id, name');
        return $this->db->where('role', 'dosen')->get($this->table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }
    public function create($data)
    {
        $query = $this->db->insert($this->table, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
        return redirect('dosen');
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
        return redirect('dosen');
    }
    public function update_profile($data)
    {
        $id = $this->session->userdata('user_id');
        $this->db->where('id', $id);
        $query = $this->db->update($this->table, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        return redirect('profile');
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
    public function get_user_image($id)
    {
        return $this->db->select('path')->where('id', $id)->get($this->table)->row()->path;
    }
}