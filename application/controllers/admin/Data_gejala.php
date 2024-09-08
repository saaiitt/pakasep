<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_gejala extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Gejala_model', 'm_gejala');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_gejala->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_gejala', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function insert()
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_gejala->rules());
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/partials/head');
                $this->load->view('admin/content/data_gejala_add');
                $this->load->view('admin/partials/footer');
            } else {
                $data = [
                    'gejala' => $this->input->post('gejala'),
                    'kode_gejala' => $this->input->post('kode_gejala'),
                ];
                $this->m_gejala->insert($data);
                $this->session->set_flashdata('msg', "Insert data gejala Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-gejala');
            }
        } else {
            $this->load->view('admin/partials/head');
            $this->load->view('admin/content/data_gejala_add');
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_gejala->rules());
            if ($this->form_validation->run() == FALSE) {
                $data1 = [
                    'data' => $this->m_gejala->get_data($id)
                ];
                $this->load->view('admin/partials/head', $data1);
                $this->load->view('admin/content/data_gejala_edit', $data1);
                $this->load->view('admin/partials/footer', $data1);
            } else {
                $data = [
                    'gejala' => $this->input->post('gejala'),
                    'kode_gejala' => $this->input->post('kode_gejala'),
                ];
                $this->m_gejala->update($data, $id);
                $this->session->set_flashdata('msg', "Update data gejala Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-gejala');
            }
        } else {
            $data1 = [
                'data' => $this->m_gejala->get_data($id)
            ];
            $this->load->view('admin/partials/head', $data1);
            $this->load->view('admin/content/data_gejala_edit', $data1);
            $this->load->view('admin/partials/footer', $data1);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data gejala Success!.");
        $this->session->set_flashdata('msg_class', 'alert-danger');
        $this->m_gejala->delete($id);
        redirect('data-gejala');
    }
}
