<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Radcheck_model extends CI_Model
{

    public $table = 'radcheck';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function cek_user($username,$password){
        $this->db->where(array('username' => $username,'value' => $password));
        return $this->db->get($this->table)->row();
    }

    function update($username,$data){
    	$this->db->where('username', $username);
        $this->db->update($this->table, $data);
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-21 12:16:53 */
/* http://harviacode.com */