<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    private $table = 'users'; 

    public function countDosen(){
        return $this->db->where('role', 'dosen')->count_all_results($this->table);
    } 
    
}