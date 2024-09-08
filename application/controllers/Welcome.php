<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Berita_model', 'm_berita');
		$this->load->library('pagination');
		$this->load->helper('text');
	}

	public function index()
	{
		$config['base_url'] = site_url('welcome/index');
		$config['total_rows'] = $this->m_berita->count_berita();
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;

		// Styling pagination
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['berita'] = $this->m_berita->get_berita($config['per_page'], $this->uri->segment(3));
		$data['child'] = $this->m_berita->berita_child();
		$data['galeri'] = $this->m_berita->galeri_child();

		$this->load->view('template/header', $data);
		$this->load->view('content/index', $data);
		$this->load->view('template/footer', $data);
	}
}
