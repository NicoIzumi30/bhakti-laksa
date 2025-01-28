<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Ramsey\Uuid\Uuid;

/**
 *  @property User $User
 * @property MataKuliah $MataKuliah
 * @property Mahasiswa $Mahasiswa
 * @property Penilaian $Penilaian
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property  CI_Session $session
 */
class PenilaianController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa');
        $this->load->model('MataKuliah');
        $this->load->model('Penilaian');
    }
    public function index()
    {
        $data['data'] = $this->MataKuliah->getMataKuliahByDosen();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/penilaian/index', $data);
        $this->load->view('components/footer');
    }
    public function create($id)
    {
        $this->form_validation->set_rules('student_id', 'Student', 'required');
        $this->form_validation->set_rules('presensi', 'Presensi', 'required');
        $this->form_validation->set_rules('uts', 'UTS', 'required');
        $this->form_validation->set_rules('uas', 'UAS', 'required');
        $this->form_validation->set_rules('responsi[]', 'Responsi', 'required');
    
        if ($this->form_validation->run() == false) {
            $data = [
                'matakuliah' => $this->MataKuliah->getById($id),
                'students' => $this->Penilaian->getStudentNotHasGrade($id),
                'presentase' => $this->MataKuliah->getPresentase($id)
            ];
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/penilaian/create', $data);
            $this->load->view('components/footer');
            return;
        }
    
        $student_id = $this->input->post('student_id');
    
        // Function to save grades
        $saveGrades = function ($grades, $type, $id, $student_id) {
            foreach ($grades as $key => $value) {
                $this->Penilaian->create([
                    'id' => Uuid::uuid4(),
                    'student_id' => $student_id,
                    'lecture_id' => $id,
                    'grade' => $value,
                    'type' => $type,
                    'position' => $key + 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        };
    
        // Save responsi grades
        $saveGrades($this->input->post('responsi'), 'responsi', $id, $student_id);
    
        // Save optional grades
        foreach (['materi' => 'diskusi', 'praktikum' => 'praktikum'] as $key => $type) {
            if ($this->input->post($key) !== null) {
                $saveGrades($this->input->post($key), $type, $id, $student_id);
            }
        }
    
        // Save fixed grades (presensi, uts, uas)
        foreach (['presensi', 'uts', 'uas'] as $type) {
            $this->Penilaian->create([
                'id' => Uuid::uuid4(),
                'student_id' => $student_id,
                'lecture_id' => $id,
                'grade' => $this->input->post($type),
                'type' => $type,
                'position' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('penilaian/detail/' . $id);
    }
    
    public function edit($student_id, $lecture_id)
    {
        $this->form_validation->set_rules('presensi', 'Presensi', 'required');
        $this->form_validation->set_rules('uts', 'UTS', 'required');
        $this->form_validation->set_rules('uas', 'UAS', 'required');
        $this->form_validation->set_rules('responsi[]', 'Responsi', 'required');
    
        if ($this->form_validation->run() == false) {
            $data = $this->Penilaian->getEditData($student_id, $lecture_id);
            $data['matakuliah'] = $this->MataKuliah->getById($lecture_id);
            $data['student'] = $this->Mahasiswa->getById($student_id);
            $data['presentase'] = $this->MataKuliah->getPresentase($lecture_id);
            $this->load->view('components/header');
            $this->load->view('components/sidebar');
            $this->load->view('components/navbar');
            $this->load->view('pages/penilaian/edit', $data);
            $this->load->view('components/footer');
        }else{
            $this->Penilaian->deleteGrade($student_id,$lecture_id);
            $saveGrades = function ($grades, $type, $lecture_id, $student_id) {
                foreach ($grades as $key => $value) {
                    $this->Penilaian->create([
                        'id' => Uuid::uuid4(),
                        'student_id' => $student_id,
                        'lecture_id' => $lecture_id,
                        'grade' => $value,
                        'type' => $type,
                        'position' => $key + 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            };
        
            $saveGrades($this->input->post('responsi'), 'responsi', $lecture_id, $student_id);
        
            // Save optional grades
            foreach (['materi' => 'diskusi', 'praktikum' => 'praktikum'] as $key => $type) {
                if ($this->input->post($key) !== null) {
                    $saveGrades($this->input->post($key), $type, $lecture_id, $student_id);
                }
            }
        
            // Save fixed grades (presensi, uts, uas)
            foreach (['presensi', 'uts', 'uas'] as $type) {
                $this->Penilaian->create([
                    'id' => Uuid::uuid4(),
                    'student_id' => $student_id,
                    'lecture_id' => $lecture_id,
                    'grade' => $this->input->post($type),
                    'type' => $type,
                    'position' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        
            $this->session->set_flashdata('success', 'Data berhasil di update');
            redirect('penilaian/detail/' . $lecture_id);
        }

    }
    public function detail($id)
    {
        $data['countMahasiswa'] = $this->Mahasiswa->countMahasiswaByMataKuliah($id);
        $data['countMahasiswaHasGrade'] = $this->Penilaian->countMahasiswaHasGrade($id);
        $data['matakuliah'] = $this->MataKuliah->getById($id);
        $data['students'] = $this->MataKuliah->getStudentCourse($id);
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('pages/penilaian/detail', $data);
        $this->load->view('components/footer');
    }
}
