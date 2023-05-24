<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string','general']);
			$this->load->library(['form_validation']);
			$this->load->library(['PHPMailer_Lib']);

      $this->modul='auth';
      $this->class=strtolower(__CLASS__);

      $this->load->model('User_model','m_data');
	}


	public function index(){
		redirect(base_url(),true);
  }

	protected function success(){
		$this->load->view('__'.$this->class.'/success');   
  }

  protected function failed(){
		$this->load->view('__'.$this->class.'/failed');   
  }

  public function key_check($code){
  	$result = $this->m_data->get_it(['verification_key' => $code]);
	  if ( !empty($result) ) {
	  	$data = ['verification_key' => '', 'is_verified' => 'yes','is_active' => 'yes'];
	  	$where = ['id' => $result->id];
	  	$this->m_data->update($data, $where);
	  	$this->success();
	  }else{
	  	$this->failed();
	  }
  }

}