<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string','general']);
			$this->load->library(['form_validation']);		

      $this->modul='auth';
      $this->class=strtolower(__CLASS__);

      $this->load->model('User_model','m_data');

	}

	public function index(){
		$invoke['baseurl'] = base_url($this->modul.'/'.$this->class);
		$invoke['jsfile']  = 'index_js.php';
		$this->load->view('__'.$this->class.'/index', $invoke);   
  }

  public function login(){
      if ($this->input->is_ajax_request()) { 
					$this->validation_language();

	        $this->form_validation->set_rules('input_username'     ,'Username'  ,'trim|max_length[50]|required');
	        $this->form_validation->set_rules('input_password'     ,'Password'  ,'trim|max_length[255]|required');

          if ($this->form_validation->run() == FALSE){
						$errors = array(
												'input_username'     =>  form_error('input_username'),
												'input_password'     =>  form_error('input_password'),
											);

          	$invoke['status'] = FALSE;
          	$invoke['errors'] = $errors;
            $this->output->set_content_type('application/json')->set_output(json_encode($invoke));
          }else{
          	$password  = hash('sha256', $this->input->post('input_password'));
          	$username  =  html_escape($this->input->post('input_username'));
            $result=$this->m_data->get_it(['username' => $username,'password' => $password]);
            
						if (empty($result)) {
              $result=$this->m_data->get_it(['email' => $username,'password' => $password]);
            }

            if (empty($result)) {
	           $invoke['login_failed'] = TRUE;
	          }else{
              $_SESSION['KCFINDER']['disabled']  = false;
              $_SESSION['KCFINDER']['uploadURL'] = PUBLIC_URL;
              $_SESSION['KCFINDER']['uploadDir'] = PUBLIC_DIR;              
							$mysession = array(
								'is_login'       => 'logged',
								'ses_id'         => $result->id,
								'ses_name'       => $result->name,
								'ses_username'   => $result->username,
								'ses_level' 	   => $result->level,
							);
							$this->session->set_userdata($mysession);	          	
	          }
            // debugme($result);

            $invoke['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($invoke));
          }
      }else{
          $invoke['status'] = FALSE;
          $this->output->set_content_type('application/json')->set_output(json_encode($output));
      }
  }  

  function validation_language(){
      $this->form_validation->set_message('max_length',   'Karakter terlalu panjang, maksimal {param} karakter');
      $this->form_validation->set_message('min_length',   'Karakter terlalu pendek, minimal {param} karakter');
      $this->form_validation->set_message('valid_email',  'Email tidak valid');
      $this->form_validation->set_message('required',     '{field} tidak boleh kosong');
      $this->form_validation->set_message('is_unique',    '{field} sudah terdaftar,gunakan nama lain');
      $this->form_validation->set_message('numeric',      '{field} harus angka');
      $this->form_validation->set_message('alpha_dash',   '{field} hanya boleh diisi angka, huruf, underscores, dan dashes.');
      $this->form_validation->set_message('alpha_numeric','{field} hanya boleh diisi angka dan huruf');

			$this->form_validation->set_error_delimiters('','');
  }
}