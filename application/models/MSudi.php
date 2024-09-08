<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
		// Insert syntax
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
		// Update syntax
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
		// Delete syntax
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
		// Get Table Data syntax
        $query= $this->db->get($tabel);
		
		// Show result
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

	function GetDataWhere1($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query->result();
    }
	
    function GetDataJoinWhere($table, $table1, $table2, $onjoin, $id, $nilai,$id2, $nilai2)
    {
        $this->db->from($table1);
        $this->db->join($table2, $onjoin);
		$this->db->where($id,$nilai);
        $this->db->where($id2,$nilai2);
        $query = $this->db->get($table);
        return $query->result();
    }
	
	function GetDataJoinWhere1($tabel, $tabel2, $onjoin, $id, $nilai,$id2, $nilai2)
	{
        $this->db->join($tabel2, $onjoin);
		$this->db->where($id,$nilai);
        $this->db->where($id2,$nilai2);
        $query = $this->db->get($tabel);
        return $query->result();
    }


    function GetDataJoinWhere2($tabel, $tabel2, $onjoin, $id, $nilai,$group)
    {
        $this->db->join($tabel2, $onjoin);
        $this->db->where($id,$nilai);
        $this->db->group_by($group);
        $query = $this->db->get($tabel);
        return $query->result();
    }
}