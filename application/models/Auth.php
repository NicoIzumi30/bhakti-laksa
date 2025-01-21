<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Model
{
    private $table = 'users'; // Nama tabel di database

    public function login($data){
        $email = $data['email'];
		$password = $data['password'];
		$user = $this->db->get_where($this->table, ['email' => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data_session = [
					'user_id' => $user['id'],
					'user_role' => $user['role']
				];
				$this->session->set_userdata($data_session);
				return redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Email atau Password Salah');
				return redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Email atau Password Salah');
			return redirect('login');
		}
    }
}