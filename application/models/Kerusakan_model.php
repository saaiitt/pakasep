<?php

class kerusakan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'kode_kerusakan',
                'label' => 'Kode kerusakan',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_kerusakan',
                'label' => 'Nama kerusakan',
                'rules' => 'required'
            ],
            [
                'field' => 'penjelasan',
                'label' => 'Penjelasan',
                'rules' => 'required'
            ],
            [
                'field' => 'gejala',
                'label' => 'Gejala',
                'rules' => 'required'
            ],
            [
                'field' => 'penanganan',
                'label' => 'Penanganan',
                'rules' => 'required'
            ],
        ];
    }

    public function index()
    {
        $this->db->select('*')->from('tb_kerusakan');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id)
    {
        $this->db->select('*')->from('tb_kerusakan')->where('id_kerusakan', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tb_kerusakan', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('tb_kerusakan', ['id_kerusakan' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_kerusakan', $data, ['id_kerusakan' => $id]);
    }
}
