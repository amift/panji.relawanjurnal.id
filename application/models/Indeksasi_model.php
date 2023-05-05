<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Indeksasi_model extends MY_Model {
    
    var $table  = 'indeksasi';

    var $column_field  = array('name','keterangan'); 
    var $column_order  = array(NULL,NULL,'name','keterangan'); 
    var $column_search = array('name','keterangan'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();
	}

	public function query_data(){
		$sql  = 'SELECT id, name, keterangan ';
		$sql .= 'FROM '.$this->table;
		return $sql;
	}

}