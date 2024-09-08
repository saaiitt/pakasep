<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
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
            'data' => $this->m_pasien->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_pasien', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_pasien->rules());
            if ($this->form_validation->run() == FALSE) {
                $data1 = [
                    'data' => $this->m_pasien->get_data($id)
                ];
                $this->load->view('admin/partials/head', $data1);
                $this->load->view('admin/content/data_pasien_edit', $data1);
                $this->load->view('admin/partials/footer', $data1);
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'umur' => $this->input->post('umur'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'no_kk' => $this->input->post('no_kk'),
                    'telp' => $this->input->post('telp'),
                    'alamat' => $this->input->post('alamat')
                ];
                $this->m_pasien->update($data, $id);
                $this->session->set_flashdata('msg', "Update data pasien Success!.");
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect('data-pasien');
            }
        } else {
            $data1 = [
                'data' => $this->m_pasien->get_data($id)
            ];
            $this->load->view('admin/partials/head', $data1);
            $this->load->view('admin/content/data_pasien_edit', $data1);
            $this->load->view('admin/partials/footer', $data1);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data pasien dan riwayat Success!.");
        $this->session->set_flashdata('msg_class', 'alert-success');
        $cek = $this->m_pasien->get_data($id);
        $this->m_pasien->delete($id);
        $this->m_pasien->delete_riwayat($cek->uniq_id);
        redirect('data-riwayat');
    }
}
