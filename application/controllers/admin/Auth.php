<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
    }

    public function index()
    {
        $this->load->view('admin/content/login');
    }

    public function process_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek = $this->m_login->get_admin($data)->num_rows();
        if ($cek > 0) {
            $data_session = array(
                'username' => $username,
                'status' => "is_login"
            );
            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('msg', "good Job, Login Successfuly!.");
            $this->session->set_flashdata('msg_class', 'alert-success');
            redirect(site_url('dashboard'));
        } else {
            $this->session->set_flashdata('msg', "Pastikan username dan password anda benar!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect(site_url('administrator/login'));
        }
    }

    public function logout()
    {
        $this->m_login->logout();
        $this->session->set_flashdata('msg', "Good Job, Logout successfuly!.");
        $this->session->set_flashdata('msg_class', 'alert-success');
        redirect(site_url('administrator/login'));
    }
}
