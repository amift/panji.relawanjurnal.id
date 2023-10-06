<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends MY_Model {

		public function __construct(){
			parent::__construct();
	    $this->load->database();
	  }

		public function get_info(){
			$sql  = ' SELECT u.id as user_id, u.`name` as user_name, p.name AS provinsi_nama, ';
			$sql .= '		COUNT(j.id) AS all_jurnal, ';
			$sql .= '		(SELECT COUNT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "1" ) AS j_done,';
			$sql .= '		(SELECT COUNT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "2" ) AS j_notyet,';
			$sql .= '		GROUP_CONCAT(j.id) AS j_id,';
			$sql .= '		(SELECT GROUP_CONCAT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "1" ) AS done_j_id,';
			$sql .= '		(SELECT GROUP_CONCAT(jj.id) FROM jurnal jj WHERE jj.review_by = u.id AND jj.`status` = "2" ) AS notyet_j_id';
			$sql .= ' FROM jurnal j';
			$sql .= ' INNER JOIN `user` u     ON u.id = j.review_by';
			$sql .= ' INNER JOIN `provinsi` p ON p.id = u.provinsi_id';
			$sql .= ' GROUP BY j.review_by';		
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_info_done($id){
	    $this->db->select('j.id, j.nama, j.url, p.name AS provinsi_nama');
			$this->db->from('jurnal j');
		  $this->db->join('provinsi p','p.id=j.provinsi_id','INNER');
	    $this->db->where('j.status','1');
	    $this->db->where('j.review_by',$id);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_info_notyet($id){
	    $this->db->select('j.id, j.nama, j.url, p.name AS provinsi_nama,j.review_by, u.name AS user_nama');
			$this->db->from('jurnal j');
		  $this->db->join('provinsi p','p.id=j.provinsi_id','INNER');
		  $this->db->join('user u','u.id=j.review_by','INNER');
	    $this->db->where('j.status','2');
	    $this->db->where('j.review_by',$id);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_reviewer($id){
	    $this->db->select('u.id, u.name, p.name AS provinsi_nama');
			$this->db->from('user u');
		  $this->db->join('provinsi p','p.id=u.provinsi_id','INNER');
	    $this->db->where('u.level','penilai');
	    $this->db->where('u.id <>',$id);
			$query = $this->db->get();
			return $query->result();
		}		


		public function do_reassigment($idfrom,$idto,$idjurnal){
			if ($this->input->is_ajax_request()) {
					$this->db->insert('jurnalreviewer_logs',['jurnal_id' => $idjurnal,'review_by' => $idto]);
					$this->db->update('jurnal', ['review_by' => $idto ], ['id' => $idjurnal ]);
					$data['status'] = TRUE;
					$data['idfrom'] = $idfrom;
          $this->output->set_content_type('application/json')->set_output(json_encode($data));					
			}else{
          $output=['Status' => 'false'];
          $this->output->set_content_type('application/json')->set_output(json_encode($output));
      }
		}		
}