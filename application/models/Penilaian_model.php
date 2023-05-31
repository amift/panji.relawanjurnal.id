<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends MY_Model {
    
    var $table  = 'penilaian';
    var $sql_view = '';    
    var $owner  = '';

	public function __construct(){
		parent::__construct();
    $this->load->database();

		$this->sql_view  = ' (SELECT 
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
													p.inovasi';
		$this->sql_view .= ' FROM penilaian p ';
		if (!empty($this->owner)) {
			$this->sql_view .= ' WHERE '.$this->owner;
		}

		$this->sql_view .= ' ) AS sql_view';
	}

	public function get_data($keyword){
    if ($keyword!=null) {
        $this->db->where($keyword);
    }
		$this->db->from($this->sql_view);
		$query = $this->db->get();
		return $query->row();
	}

}


