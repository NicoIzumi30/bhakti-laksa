<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/profile/index');
        $this->load->view('components/footer');
    } 
}
