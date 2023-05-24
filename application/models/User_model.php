<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
    
    var $table    = 'user';
    var $sql_view = '';

    var $column_order  = array(NULL,NULL,'username','name','email','telepon','provinsi_nama','institusi', 'is_verified', 'is_active', 'last_login'); 
    var $column_search = array('username','name','email','telepon','provinsi_nama','institusi', 'is_verified', 'is_active', 'last_login'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();

		$this->sql_view  = ' (SELECT 
												u.id, 
												u.username, 
												u.name, 
												u.email, 
												u.telepon,
												u.foto,
												u.provinsi_id,
												p.name as provinsi_nama, 
												u.institusi, 
												u.is_verified, 
												u.is_active, 
												u.last_login ';
		$this->sql_view .= ' FROM user u ';
		$this->sql_view .= ' LEFT JOIN provinsi p ON p.id = u.provinsi_id) AS sql_view';
	}

	public function query_data(){
		$sql  = ' SELECT id, username, name, email, telepon, foto, provinsi_id, provinsi_nama, institusi, is_verified, is_active, last_login ';
		$sql .= ' FROM '.$this->sql_view;
		return $sql;
	}

	public function get_it_all($keyword){
    if ($keyword!=null) {
        $this->db->where($keyword);
    }
		$this->db->from($this->sql_view);
		$query = $this->db->get();
		return $query->row();
	}

}