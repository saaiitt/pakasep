<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'm_login');
        $this->load->model('Berita_model', 'm_berita');
        $this->load->helper('text');
        $this->load->library('upload');
        if (!$this->m_login->CurrentUser()) {
            $this->session->set_flashdata('msg', "Pastikan anda sudah login akun!.");
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $data = [
            'data' => $this->m_berita->index()
        ];
        $this->load->view('admin/partials/head', $data);
        $this->load->view('admin/content/data_berita', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function insert()
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_berita->rules());
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/partials/head');
                $this->load->view('admin/content/data_berita_add');
                $this->load->view('admin/partials/footer');
            } else {
                $config['upload_path'] = 'assets/images';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5048;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('msg', "Gagal Insert gambar.");
                    $this->session->set_flashdata('msg_class', 'alert-danger');
                    redirect('data-berita/insert');
                } else {
                    $uploadData = $this->upload->data();
                    $gambar = $uploadData['file_name'];
                    $data = array(
                        'judul' => $this->input->post('judul'),
                        'konten' => $this->input->post('konten'),
                        'gambar' => $gambar,
                        'slug' => $this->input->post('slug'),
                        'pembuat' => $this->session->userdata('username')
                    );
                    $this->m_berita->insert($data);
                    $this->session->set_flashdata('msg', "Insert data berita Success!.");
                    $this->session->set_flashdata('msg_class', 'alert-success');
                    redirect('data-berita');
                }
            }
        } else {
            $this->load->view('admin/partials/head');
            $this->load->view('admin/content/data_berita_add');
            $this->load->view('admin/partials/footer');
        }
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules($this->m_berita->rules());
            if ($this->form_validation->run() == FALSE) {
                $data1 = [
                    'data' => $this->m_berita->get_data($id)
                ];
                $this->load->view('admin/partials/head', $data1);
                $this->load->view('admin/content/data_berita_edit', $data1);
                $this->load->view('admin/partials/footer', $data1);
            } else {
                $cek = $this->m_berita->get_data($id);
                $config['upload_path'] = 'assets/images';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5048;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                        'judul' => $this->input->post('judul'),
                        'konten' => $this->input->post('konten'),
                        'slug' => $this->input->post('slug'),
                        'pembuat' => $this->session->userdata('username')
                    );
                    $this->m_berita->update($data, $id);
                    $this->session->set_flashdata('msg', "Update data berita Success tanpa image!.");
                    $this->session->set_flashdata('msg_class', 'alert-success');
                    redirect('data-berita');
                } else {
                    $path = 'assets/images/' . $cek->gambar;
                    chmod($path, 0777);
                    unlink($path);
                    $uploadData = $this->upload->data();
                    $gambar = $uploadData['file_name'];
                    $data = array(
                        'judul' => $this->input->post('judul'),
                        'konten' => $this->input->post('konten'),
                        'gambar' => $gambar,
                        'slug' => $this->input->post('slug'),
                        'pembuat' => $this->session->userdata('username')
                    );
                    $this->m_berita->update($data, $id);
                    $this->session->set_flashdata('msg', "Update data berita Success!.");
                    $this->session->set_flashdata('msg_class', 'alert-success');
                    redirect('data-berita');
                }
            }
        } else {
            $data1 = [
                'data' => $this->m_berita->get_data($id)
            ];
            $this->load->view('admin/partials/head', $data1);
            $this->load->view('admin/content/data_berita_edit', $data1);
            $this->load->view('admin/partials/footer', $data1);
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('msg', "Delete data berita Success!.");
        $this->session->set_flashdata('msg_class', 'alert-danger');
        $this->m_berita->delete($id);
        redirect('data-berita');
    }
}
