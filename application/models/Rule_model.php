<?php

class Rule_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'kode_rule',
                'label' => 'Kode Rule',
                'rules' => 'required'
            ],
            [
                'field' => 'kode_gejala',
                'label' => 'Kode Gejala',
                'rules' => 'required'
            ],
            [
                'field' => 'kode_kerusakan',
                'label' => 'Kerusakan',
                'rules' => 'required'
            ],
        ];
    }

    public function index()
    {
        $this->db->select('*')->from('tb_rule')->join('tb_kerusakan', 'tb_kerusakan.kode_kerusakan = tb_rule.kode_kerusakan');
        $query = $this->db->get();
        return $query;
    }

    public function get_data_kerusakan()
    {
        $this->db->select('*')->from('tb_kerusakan');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id)
    {
        $this->db->select('*')->from('tb_rule')->where('id_rule', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tb_rule', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('tb_rule', ['id_rule' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_rule', $data, ['id_rule' => $id]);
    }
}
