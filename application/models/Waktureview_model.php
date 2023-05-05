<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Waktureview_model extends MY_Model {
    
    var $table  = 'waktu_review';

    var $column_order  = array(NULL,NULL,'nama','keterangan'); 
    var $column_search = array('nama','keterangan'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();
	}

	public function query_data(){
		$sql  = 'SELECT id, nama, keterangan ';
		$sql .= 'FROM '.$this->table;
		return $sql;
	}

}