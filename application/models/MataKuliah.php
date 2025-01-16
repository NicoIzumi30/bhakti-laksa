<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MataKuliah extends CI_Model
{

    private $table = 'mata_kuliah'; // Nama tabel di database

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function getById($id){
        return $this->db->get_where($this->table, ['id' => $id])->row();
    } 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}