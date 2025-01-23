<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
/**
 *  @property MataKuliah $MataKuliah
 *  @property ProgramStudi $ProgramStudi
 *  @property User $User
 * @property CI_Form_validation $form_validation
 */
class MataKuliahController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataKuliah');
        $this->load->model('ProgramStudi');
        $this->load->model('User');
    }
    public function index()
    {
        $data['data'] = $this->MataKuliah->getAll();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mataKuliah/index', $data);
        $this->load->view('components/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');
        $this->form_validation->set_rules('dosen_id', 'Dosen', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['study_programs'] = $this->ProgramStudi->getList();
            $data['dosen'] = $this->User->listDosen();
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/mataKuliah/create', $data);
            $this->load->view('components/footer');
        } else {
            $uuid = Uuid::uuid4();
            $data = [
                'id' => $uuid,
                'name' => htmlspecialchars($this->input->post('name')),
                'study_program_id' => htmlspecialchars($this->input->post('prodi_id')),
                'user_id' => htmlspecialchars($this->input->post('dosen_id')),
                'learning_type' => htmlspecialchars($this->input->post('type')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->MataKuliah->create($data);
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');
        $this->form_validation->set_rules('dosen_id', 'Dosen', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('presensi', 'Presensi', 'required');
        $this->form_validation->set_rules('tugas', 'Tugas', 'required');
        $this->form_validation->set_rules('diskusi', 'diskusi', 'required');
        $this->form_validation->set_rules('responsi', 'responsi', 'required');
        $this->form_validation->set_rules('uts', 'uts', 'required');
        $this->form_validation->set_rules('uas', 'uas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['study_programs'] = $this->ProgramStudi->getList();
            $data['dosen'] = $this->User->listDosen();
            $data['mata_kuliah'] = $this->MataKuliah->getById($id);
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/mataKuliah/edit', $data);
            $this->load->view('components/footer');
        }else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'study_program_id' => htmlspecialchars($this->input->post('prodi_id')),
                'user_id' => htmlspecialchars($this->input->post('dosen_id')),
                'learning_type' => htmlspecialchars($this->input->post('type')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->MataKuliah->update($id, $data);
        }
    }
    public function detail($id)
    {
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mataKuliah/detail');
        $this->load->view('components/footer');
    }
}
