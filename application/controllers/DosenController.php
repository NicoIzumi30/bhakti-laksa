<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
/**
 *  @property User $User
 *  @property ProgramStudi $ProgramStudi
 *  @property MataKuliah $MataKuliah
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property  CI_Session $session
 */
class DosenController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }
    public function index()
    {
        $data['data'] = $this->User->getDosen();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/dosen/index', $data);
        $this->load->view('components/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|is_unique[users.nik]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/dosen/create');
            $this->load->view('components/footer');
        } else {
            $uuid = Uuid::uuid4()->toString();
            $newDate = DateTime::createFromFormat("Y-m-d", $this->input->post('birth_date'))->format("dmY");
            $data = [
                'id' => $uuid,
                'name' => htmlspecialchars($this->input->post('name')),
                'nik' => htmlspecialchars($this->input->post('nik')),
                'email' => htmlspecialchars($this->input->post('email')),
                'phone_number' => htmlspecialchars($this->input->post('phone_number')),
                'gender' => htmlspecialchars($this->input->post('gender')),
                'birth_date' => htmlspecialchars($this->input->post('birth_date')),
                'role' => 'dosen',
                'password' => password_hash($newDate, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->User->create($data);
        }


    }
    public function edit($id)
    {
        $user = $this->User->getById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|callback_check_unique_nik[' . $id . ']');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_unique_email[' . $id . ']');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $user;
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/dosen/edit', $data);
            $this->load->view('components/footer');
        } else {
            // Jika validasi berhasil, perbarui data
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'nik' => htmlspecialchars($this->input->post('nik')),
                'email' => htmlspecialchars($this->input->post('email')),
                'phone_number' => htmlspecialchars($this->input->post('phone_number')),
                'gender' => htmlspecialchars($this->input->post('gender')),
                'birth_date' => htmlspecialchars($this->input->post('birth_date')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->User->update($id, $data);
        }
    }
    public function destroy($id)
    {
        $this->User->delete($id);
    }
    public function check_unique_nik($nik, $id)
    {
        $user = $this->db->get_where('users', ['nik' => $nik, 'id !=' => $id])->row();
        if ($user) {
            $this->form_validation->set_message('check_unique_nik', 'The {field} field must be unique.');
            return FALSE;
        }
        return TRUE;
    }

    public function check_unique_email($email, $id)
    {
        $user = $this->db->get_where('users', ['email' => $email, 'id !=' => $id])->row();
        if ($user) {
            $this->form_validation->set_message('check_unique_email', 'The {field} field must be unique.');
            return FALSE;
        }
        return TRUE;
    }
}
