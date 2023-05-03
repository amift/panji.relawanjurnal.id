<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailsetting extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string']);
			$this->load->library(['form_validation']);

      $this->modul='admin';
      $this->class=strtolower(__CLASS__);
   
      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('EmailSetting_model','m_data');
    }

		public function index(){
			$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
			$invoke['jsfile']       = 'index_js.php';

			$this->load->view('__'.$this->class.'/index', $invoke);
		}

		public function list(){
	      if ($this->input->is_ajax_request()) {
						$list = $this->m_data->get_datatables();
						$data = array();
						foreach ($list as $db_data) {
							$row     = array();
							$row[]   = '';

							$row[]   = '<div class="text-center" style="width:90px">
																<a class ="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('.seal_it($db_data->id).')"><i class="fa fa-edit"></i> </a> 
																<a class ="btn btn-sm btn-info" href="javascript:void(0)" title="Set as Default" onclick="set_default('.seal_it($db_data->id).')"><i class="fa fa-check"></i> </a>
												  </div>';

							$row[]  = $db_data->description;
							$row[]   = '<div>'
													 .$db_data->host.':'.$db_data->port.
												 '</div>';
							$row[]  = $db_data->smtp_secure;
							$row[]  = $db_data->smtp_debug;
							$row[]  = $db_data->smtp_auth;
							$row[]   = '<div>'
													.$db_data->username.' <br> '.$db_data->password.
												 '</div>';
							$row[]  = $db_data->sender_name;
							$row[]  = $db_data->active;
							
							$data[]  = $row;
						}
		        $output = array(
		                    "draw" => @$_POST['draw'],
		                    "recordsTotal" => $this->m_data->count_all(),
		                    "recordsFiltered" => $this->m_data->count_filtered(),
		                    "data" => $data,
								);
						echo json_encode($output);
	      }else{
	            $output=['status' => 'false'];
	            $this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }      		
		}

	  public function edit($id=null){
	      if ($this->input->is_ajax_request()) {      
	        $data = $this->m_data->get_it(['id'=>$id],'id, description, host, port, smtp_secure, smtp_debug, smtp_auth, username, password, sender_name, active');        
	        echo json_encode($data);
	      }else{
	      	$output=['status' => 'false'];
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }      
	  }

		protected function stat_error(){
			$errors = array(

				'input_description' => form_error('input_description'),
				'input_host'        => form_error('input_host'),
				'input_port'        => form_error('input_port'),
				'input_smtp_secure' => form_error('input_smtp_secure'),
				'input_smtp_debug'  => form_error('input_smtp_debug'),
				'input_smtp_auth'   => form_error('input_smtp_auth'),
				'input_username'    => form_error('input_username'),
				'input_password'    => form_error('input_password'),
				'input_sender_name' => form_error('input_sender_name'),
				'input_active'      => form_error('input_active'),

			);
			return $errors;
		}


    protected function data_post($mode){

    	$data = array(

				'description' => html_escape($this->input->post('input_description')),
				'host'        => html_escape($this->input->post('input_host')),
				'port'        => html_escape($this->input->post('input_port')),
				'smtp_secure' => html_escape($this->input->post('input_smtp_secure')),
				'smtp_debug'  => html_escape($this->input->post('input_smtp_debug')),
				'smtp_auth'   => html_escape($this->input->post('input_smtp_auth')),
				'username'    => html_escape($this->input->post('input_username')),
				'password'    => html_escape($this->input->post('input_password')),
				'sender_name' => html_escape($this->input->post('input_sender_name')),
				'active'      => html_escape($this->input->post('input_active')),

    	);
			if ($mode=='edit') {
			}else{
			}        
    	return $this->security->xss_clean($data);
    }

    protected function before_add(){
    	// add addtional data to core Controller
    	$data = array();
    	return $data;
    }

    protected function after_add($calback){
    }

    protected function is_related($id){
    	$decision=false;
 			$arr = array(
 					 	// $this->m_data->get_relation_data('provinsi','id',$id)
 					 );
    	foreach ($arr as $key => $value) {
    		$decision=$decision || $value;
    	}    	
    	return $decision;
    }    

		protected function validate($mode=null){
			$this->set_validation_language();
			$this->form_validation->set_error_delimiters('','');

			if ($mode=='edit') {
			}else{
			}	
	        $this->form_validation->set_rules('input_description'  ,'Description' ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_host'         ,'Host'        ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_port'         ,'Port'        ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_smtp_secure'  ,'Smtp Secure' ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_smtp_debug'   ,'Smtp Debug'  ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_smtp_auth'    ,'Smtp Auth'   ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_username'     ,'Username'    ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_password'     ,'Password'    ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_sender_name'  ,'Sender name' ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_active'       ,'Active'      ,'trim|max_length[200]|required');
		}  

	public function set_to_default($id){
      if ($this->input->is_ajax_request()) {
			 	$this->m_data->set_default($id);
	      $output=['status' => 'true'];
      }else{
          $output=['status' => 'false'];
      }	        		
	    $this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}