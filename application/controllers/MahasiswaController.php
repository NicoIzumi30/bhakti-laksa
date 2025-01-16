<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mahasiswa/index');
        $this->load->view('components/footer');
    } 
    public function create(){
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mahasiswa/create');
        $this->load->view('components/footer');
    } 
    public function edit($id){
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mahasiswa/edit');
        $this->load->view('components/footer');
    }
}
