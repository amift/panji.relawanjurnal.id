<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Groups_model extends MY_Model {
    
    var $table  = 'groups';

    var $column_order  = array(NULL,NULL,'name','description'); 
    var $column_search = array('name','description'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();
	}

	public function query_data(){
		$sql  = 'SELECT id, name, description ';
		$sql .= 'FROM groups';
		return $sql;
	}

}