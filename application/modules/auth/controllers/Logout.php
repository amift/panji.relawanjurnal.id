<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
      $this->modul='auth';
      $this->class=strtolower(__CLASS__);

      $this->load->model('User_model','m_data');
	}

	public function index(){
		$_SESSION['KCFINDER']['disabled']  = true;
		$_SESSION['KCFINDER']['uploadURL'] = '';
		$_SESSION['KCFINDER']['uploadDir'] = '';
		$this->session->sess_destroy();

		redirect(base_url());
  }

}