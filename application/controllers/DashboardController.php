<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  @property User $User
 *  @property Mahasiswa $Mahasiswa
 *  @property ProgramStudi $ProgramStudi
 *  @property MataKuliah $MataKuliah
 */
class DashboardController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ProgramStudi');
        $this->load->model('User');
        $this->load->model('Mahasiswa');
        $this->load->model('MataKuliah');
    }
    public function index(){
        $data['totalProgramStudi'] = $this->ProgramStudi->count();
        $data['totalDosen'] = $this->User->countDosen();
        $data['totalMahasiswa'] = $this->Mahasiswa->count();
        $data['totalMataKuliah'] = $this->MataKuliah->count();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/dashboard/index',$data);
        $this->load->view('components/footer');
    } 
}
