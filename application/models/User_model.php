<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
    
    var $table    = 'user';

    var $column_order  = array(NULL,NULL,'username','name','email','telepon','provinsi_nama','institusi', 'is_verified', 'is_active', 'last_login'); 
    var $column_search = array('username','name','email','telepon','provinsi_nama','institusi', 'is_verified', 'is_active', 'last_login','level'); 
    var $order         = array('id' => 'ASC');

		public function __construct(){
			parent::__construct();
	    $this->load->database();

	  }

		public function sql_view(){  
			$sql  = ' (SELECT 
													u.id, 
													u.username, 
													u.name, 
													u.email, 
													u.telepon,
													u.foto,
													u.provinsi_id,
													p.name as provinsi_nama, 
													u.institusi, 
													u.level,
													u.is_verified, 
													u.is_active, 
													u.last_login ';
			$sql .= ' FROM user u ';
			$sql .= ' LEFT JOIN provinsi p ON p.id = u.provinsi_id) AS sql_view';

			return $sql;
		}

		public function query_data(){
			$sql  = ' SELECT id, username, name, email, telepon, foto, provinsi_id, provinsi_nama, institusi, level, is_verified, is_active, last_login ';
			$sql .= ' FROM '.$this->sql_view();
			return $sql;
		}

		public function get_it_all($keyword){
	    if ($keyword!=null) {
	        $this->db->where($keyword);
	    }
			$this->db->from($this->sql_view());
			$query = $this->db->get();
			return $query->row();
		}

		public function get_stat_of_pengusul(){
	    $this->db->select('p.name AS provinsi_nama, COUNT(u.provinsi_id) AS jumlah, provinsi_id')
	    				 ->select('(SELECT count(id) FROM jurnal WHERE jurnal.provinsi_id = u.provinsi_id) AS jurnal')
	    				 ->distinct();
			$this->db->from('user u');
	    $this->db->join('provinsi p','p.id=u.provinsi_id','INNER');
	    $this->db->where('level','user');
	    $this->db->group_by('u.provinsi_id');
	    $this->db->order_by('jumlah','DESC')->order_by('provinsi_nama','ASC');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_detail_jurnal_by_pengusul($provinsi_id){
	    $this->db->select('name')
	    				 ->select('(SELECT COUNT(id) FROM jurnal WHERE jurnal.user_id = user.id) AS jumlah')
	    				 ->select('(SELECT GROUP_CONCAT(nama SEPARATOR "|") FROM jurnal WHERE jurnal.user_id = user.id) AS jurnal');
			$this->db->from('user');
	    $this->db->where('provinsi_id',$provinsi_id);
	    $this->db->where('level','user');
			$query = $this->db->get();
			return $query->result();
		}

}