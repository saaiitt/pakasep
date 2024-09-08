<?php

class Dashboard_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->select('*')->from('tb_kerusakan');
        $query = $this->db->get();
        return $query;
    }

    public function Data_Gejala()
    {
        $this->db->select('*')->from('tb_gejala');
        $query = $this->db->get();
        return $query;
    }

    public function Data_Riwayat()
    {
        $this->db->select('*')->from('riwayat_jawaban');
        $query = $this->db->get();
        return $query;
    }

    public function Data_Pasien()
    {
        $this->db->select('*')->from('tb_user');
        $query = $this->db->get();
        return $query;
    }
}
