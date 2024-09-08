<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_proses->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/proses_data', $data);
        $this->load->view('admin/partials/footer', $data);
        redirect('proses-data');
    }

    
}
