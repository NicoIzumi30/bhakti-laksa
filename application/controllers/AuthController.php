<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  @property User $User
 *  @property Auth $Auth
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property  CI_Session $session
 */

class AuthController extends CI_Controller {
    public function __construct() { 
        parent::__construct();
        $this->load->model('Auth');
    }
    public function index(){
        if($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/auth/index');
		} else {
			$data = [
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			];
			$this->Auth->login($data);
		}
    } 
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_role');
        $this->session->set_flashdata('success', 'You have been logged out');
        redirect('login');
    }
    
}