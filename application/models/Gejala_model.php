<?php

class Gejala_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'gejala',
                'label' => 'Gejala',
                'rules' => 'required'
            ],
            [
                'field' => 'kode_gejala',
                'label' => 'Kode Gejala',
                'rules' => 'required'
            ],
        ];
    }

    public function index()
    {
        $this->db->select('*')->from('tb_gejala')->order_by('kode_gejala', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id)
    {
        $this->db->select('*')->from('tb_gejala')->where('id_gejala', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tb_gejala', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('tb_gejala', ['id_gejala' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_gejala', $data, ['id_gejala' => $id]);
    }
}
