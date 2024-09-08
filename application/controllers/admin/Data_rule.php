<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_rule extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Rule_model', 'm_rule');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_rule->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_rule', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function insert()
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_rule->rules());
            if ($this->form_validation->run() == FALSE) {
                $ck = [
                    'kerusakan' => $this->m_rule->get_data_kerusakan()
                ];
                $this->load->view('admin/partials/head', $ck);
                $this->load->view('admin/content/data_rule_add', $ck);
                $this->load->view('admin/partials/footer', $ck);
            } else {
                $data = [
                    'kode_rule' => $this->input->post('kode_rule'),
                    'kode_gejala' => $this->input->post('kode_gejala'),
                    'kode_kerusakan' => $this->input->post('kode_kerusakan'),
                ];
                $this->m_rule->insert($data);
                $this->session->set_flashdata('msg', "Insert data rule Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-rule');
            }
        } else {
            $ck = [
                'kerusakan' => $this->m_rule->get_data_kerusakan()
            ];
            $this->load->view('admin/partials/head', $ck);
            $this->load->view('admin/content/data_rule_add', $ck);
            $this->load->view('admin/partials/footer', $ck);
        }
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_rule->rules());
            if ($this->form_validation->run() == FALSE) {
                $data1 = [
                    'data' => $this->m_rule->get_data($id)
                ];
                $this->load->view('admin/partials/head', $data1);
                $this->load->view('admin/content/data_rule_edit', $data1);
                $this->load->view('admin/partials/footer', $data1);
            } else {
                $data = [
                    'kode_rule' => $this->input->post('kode_rule'),
                    'kode_gejala' => $this->input->post('kode_gejala'),
                    'kode_kerusakan' => $this->input->post('kode_kerusakan'),
                ];
                $this->m_rule->update($data, $id);
                $this->session->set_flashdata('msg', "Update data rule Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-rule');
            }
        } else {
            $data1 = [
                'data' => $this->m_rule->get_data($id)
            ];
            $this->load->view('admin/partials/head', $data1);
            $this->load->view('admin/content/data_rule_edit', $data1);
            $this->load->view('admin/partials/footer', $data1);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data rule Success!.");
        $this->session->set_flashdata('msg_class', 'alert-danger');
        $this->m_rule->delete($id);
        redirect('data-rule');
    }
}
