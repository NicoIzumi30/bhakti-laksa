<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Model
{

    private $table = 'penilaian'; // Nama tabel di database

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    public function getAllByMatkul($mata_kuliah_id)
    {
        $this->db->select('*');
        $this->db->join('mata_kuliah', 'mata_kuliah.id = penilaian.mata_kuliah_id');
        $this->db->join('mahasiswa', 'mahasiswa.id = penilaian.mahasiswa_id');
        $this->db->where('mata_kuliah_id', $mata_kuliah_id);
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
    public function getById($id){
        return $this->db->get_where($this->table, ['id' => $id])->row();
    } 
    public function simpan_penilaian($mahasiswa_id, $mata_kuliah_id, $diskusi, $praktikum, $responsi, $uts, $uas)
{
    $data = array(
        'mahasiswa_id' => $mahasiswa_id,
        'mata_kuliah_id' => $mata_kuliah_id,
        'diskusi' => $diskusi,
        'praktikum' => $praktikum,
        'responsi' => $responsi,
        'uts' => $uts,
        'uas' => $uas
    );
    return $this->db->insert('penilaian', $data);
}

public function update_penilaian($id, $mahasiswa_id, $mata_kuliah_id, $diskusi, $praktikum, $responsi, $uts, $uas)
{
    $data = array(
        'mahasiswa_id' => $mahasiswa_id,
        'mata_kuliah_id' => $mata_kuliah_id,
        'diskusi' => $diskusi,
        'praktikum' => $praktikum,
        'responsi' => $responsi,
        'uts' => $uts,
        'uas' => $uas
    );
    $this->db->where('id', $id);
    return $this->db->update('penilaian', $data);
}

}
