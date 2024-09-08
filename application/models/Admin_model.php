<?php

class Admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];
    }

    public function index()
    {
        $this->db->select('*')->from('tb_admin');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id)
    {
        $this->db->select('*')->from('tb_admin')->where('id_admin', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tb_admin', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('tb_admin', ['id_admin' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_admin', $data, ['id_admin' => $id]);
    }
}
