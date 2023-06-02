<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_logs_model extends MY_Model {
    
    var $table  = 'penilaian_logs';
    var $sql_view = '';    
    var $owner  = '';

	public function __construct(){
		parent::__construct();
    $this->load->database();

		$this->sql_view  = ' (SELECT 
													pl.jurnal_id,
													pl.user_id,
													pl.data_penilaian,
													pl.created';
		$this->sql_view .= ' FROM penilaian_lohs pl ';
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


