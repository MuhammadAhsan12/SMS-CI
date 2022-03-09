<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_Model', 'user');
        $this->load->model('Student_Model', 'student');
        $this->load->model('Teacher_Model', 'teacher');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('usertype') == 1) {
                $data['student']=$this->student->select_student();
                $data['teacher']=$this->teacher->select_teacher();

                $this->load->view('admin/dashboard',$data);
            } else {
                // $staff=$this->session->userdata('userid');
                // $data['leave']=$this->Leave_model->select_leave_byStaffID($staff);
                // $this->load->view('staff/header');
                // $this->load->view('staff/dashboard',$data);
                // $this->load->view('staff/footer');
            }
        }
    }

    public function login_page()
    {
        $this->load->view('admin/inc/header');
        $this->load->view('admin/inc/datatable');
        $this->load->view('login');
    }

    public function error_page()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/error_page');
        $this->load->view('admin/footer');
    }

    function login()
    {
        $this->form_validation->set_rules('txtusername', 'Txtusername', 'required');
        $this->form_validation->set_rules('txtpassword', 'Txtpassword', 'required');
        if ($this->form_validation->run() == true) {
            $un = $this->input->post('txtusername');
            $pw = $this->input->post('txtpassword');
            $check_login = $this->user->logindata($un, $pw);
            if ($check_login <> '') {
                if ($check_login[0]['status'] == 1) {
                    if ($check_login[0]['usertype'] == 1) {
                        $data = array(
                            'logged_in'  =>  TRUE,
                            'username' => $check_login[0]['username'],
                            'usertype' => $check_login[0]['usertype'],
                            'userid' => $check_login[0]['id']
                        );
                        $this->session->set_userdata($data);
                        echo json_encode(array("status" => TRUE));
                    } elseif ($check_login[0]['usertype'] == 2) {
                        $data = array(
                            'logged_in'  =>  TRUE,
                            'username' => $check_login[0]['username'],
                            'usertype' => $check_login[0]['usertype'],
                            'userid' => $check_login[0]['id']
                        );
                        $this->session->set_userdata($data);
                        echo json_encode(array("status" => TRUE));
                    } else {
                        $this->session->set_flashdata('login_error', 'Sorry, you cant login right now.', 300);
                    }
                } else {
                    $this->session->set_flashdata('login_error', 'Sorry, your account is blocked.', 300);
                }
            } else {
                $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
            }
        } else {
            $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login');
    }
}
