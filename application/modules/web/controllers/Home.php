<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(['PHPMailer_Lib']);

      $this->modul='web';
      $this->class=strtolower(__CLASS__);
	}

	public function index(){
		$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
		
		$this->load->view('__'.$this->class.'/index', $invoke);   
  }

}