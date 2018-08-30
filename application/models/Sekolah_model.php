<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{

    public $table = 'sekolah';
    public $id = 'idSklh';
    public $order = 'DESC';
    public $id2 = 'u_name';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

     function create_data($data)
    {
        $this->db->insert($this->table, $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false;
        }
    }
        function valid_id($id2)
    {
        $query = $this->db->get_where($this->table, array('u_name' => $id2));
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function getsekolahbyuname($uname){
        return $this->db->get_where($this->table,array('u_name'=>$uname));
    }

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */