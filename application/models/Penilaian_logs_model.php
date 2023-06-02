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
													u.name AS user_nama,
													pl.data_penilaian,
													date_format(pl.created,"%d-%m-%Y") AS tanggal,
													date_format(pl.created,"%H:%i:%s") AS waktu,
													pl.created';
		$this->sql_view .= ' FROM penilaian_logs pl ';
		$this->sql_view .= ' LEFT JOIN user u ON u.id = pl.user_id  ';
		$this->sql_view .= ' ORDER BY pl.created ASC  ';


		if (!empty($this->owner)) {
			$this->sql_view .= ' WHERE '.$this->owner;
		}

		$this->sql_view .= ' ) AS sql_view';
	}

	public function get_data($keyword, $all=false){
    if ($keyword!=null) {
        $this->db->where($keyword);
    }
		$this->db->from($this->sql_view);
		$query = $this->db->get();
		if ($all==true){
			return $query->result();
		}else{
			return $query->row();
		}
	}

}


