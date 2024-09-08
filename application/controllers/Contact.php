<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('content/contact');
        $this->load->view('template/footer');
    }
}
