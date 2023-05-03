<?php defined('BASEPATH') OR exit('No direct script access allowed');

class EmailSetting_model extends MY_Model {

    var $table = 'email_setting';
    
    var $column_order  = array(NULL,NULL,'description','host','port','smtp_secure','smtp_debug','smtp_auth','username','password','sender_name','active');
    var $column_search = array('description','host','port','smtp_secure','smtp_debug','smtp_auth','username','password','sender_name','active'); 
    var $order         = array('id' => 'ASC');

    public function __construct(){
        parent::__construct();
    $this->load->database();
    }

    public function query_data(){
        $sql  = 'SELECT id, description, host, port, smtp_secure, smtp_debug, smtp_auth, username, password, sender_name, active ';
        $sql .= 'FROM email_setting';
        return $sql;
    }

    function set_default($id){
    	$this->db->update($this->table, ['active' => 'no'], ['active' => 'yes']);
    	$this->db->update($this->table, ['active' => 'yes'], ['id' => $id]);
    }
    
}