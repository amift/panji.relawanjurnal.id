<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EmailTemplates_model extends MY_Model {

		var $table  = 'email_template';
    
    var $column_order  = array(NULL,NULL,'name', 'tags');
    var $column_search = array('name', 'tags'); 
    var $order         = array('id' => 'ASC'); 

    public function __construct(){
        parent::__construct();
    $this->load->database();
    }

    public function query_data(){
        $sql  = 'SELECT id, name, tags ';
        $sql .= 'FROM email_template';
        return $sql;
    }
	
}