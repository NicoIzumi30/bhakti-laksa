<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProgramStudi extends CI_Model
{
    private $table = 'study_programs'; 

    public function count(){
        return $this->db->count_all_results($this->table);
    } 
    public function getAll(){
        return $this->db->get($this->table)->result();
    } 
    public function getFaculties(){
        return [
        0 => ['value' => 'Fakultas Ilmu Komputer', 'name' => 'Fakultas Ilmu Komputer'],
        1 => ['value' => 'Fakultas Ekonomi & Sosial', 'name' => 'Fakultas Ekonomi & Sosial'],
        2 => ['value' => 'Fakultas Sains & Teknologi', 'name' => 'Fakultas Sains & Teknologi'],
        4 => ['value' => 'Pasca Sarjana', 'name' => 'Pasca Sarjana'],];
    } 
    public function create($data){
        $query =  $this->db->insert($this->table, $data);
        if($query){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
        return redirect('/program-studi');
    }
    public function update($id,$data){
        $this->db->where('id', $id);
        $query =  $this->db->update($this->table, $data);
        if($query){
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else{
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }
        return redirect('/program-studi');
    } 
    public function delete($id){
        $this->db->where('id', $id);
        $query =  $this->db->delete($this->table);
        if($query){
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else{
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        return redirect('/program-studi');
    } 
}