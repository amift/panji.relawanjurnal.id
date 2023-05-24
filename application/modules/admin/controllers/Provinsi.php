<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string']);
			$this->load->library(['form_validation']);

      $this->modul='admin';
      $this->class=strtolower(__CLASS__);
   
      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('Provinsi_model','m_data');
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

							$row[]  = $db_data->name;
							$row[]  = $db_data->iso;
							
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
	        $data = $this->m_data->get_it(['id'=>$id],'id, name, iso');        
	        echo json_encode($data);
	      }else{
	      	$output=['status' => 'false'];
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }      
	  }

		protected function stat_error(){
			$errors = array(
				'input_name'      =>  form_error('input_name'),
				'input_iso'     =>  form_error('input_iso'),
			);
			return $errors;
		}


    protected function data_post($mode){

    	$data = array(
				'name'  => html_escape($this->input->post('input_name')),
				'iso'  => html_escape($this->input->post('input_iso')),
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
 					 	$this->m_data->get_relation_data('user','provinsi_id',$id)
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
	        $this->form_validation->set_rules('input_name'  ,'Nama' ,'trim|max_length[200]|required');
	        $this->form_validation->set_rules('input_iso'  ,'ISO' ,'trim|max_length[5]|required');
		}  

}