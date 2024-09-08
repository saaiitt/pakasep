<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kerusakan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Kerusakan_model', 'm_kerusakan');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_kerusakan->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_kerusakan', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function insert()
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_kerusakan->rules());
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/partials/head');
                $this->load->view('admin/content/data_kerusakan_add');
                $this->load->view('admin/partials/footer');
            } else {
                $data = [
                    'kode_kerusakan' => $this->input->post('kode_kerusakan'),
                    'nama_kerusakan' => $this->input->post('nama_kerusakan'),
                    'penjelasan' => $this->input->post('penjelasan'),
                    'gejala' => $this->input->post('gejala'),
                    'penanganan' => $this->input->post('penanganan')
                ];
                $this->m_kerusakan->insert($data);
                $this->session->set_flashdata('msg', "Insert data kerusakan Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-kerusakan');
            }
        } else {
            $this->load->view('admin/partials/head');
            $this->load->view('admin/content/data_kerusakan_add');
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_kerusakan->rules());
            if ($this->form_validation->run() == FALSE) {
                $data1 = [
                    'data' => $this->m_kerusakan->get_data($id)
                ];
                $this->load->view('admin/partials/head', $data1);
                $this->load->view('admin/content/data_kerusakan_edit', $data1);
                $this->load->view('admin/partials/footer', $data1);
            } else {
                $data = [
                    'kode_kerusakan' => $this->input->post('kode_kerusakan'),
                    'nama_kerusakan' => $this->input->post('nama_kerusakan'),
                    'penjelasan' => $this->input->post('penjelasan'),
                    'gejala' => $this->input->post('gejala'),
                    'penanganan' => $this->input->post('penanganan')
                ];
                $this->m_kerusakan->update($data, $id);
                $this->session->set_flashdata('msg', "Update data kerusakan Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-kerusakan');
            }
        } else {
            $data1 = [
                'data' => $this->m_kerusakan->get_data($id)
            ];
            $this->load->view('admin/partials/head', $data1);
            $this->load->view('admin/content/data_kerusakan_edit', $data1);
            $this->load->view('admin/partials/footer', $data1);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data kerusakan Success!.");
        $this->session->set_flashdata('msg_class', 'alert-danger');
        $this->m_kerusakan->delete($id);
        redirect('data-kerusakan');
    }
}
