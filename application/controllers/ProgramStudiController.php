<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
class ProgramStudiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProgramStudi');
    }
    public function index()
    {
        $data['data'] = $this->ProgramStudi->getAll();
        $data['faculties'] = $this->ProgramStudi->getFaculties();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/programStudi/index', $data);
        $this->load->view('components/footer');
    }
    
    public function store()
    {
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            redirect('/program-studi');
        } else {
            $uuid = Uuid::uuid4()->toString();
            $data = [
                'id' => $uuid,
                'faculty' => htmlspecialchars($this->input->post('fakultas')),
                'name' => htmlspecialchars($this->input->post('prodi')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->ProgramStudi->create($data);
        }

    }
    public function update($id)
    {
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data gagal diubah');
            redirect('/program-studi');
        } else {
            $data = [
                'faculty' => htmlspecialchars($this->input->post('fakultas')),
                'name' => htmlspecialchars($this->input->post('prodi')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->ProgramStudi->update($id, $data);
        }

    }
    public function destroy($id)
    {
        $this->ProgramStudi->delete($id);
    }
}
