<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends MY_Model {
    
    var $table  = 'penilaian';
    var $owner  = '';

		public function __construct(){
			parent::__construct();
	    $this->load->database();
	  }

		public function sql_view(){  
			$sql  = ' (SELECT 
														p.id,
														p.jurnal_id,
														p.relevansi,
														p.kualitas,
														p.editorial,
														p.pengeditan,
														p.peer_review,
														p.tata_kelola_jurnal,
														p.diver_penulis,
														p.diver_dewan_redaksi,
														p.sitasi,
														p.inovasi,
														p.catatan';
			$sql .= ' FROM penilaian p ';
			if (!empty($this->owner)) {
				$sql .= ' WHERE '.$this->owner;
			}

			$sql .= ' ) AS sql_view';

			return $sql;
		}

		public function get_data($keyword){
	    if ($keyword!=null) {
	        $this->db->where($keyword);
	    }
			$this->db->from($this->sql_view());
			$query = $this->db->get();
			return $query->row();
		}

}


