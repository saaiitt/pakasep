<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_riwayat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Riwayat_model', 'm_riwayat');
        $this->load->model('Pasien_model', 'm_pasien');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_riwayat->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_riwayat', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function data_riwayat()
    {
        $data = [
            'data' => $this->m_riwayat->index()
        ]; // Ambil data dari model
        $this->load->view('admin/content/cetak_data_riwayat', $data);
    }

    public function print()
    {
        $data = [
            'data' => $this->m_riwayat->index()
        ];
        $this->load->view('admin/content/print_riwayat', $data);
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data pasien dan riwayat periksa Success!.");
        $this->session->set_flashdata('msg_class', 'alert-success');
        $cek = $this->m_pasien->get_data($id);
        $this->m_riwayat->delete_by_uniq_id($id);
        $this->m_pasien->delete_riwayat($cek->uniq_id);
        redirect('data-riwayat');
    }
}
