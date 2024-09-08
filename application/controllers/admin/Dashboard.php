<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Dashboard_model', 'm_dashboard');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'kerusakan' => $this->m_dashboard->index(),
            'gejala' => $this->m_dashboard->Data_Gejala(),
            'riwayat' => $this->m_dashboard->Data_Riwayat(),
            'pasien' => $this->m_dashboard->Data_Pasien(),
        
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/dashboard', $data);
        $this->load->view('admin/partials/footer', $data);
    }
}
