<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Model
{

    private $table = 'mahasiswa'; // Nama tabel di database

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    public function getAllNoInput($matkul_id)
    {
        $this->db->select('mahasiswa.*');
        $this->db->from('mahasiswa');
        $this->db->join('penilaian', 'mahasiswa.id = penilaian.mahasiswa_id AND penilaian.mata_kuliah_id = ' . $this->db->escape($matkul_id), 'left');
        $this->db->where('penilaian.id IS NULL');
        $query = $this->db->get();
        return $query->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }
    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
    public function count_all_inputed($matkul_id)
    {
        $this->db->where('mata_kuliah_id', $matkul_id);
        return $this->db->count_all_results('penilaian');
    }
    public function count_all_not_inputed($matkul_id)
    {
        $this->db->join('penilaian', 'mahasiswa.id = penilaian.mahasiswa_id AND penilaian.mata_kuliah_id = ' . $this->db->escape($matkul_id), 'left');
        $this->db->where('penilaian.id IS NULL');
        return $this->db->count_all_results($this->table);
    }
}