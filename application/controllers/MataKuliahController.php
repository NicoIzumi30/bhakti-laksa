<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;
/**
 *  @property MataKuliah $MataKuliah
 *  @property ProgramStudi $ProgramStudi
 *  @property User $User
 * @property Mahasiswa $Mahasiswa
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 */
class MataKuliahController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataKuliah');
        $this->load->model('Mahasiswa');
        $this->load->model('ProgramStudi');
        $this->load->model('User');
        middleware_admin();
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
        $this->form_validation->set_rules('responsi', 'responsi', 'required');
        $this->form_validation->set_rules('uts', 'uts', 'required');
        $this->form_validation->set_rules('uas', 'uas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['study_programs'] = $this->ProgramStudi->getList();
            $data['dosen'] = $this->User->listDosen();
            $data['mata_kuliah'] = $this->MataKuliah->getById($id);
            $data['presentase'] = $this->MataKuliah->getPresentase($id);
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
            $dataPresentase = [
                'attendance' => htmlspecialchars($this->input->post('presensi')),
                'task' => htmlspecialchars($this->input->post('tugas')),
                'discussion' => htmlspecialchars($this->input->post('diskusi')),
                'responsi' => htmlspecialchars($this->input->post('responsi')),
                'uts' => htmlspecialchars($this->input->post('uts')),
                'uas' => htmlspecialchars($this->input->post('uas')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->MataKuliah->update($id, $data,$dataPresentase);
        }
    }
    public function destroy($id){
        $this->MataKuliah->delete($id);
    } 
    public function studentCourse($id){
        $data['mata_kuliah'] = $this->MataKuliah->getById($id);
        $data['studentCourses'] = $this->MataKuliah->getStudentCourse($id);
        $data['students'] = $this->MataKuliah->getStudentNotHasCourse($id);
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/mataKuliah/detail',$data);
        $this->load->view('components/footer');
    } 
    public function studentCourseCreate($lecture_id){
        $id = Uuid::uuid4();
        $data = [
            'id' => $id,
            'lecture_id' => $lecture_id,
           'student_id' => $this->input->post('student'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')  // update this to current date and time when record is updated.
        ];
        $this->MataKuliah->addStudentCourse($data);
        redirect('mata-kuliah/student-course/'.$lecture_id);
    } 
    public function studentCourseDestroy($id, $student_id){
        $this->MataKuliah->deleteStudentCourse($student_id);
        redirect('mata-kuliah/student-course/'.$id);
    }
}
