<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  @property User $User
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Upload $upload
 * @property  CI_Session $session
 */
class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('upload');
        $this->load->model('User');

    }
    public function index()
    {
        $id = $this->session->userdata('user_id');
        $data['user'] = $this->User->getById($id);
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/profile/index', $data);
        $this->load->view('components/footer');
    }
    public function update()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data gagal diubah');
            redirect('/profile');
        } else {
            $id = $this->session->userdata('user_id');
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'email' => htmlspecialchars($this->input->post('email')),
                'phone_number' => htmlspecialchars($this->input->post('phone_number')),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if (!empty($_FILES['image']['name'])) {
                $upload_result = upload_file('image', './uploads/profile/');
                if (!$upload_result['status']) {
                    $this->session->set_flashdata('error', $upload_result['error']);
                    redirect('/profile');
                }

                // Hapus file lama jika ada
                $old_image = $this->User->get_user_image($id);
                if ($old_image && file_exists(FCPATH . $old_image)) {
                    unlink(FCPATH . $old_image);
                }

                $data['path'] = '/uploads/profile/' . $upload_result['data']['file_name'];
            }
            $this->User->update_profile($data);
        }
    }
    public function change_password()
    {
        // Validasi input
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_check_current_password');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|matches[confirm_password]|callback_check_new_password');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $error = strip_tags(explode("\n", trim($error))[0]);
            $this->session->set_flashdata('error', $error);
            redirect('/profile');
        } else {
            $data = [
                'password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->User->update_profile($data);
            redirect('/profile');
        }
    }

    public function check_current_password($current_password)
    {
        $id = $this->session->userdata('user_id');
        $user = $this->User->getById($id);

        if (!password_verify($current_password, $user->password)) {
            $this->form_validation->set_message('check_current_password', 'Password saat ini salah.');
            return false;
        }
        return true;
    }

    public function check_new_password($new_password)
    {
        $id = $this->session->userdata('user_id');
        $user = $this->User->getById($id);

        if (password_verify($new_password, $user->password)) {
            $this->form_validation->set_message('check_new_password', 'Password baru tidak boleh sama dengan password lama.');
            return false;
        }
        return true;
    }
}
