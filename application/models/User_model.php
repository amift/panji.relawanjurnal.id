<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
    
    var $table  = 'user';

    var $column_order  = array(NULL,NULL,'username','name','email','telepon','provinsi_nama','last_login'); 
    var $column_search = array('username','name','email','telepon','provinsi_nama','last_login'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();
	}

	public function query_data(){
		$sql_view  = '(SELECT u.id, u.username, u.name, u.email, u.telepon, u.provinsi_id ,p.name as provinsi_nama, u.last_login ';
		$sql_view .= 'FROM user u ';
		$sql_view .= 'LEFT JOIN provinsi p ON p.id = u.provinsi_id) AS sql_view';

		$sql  = 'SELECT id, username, name, email, telepon, provinsi_id, provinsi_nama, last_login ';
		$sql .= 'FROM '.$sql_view;
		return $sql;
	}


	public function get_it_all(){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('provinsi', 'provinsi.id = user.provinsi_id');
		$query = $this->db->get();
		return $query->result();
		// Produces:
		// SELECT * FROM blogs JOIN comments ON comments.id = blogs.id		
	}

  // public function get_it($keyword=null,$field=null, $is_all=false,$jointable, $ontable){
  //     if ($keyword!=null) {
  //         $this->db->where($keyword);
  //     }
  //     if ($field!=null) {
  //         $this->db->select($field);
  //     }
  //     $this->db->from($this->table);
  //     $query = $this->db->get();

  //     if ($is_all==true) {
  //         return $query->result();
  //     }else{
  //         return $query->row();
  //     }
  // }   

}