<?php

class Riwayat_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->select('*')->from('riwayat_jawaban')->join('tb_user', 'tb_user.uniq_id = riwayat_jawaban.id_user');
        $query = $this->db->get();
        return $query;
    }

    function delete_by_uniq_id($uniq)
    {
        return $this->db->delete('tb_user', ['uniq_id' => $uniq]);
    }

    public function print_data()
    {
        $query = $this->index();
        foreach ($query->result() as $row) {
            print_r($row);
            echo "<br>";
        }
    }
}
