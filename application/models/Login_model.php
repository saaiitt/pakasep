<?php

class Login_model extends CI_Model
{
    private $_table = "tb_admin";
    const SESSION_KEY = 'username';

    function __construct()
    {
        parent::__construct();
    }

    public function get_admin($data)
    {
        $this->db->select('*');
        $this->db->from('tb_admin')->where('username = ', $data['username'])->where('password = ', $data['password']);
        $query = $this->db->get();
        return $query;
    }

    public function CurrentUser()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['username' => $user_id]);
        return $query->row();
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }
}
