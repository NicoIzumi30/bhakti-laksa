<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;

class MahasiswaController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa');
        $this->load->model('ProgramStudi');
    }
    public function index(){
        $data['data'] = $this->Mahasiswa->getAll();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mahasiswa/index',$data);
        $this->load->view('components/footer');
    } 
    public function create(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nim', 'nim', 'required|is_unique[students.nim]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[students.email]');
        $this->form_validation->set_rules('prodi_id', 'Program Studi', 'required');
        $this->form_validation->set_rules('class_of', 'Class Of', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'required');

        if ($this->form_validation->run() == FALSE) {
        $data['study_programs'] = $this->ProgramStudi->getList();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mahasiswa/create',$data);
        $this->load->view('components/footer');
        }else{
            $uuid = Uuid::uuid4()->toString();
            $data = [
                'id' => $uuid,
                'study_program_id' => htmlspecialchars($this->input->post('prodi_id')),
                'name' => htmlspecialchars($this->input->post('name')),
                'nim' => htmlspecialchars($this->input->post('nim')),
                'email' => htmlspecialchars($this->input->post('email')),
                'class_of' => htmlspecialchars($this->input->post('class_of')),
                'birth_date' => htmlspecialchars($this->input->post('birth_date')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->Mahasiswa->create($data);
        }
    } 
    public function edit($id){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|callback_check_unique_nim[' . $id . ']');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_unique_email[' . $id . ']');
        $this->form_validation->set_rules('prodi_id', 'Program Studi', 'required');
        $this->form_validation->set_rules('class_of', 'Class Of', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['study_programs'] = $this->ProgramStudi->getList();
            $data['student'] = $this->Mahasiswa->getById($id);
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/mahasiswa/edit',$data);
            $this->load->view('components/footer'); 
        }else{
            $data = [
                'study_program_id' => htmlspecialchars($this->input->post('prodi_id')),
                'name' => htmlspecialchars($this->input->post('name')),
                'nim' => htmlspecialchars($this->input->post('nim')),
                'email' => htmlspecialchars($this->input->post('email')),
                'class_of' => htmlspecialchars($this->input->post('class_of')),
                'birth_date' => htmlspecialchars($this->input->post('birth_date')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->Mahasiswa->update($id, $data);
        }
        
    }
    public function destroy($id){
        $this->Mahasiswa->delete($id);
    }
    public function check_unique_nim($nim, $id)
    {
        $user = $this->db->get_where('students', ['nim' => $nim, 'id !=' => $id])->row();
        if ($user) {
            $this->form_validation->set_message('check_unique_nim', 'The {field} field must be unique.');
            return FALSE;
        }
        return TRUE;
    }

    public function check_unique_email($email, $id)
    {
        $user = $this->db->get_where('students', ['email' => $email, 'id !=' => $id])->row();
        if ($user) {
            $this->form_validation->set_message('check_unique_email', 'The {field} field must be unique.');
            return FALSE;
        }
        return TRUE;
    }
}
