<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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

    public function pdf()
    {
         // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        $data = [
            'data' => $this->m_riwayat->index()
        ]; 

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('admin/content/laporan', $data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
    

    public function data_riwayat()
    {
        $data = [
            'data' => $this->m_riwayat->index()
        ]; // Ambil data dari model
        $this->load->view('admin/content/cetak_data_riwayat', $data);
    }
}
