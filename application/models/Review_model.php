<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends MY_Model {

		public function __construct(){
			parent::__construct();
	    $this->load->database();
	  }

		public function get_reviewer(){
	    $this->db->select('u.`name`, COUNT(j.id) AS jum, GROUP_CONCAT(j.id) AS jurnal_id');
			$this->db->from('jurnal j');
	    $this->db->join('user u','u.id = j.review_by','INNER');
	    $this->db->group_by('j.review_by');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_info(){
			$sql  = ' SELECT u.`name`, ';
			$sql .= '		COUNT(j.id) AS all_jurnal, ';
			$sql .= '		(SELECT COUNT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "1" ) AS j_done,';
			$sql .= '		(SELECT COUNT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "2" ) AS j_notyet,';
			$sql .= '		GROUP_CONCAT(j.id) AS j_id,';
			$sql .= '		(SELECT GROUP_CONCAT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "1" ) AS done_j_id,';
			$sql .= '		(SELECT GROUP_CONCAT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "2" ) AS notyet_j_id';
			$sql .= ' FROM jurnal j';
			$sql .= ' INNER JOIN `user` u ON u.id = j.review_by';
			$sql .= ' GROUP BY j.review_by';		
			$query = $this->db->query($sql);
			return $query->result();
		}

}