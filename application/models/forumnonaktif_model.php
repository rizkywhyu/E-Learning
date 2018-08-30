<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class forumnonaktif_model extends CI_Model
{

    public $table = 'historyforum';
   
    public $id = 'idForum';
    public $order = 'DESC';
   

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
        // $data = $this->db->query('select * from guru join kodeguru on guru.idSklh=kodeguru.idSklh');
        // return $data;
    }
     function get_all_forumnonaktif()
    {
        $query = $this->db->query('select * from historyforum join sekolah using (idSklh) limit 1');
        return $query->result();
        
    }

    
    function getforumnonaktifbysekolah($id_sekolah){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('idSklh', $id_sekolah);
        $query = $this->db->get();
        return $query->result();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idForum', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('kodeguru', $q);
    $this->db->or_like('idSklh', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kelas', $q);
    $this->db->or_like('mp', $q);
    
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
             $this->db->like('idForum', $q);
    $this->db->or_like('password', $q);
    $this->db->or_like('kodeguru', $q);
    $this->db->or_like('idSklh', $q);
    $this->db->or_like('nama', $q);
    $this->db->or_like('kelas', $q);
    $this->db->or_like('mp', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
     function inserthistory($forumm)
    {
        $this->db->insert($this->table2, $forumm);
    }


    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function move($id, $data)
    {
        // $data = array('Stok' => '(Stok-'$Stok')');
        $this->db->where($this->id, $id);
        // $this->db->set('Stok','Stok-".$Stok"', FALSE);
        $this->db->update($this->table, $data);
       //$this->db->query("UPDATE barang SET Stok = Stok - '.$NEW.Stok' WHERE IdBarang = '.$IdBarang'");
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
        function valid_id($id)
    {
        $query = $this->db->get_where($this->table, array('idForum' => $id));
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    //  function dd_tempat()
    // {
    //     // ambil data dari db
    //     $this->db->order_by('tempat', 'asc');
    //     $result = $this->db->get('tempat');
        
    //     // bikin array
    //     // please select berikut ini merupakan tambahan saja agar saat pertama
    //     // diload akan ditampilkan text please select.
    //     $dd[''] = 'Please Select';
    //     if ($result->num_rows() > 0) {
    //         foreach ($result->result() as $row) {
    //         // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
    //             $dd[$row->id_tempat] = $row->tempat;
    //         }
    //     }
    //     return $dd;
    // }
   

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */