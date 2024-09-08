<?php

class Pasien_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' => 'umur',
                'label' => 'umur',
                'rules' => 'required'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            [
                'field' => 'no_kk',
                'label' => 'No KK',
                'rules' => 'required'
            ],
            [
                'field' => 'telp',
                'label' => 'telp',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ],
        ];
    }

    public function index()
    {
        $this->db->select('*')->from('tb_user');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id)
    {
        $this->db->select('*')->from('tb_user')->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function delete($id)
    {
        return $this->db->delete('tb_user', ['id' => $id]);
    }

    public function delete_riwayat($id)
    {
        return $this->db->delete('riwayat_jawaban', ['id_user' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_user', $data, ['id' => $id]);
    }
}
