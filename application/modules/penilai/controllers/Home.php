<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent::__construct();
      $this->modul='penilai';
      $this->class=strtolower(__CLASS__);

      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('user_model','m_data');      
      $this->load->model('jurnal_model','m_jurnal');      
  
    }

	public function index(){

		$invoke['myjurnal']     =  $this->m_jurnal->get_rows();
		$invoke['pengusul']     =  $this->m_data->get_rows(['level' => 'user']);

		$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
		$invoke['jsfile']       = 'index_js.php';

		$this->load->view('__home/index', $invoke);
	}
}