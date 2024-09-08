<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Admin_model', 'm_admin');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_admin->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_admin', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function insert()
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_admin->rules());
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/partials/head');
                $this->load->view('admin/content/data_admin_add');
                $this->load->view('admin/partials/footer');
            } else {
                $data = [
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                ];
                $this->m_admin->insert($data);
                $this->session->set_flashdata('msg', "Insert data admin Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-admin');
            }
        } else {
            $this->load->view('admin/partials/head');
            $this->load->view('admin/content/data_admin_add');
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_admin->rules());
            if ($this->form_validation->run() == FALSE) {
                $data1 = [
                    'data' => $this->m_admin->get_data($id)
                ];
                $this->load->view('admin/partials/head', $data1);
                $this->load->view('admin/content/data_admin_edit', $data1);
                $this->load->view('admin/partials/footer', $data1);
            } else {
                $data = [
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                ];
                $this->m_admin->update($data, $id);
                $this->session->set_flashdata('msg', "Update data admin Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-admin');
            }
        } else {
            $data1 = [
                'data' => $this->m_admin->get_data($id)
            ];
            $this->load->view('admin/partials/head', $data1);
            $this->load->view('admin/content/data_admin_edit', $data1);
            $this->load->view('admin/partials/footer', $data1);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data admin Success!.");
        $this->session->set_flashdata('msg_class', 'alert-danger');
        $this->m_admin->delete($id);
        redirect('data-admin');
    }
}