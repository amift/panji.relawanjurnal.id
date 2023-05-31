<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string']);
			$this->load->library(['form_validation']);

      $this->modul='admin';
      $this->class=strtolower(__CLASS__);
   
      $this->loginCheck();
      $this->privilegeCheck($this->modul);
           
      $this->load->model('User_model','m_data');
      $this->load->model('Provinsi_model','m_provinsi');
    }

		public function index(){
			$invoke['arr_provinsi'] = $this->m_provinsi->get_data_as_array('-- Provinsi --');
			$invoke['arr_level'] = ['admin' => 'admin', 'user' => 'user', 'penilai' => 'penilai'];

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
						
							$is_verified = ($db_data->is_verified == 'yes')?'<i class="fa fa-check verified"></i>':'<i class="fa fa-times unverified"></i>';
							$is_active = ($db_data->is_active == 'yes')?'<i class="fa fa-check active"></i>':'<i class="fa fa-times inactive"></i>';

							if ($db_data->level == 'admin') {
								$level = '<span class="label label-warning">'.$db_data->level.'</span>';
							}elseif($db_data->level == 'penilai'){
								$level = '<span class="label label-primary">'.$db_data->level.'</span>';
							}elseif($db_data->level == 'user'){
								$level = '<span class="label label-info">'.$db_data->level.'</span>';
							}else{
								$level = '<span class="label label-danger">Error</span>';
							}


							if ($this->is_related($db_data->id)) {
								$row[]   = '<div class="text-center">
												<a class ="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('.seal_it($db_data->id).')"><i class="fa fa-edit"></i> </a> 
												<a class="btn btn-xs btn-default disabled" href="javascript:void(0)" title="Relational Data" ><i class="fa fa-trash"></i> </a>
											</div>';
							}else{
								$row[]   = '<div class="text-center">
												<a class ="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('.seal_it($db_data->id).')"><i class="fa fa-edit"></i> </a> 
												<a class ="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="del('.seal_it($db_data->id).')"><i class="fa fa-trash"></i> </a>
											</div>';
							}


							$row[]   = '<div>
															<b>Username : </b>'.$db_data->username.'<br>
															<b>Nama : </b>'.$db_data->name.'<br>
															<b>Level : </b>'.$level.'<br>
												  </div>';
							$row[]   = '<div>
															<b>Telepon : </b>'.$db_data->telepon.'<br>
															<b>Email : </b>'.$db_data->email.'<br>
												  </div>';
							$row[]  = $db_data->institusi;
							$row[]  = $db_data->provinsi_nama;
							$row[]   = '<div>
															<b>Verified : </b>'.$is_verified.'<br>
															<b>Active : </b>'.$is_active.'<br>
															<b>Last Login : </b>'.$db_data->last_login.'<br>
												  </div>';
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
	        $data = $this->m_data->get_it(['id'=>$id], 'id, username, name, email, institusi, level, provinsi_id');        
	        echo json_encode($data);
	      }else{
	      	$output=['status' => 'false'];
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }      
	  }

		protected function stat_error(){
			$errors = array(
				'input_username'     =>  form_error('input_username'),
				'input_name'         =>  form_error('input_name'),
				'input_email'        =>  form_error('input_email'),
				'input_institusi'    =>  form_error('input_institusi'),				
				'input_provinsi_id'  =>  form_error('input_provinsi_id'),
				'input_level'    =>  form_error('input_level'),				
			);
			return $errors;
		}


    protected function data_post($mode){

    	$data = array(
				'username'     => html_escape($this->input->post('input_username')),
				'name'         => html_escape($this->input->post('input_name')),
				'email'        => html_escape($this->input->post('input_email')),
				'institusi'    => html_escape($this->input->post('input_institusi')),
				'provinsi_id'  => html_escape($this->input->post('input_provinsi_id')),
				'level'    => html_escape($this->input->post('input_level')),
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
 					 	$this->m_data->get_relation_data('jurnal','user_id',$id)
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
	        $this->form_validation->set_rules('input_username'  ,'Username' ,'trim|max_length[50]|required');
	        $this->form_validation->set_rules('input_name'  ,'Nama' ,'trim|max_length[150]|required');
	        $this->form_validation->set_rules('input_email'  ,'Email' ,'trim|valid_email|max_length[255]|required');
	        $this->form_validation->set_rules('input_provinsi_id'  ,'Provinsi' ,'trim|max_length[3]|required');
	        $this->form_validation->set_rules('input_level'  ,'Level' ,'trim|max_length[10]|required');
		}  

}