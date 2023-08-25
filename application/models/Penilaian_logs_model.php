<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_logs_model extends MY_Model {
    
    var $table  = 'penilaian_logs';
    var $owner  = '';

		public function __construct(){
			parent::__construct();
	    $this->load->database();
	  }

		public function sql_view(){   
			$sql  = ' (SELECT 
														pl.jurnal_id,
														pl.user_id,
														u.name AS user_nama,
														pl.data_penilaian,
														date_format(pl.created,"%d-%m-%Y") AS tanggal,
														date_format(pl.created,"%H:%i:%s") AS waktu,
														pl.created';
			$sql .= ' FROM penilaian_logs pl ';
			$sql .= ' LEFT JOIN user u ON u.id = pl.user_id  ';
			$sql .= ' ORDER BY pl.created ASC  ';


			if (!empty($this->owner)) {
				$sql .= ' WHERE '.$this->owner;
			}

			$sql .= ' ) AS sql_view';

			return $sql;
		}

		public function get_data($keyword, $all=false){
	    if ($keyword!=null) {
	        $this->db->where($keyword);
	    }
			$this->db->from($this->sql_view());
			$query = $this->db->get();
			if ($all==true){
				return $query->result();
			}else{
				return $query->row();
			}
		}

}


