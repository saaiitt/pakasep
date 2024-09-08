<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'judul',
                'label' => 'judul',
                'rules' => 'required'
            ],
            [
                'field' => 'konten',
                'label' => 'konten',
                'rules' => 'required'
            ],
            [
                'field' => 'slug',
                'label' => 'slug',
                'rules' => 'required'
            ],
        ];
    }

    public function index()
    {
        $query = $this->db->get('tb_berita');
        return $query->result();
    }

    public function berita_child()
    {
        $this->db->order_by('date', 'asc');
        $this->db->limit(3);
        $query = $this->db->get('tb_berita');
        return $query->result();
    }

    public function galeri_child()
    {
        $this->db->order_by('date', 'asc');
        $this->db->limit(9);
        $query = $this->db->get('tb_berita');
        return $query->result();
    }

    public function get_berita($limit, $offset)
    {
        $this->db->order_by('date', 'DESC');
        $this->db->limit($limit, $offset)->order_by('date', 'asc');
        $query = $this->db->get('tb_berita');
        return $query->result();
    }

    public function count_berita()
    {
        return $this->db->count_all('tb_berita');
    }

    public function insert($data)
    {
        return $this->db->insert('tb_berita', $data);
    }

    public function get_data($id)
    {
        $this->db->select('*')->from('tb_berita')->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function delete($id)
    {
        return $this->db->delete('tb_berita', ['id' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_berita', $data, ['id' => $id]);
    }

    public function get_detail($slug)
    {
        $this->db->select('*')->from('tb_berita')->where('slug', $slug);
        $query = $this->db->get()->row();
        return $query;
    }
}
