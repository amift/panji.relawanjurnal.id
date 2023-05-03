<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends MY_Model {
    
    var $table  = 'provinsi';

    var $column_order  = array(NULL,NULL,'name','iso'); 
    var $column_search = array('name','iso'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();
	}

	public function query_data(){
		$sql  = 'SELECT id, name, iso ';
		$sql .= 'FROM provinsi';
		return $sql;
	}

}