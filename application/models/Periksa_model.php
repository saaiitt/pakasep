<?php

class Periksa_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function insertBiodata($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    public function deleteBiodata($dataId)
    {
        $this->db->where('id', $dataId);
        $this->db->delete('tb_user');
    }

    public function insert_riwayat($data)
    {
        return $this->db->insert('riwayat_jawaban', $data);
    }

    public function get_user_nama($id)
    {
        $this->db->select('*')->from('tb_user')->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function Get_Gejala()
    {
        $this->db->select('*')->from('tb_gejala');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_rule_by_kode_gejala($kodeGejala)
    {
        $this->db->like('kode_gejala', $kodeGejala, 'both');
        return $this->db->get('tb_rule')->result_array();
    }

    public function get_kerusakan_by_kode($kodekerusakan)
    {
        $this->db->where('kode_kerusakan', $kodekerusakan);
        return $this->db->get('tb_kerusakan')->row_array();
    }

    public function get_gejala_by_kode($kodeGejala)
    {
        // Query untuk mengambil data gejala berdasarkan kode gejala
        $query = $this->db->get_where('tb_gejala', array('kode_gejala' => $kodeGejala));

        // Mengembalikan hasil query sebagai array assosiatif
        return $query->row_array();
    }

    public function get_total_gejala_by_kode_kerusakan($kodekerusakan)
    {
        $query = $this->db->select('kode_gejala')
            ->where('kode_kerusakan', $kodekerusakan)
            ->get('tb_rule');
        $row = $query->row();

        if ($row) {
            $kodeGejala = $row->kode_gejala;
            $totalGejala = count(explode(" ", $kodeGejala));
            return $totalGejala;
        }

        return 0;
    }

    public function insert_riwayat_jawaban($dataRiwayat)
    {
        return $this->db->insert('riwayat_jawaban', $dataRiwayat);
    }

    public function update_riwayat_jawaban($dataRiwayat)
    {
        $idJawaban = $this->db->insert_id();
        $this->db->where('id_jawaban', $idJawaban);
        $this->db->update('riwayat_jawaban', $dataRiwayat);
    }
}
