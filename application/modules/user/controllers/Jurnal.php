<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string']);
			$this->load->library(['form_validation']);

      $this->modul='user';
      $this->class=strtolower(__CLASS__);
   
      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('Jurnal_model','m_data');


			$this->load->model('Penilaian_model','m_penilaian');
      $this->load->model('Penilaian_logs_model','m_plogs');
      $this->load->model('Lisensi_model','m_lisensi');
      $this->load->model('Penilaian_model','m_penilaian');    
      $this->load->model('Frekterbitan_model','m_frekterbitan');
      $this->load->model('Waktureview_model','m_waktureview');
      $this->load->model('Provinsi_model','m_provinsi');
    }

		public function index(){			
			$invoke['arr_lisensi']       = $this->m_lisensi->get_data_as_array('-- Lisensi --','id, nama as name');
			$invoke['arr_frek_terbitan'] = $this->m_frekterbitan->get_data_as_array('-- Frekuensi Terbitan --','id, nama as name');
			$invoke['arr_waktu_review']  = $this->m_waktureview->get_data_as_array('-- Waktu Review --','id, nama as name');
			$invoke['arr_provinsi']      = $this->m_provinsi->get_data_as_array('-- Provinsi --','id, name');
			$invoke['arr_akre_sinta']    = ['' => '-- SINTA --','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','0'=>'TIDAK ADA'];
			

			$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
			$invoke['jsfile']       = 'index_js.php';
			$this->load->view('__'.$this->class.'/index', $invoke);
		}

		public function list(){
	      if ($this->input->is_ajax_request()) {
	      	  $this->m_data->owner = 'user_id = '.$this->session->userdata('ses_id');

						$list = $this->m_data->get_datatables();						
						$data = array();
						foreach ($list as $db_data) {
							$row     = array();
							$row[]   = '';

							$url        = ($db_data->url)?'<a target="_blank" href="'.$db_data->url.'"><i class="fa fa-globe"></i> URL Jurnal</a>':'URL Jurnal [kosong]';
							$url_editor = ($db_data->url_editor)?'<a target="_blank" href="'.$db_data->url_editor.'"><i class="fa fa-globe"></i> URL Editor</a>':'URL Editor [kosong]';
							$kontak     = ($db_data->kontak)?'<a target="_blank" href="'.$db_data->kontak.'"><i class="fa fa-globe"></i> URL Kontak</a>':'URL Kontak [kosong]';
							$reviewer   = ($db_data->reviewer)?'<a target="_blank" href="'.$db_data->reviewer.'"><i class="fa fa-globe"></i> URL Reviewer</a>':'URL Reviewer [kosong]';
							$statistik  = ($db_data->statistik)?'<a target="_blank" href="'.$db_data->statistik.'"><i class="fa fa-globe"></i> URL Statistik</a>':'URL Statistik [kosong]';
							$etika      = ($db_data->etika)?'<a target="_blank" href="'.$db_data->etika.'"><i class="fa fa-globe"></i> URL Etika</a>':'URL Etika [kosong]';
							$indeksasi  = ($db_data->indeksasi)?'<a target="_blank" href="'.$db_data->indeksasi.'"><i class="fa fa-globe"></i> URL Indeksasi</a>':'URL Indeksasi [kosong]';
							$oai        = ($db_data->oai)?'<a target="_blank" href="'.$db_data->oai.'"><i class="fa fa-globe"></i> URL oai</a>':'URL oai [kosong]';
							$doi        = ($db_data->doi)?'<a target="_blank" href="'.$db_data->doi.'"><i class="fa fa-globe"></i> URL Doi</a>':'URL Doi [kosong]';

							$secure_id = $this->mfcrypt->encrypt($db_data->id);
							$penilaian = $this->m_plogs->get_rows(['jurnal_id' => $db_data->id]);

							if ($db_data->status==1) {
								$row[]   = '<div class="text-center">
																					<div class="text-center">
																						<a href="'.base_url('user/jurnal/nilai/').$secure_id.'" class="btn btn-app">
																						   <span class="badge bg-green">'.$penilaian.'</span>
																						   <i class="fa fa-eye"></i> Lihat Penilaian
																						</a>												
																			</div>';
							}else{

								$row[]   = '<div class="text-center">
																	<a class ="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('.seal_it($db_data->id).')"><i class="fa fa-edit"></i> </a> 
																	<a class ="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="del('.seal_it($db_data->id).')"><i class="fa fa-trash"></i> </a>
													  </div>';
							}



							$row[]   = '<div>
														  <b>Nama Jurnal : </b>'.$db_data->nama.'<br>
														  <b>E-ISSN : </b>'.$db_data->eissn.'<br>
														  <b>P-ISSN : </b>'.$db_data->pissn.'<br>
														  <b>Penerbit : </b>'.$db_data->penerbit.'<br>
														  <b>Provinsi : </b>'.$db_data->provinsi_nama.'<br>
														  <b>Lisensi : </b>'.$db_data->lisensi_nama.'<br>
														  <b>Tahun Terbit : </b>'.$db_data->tahun_terbit.'<br>
														  <b>Frek. terbitan : </b>'.$db_data->frek_terbitan_nama.'<br>
														  <b>Waktu review : </b>'.$db_data->waktu_review_nama.'<br>
														  <b>Akreditasi SINTA : </b>'.$db_data->akre_sinta.'<br>
														  <b>Sitasi Artikel : </b>'.$db_data->sitasi.'<br>
												  </div>';
							$row[]   = '<div>
															<b>Nama editor : </b>'.$db_data->nama_editor.'<br>
															<b>Telepon_editor : </b>'.$db_data->telepon_editor.'<br>
															<b>Email editor : </b>'.$db_data->email_editor.'<br>
												  </div>';
							$row[]   = '<div>
															'.$url.'<br>
															'.$url_editor.'<br>
															'.$kontak.' <br>
															'.$reviewer.'<br>
															'.$statistik.'<br>
															'.$etika.'<br>
															'.$indeksasi.'<br>
															'.$oai.'<br>
															'.$doi.'<br>
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
	        $data = $this->m_data->get_it(['id'=>$id],'id, nama, eissn, pissn, penerbit, provinsi_id, tahun_terbit, akre_sinta, lisensi_id, frek_terbitan_id, waktu_review_id, nama_editor, telepon_editor, email_editor, url, url_editor, kontak, reviewer, etika, statistik, indeksasi, oai, doi, sitasi');
	        echo json_encode($data);
	      }else{
	      	$output=['status' => 'false'];
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }      
	  }

		protected function stat_error(){
			$errors = array(
				'input_nama'	            => form_error('input_nama'),
				'input_eissn'	            => form_error('input_eissn'),
				'input_pissn'	            => form_error('input_pissn'),
				'input_penerbit'	        => form_error('input_penerbit'),
				'input_provinsi_id'	      => form_error('input_provinsi_id'),
				'input_tahun_terbit'	    => form_error('input_tahun_terbit'),
				'input_akre_sinta'	      => form_error('input_akre_sinta'),
				'input_lisensi_id'	      => form_error('input_lisensi_id'),
				'input_frek_terbitan_id'	=> form_error('input_frek_terbitan_id'),
				'input_waktu_review_id'	  => form_error('input_waktu_review_id'),
				'input_sitasi'	      		=> form_error('input_sitasi'),
				'input_nama_editor'	      => form_error('input_nama_editor'),
				'input_telepon_editor'	  => form_error('input_telepon_editor'),
				'input_email_editor'	    => form_error('input_email_editor'),
				'input_url'	              => form_error('input_url'),
				'input_url_editor'	      => form_error('input_url_editor'),
				'input_kontak'	          => form_error('input_kontak'),
				'input_reviewer'	        => form_error('input_reviewer'),
				'input_etika'	            => form_error('input_etika'),
				'input_statistik'	        => form_error('input_statistik'),
				'input_indeksasi'	        => form_error('input_indeksasi'),
				'input_oai'	              => form_error('input_oai'),
				'input_doi'	              => form_error('input_doi'),				
			);
			return $errors;
		}


    protected function data_post($mode){

    	$data = array(
    		'user_id'          => $this->session->userdata('ses_id'),
				'nama'             => html_escape($this->input->post('input_nama')),
				'eissn'            => html_escape($this->input->post('input_eissn')),
				'pissn'            => html_escape($this->input->post('input_pissn')),
				'penerbit'         => html_escape($this->input->post('input_penerbit')),
				'provinsi_id'      => html_escape($this->input->post('input_provinsi_id')),
				'tahun_terbit'     => html_escape($this->input->post('input_tahun_terbit')),
				'akre_sinta'	     => html_escape($this->input->post('input_akre_sinta')),
				'lisensi_id'       => html_escape($this->input->post('input_lisensi_id')),
				'frek_terbitan_id' => html_escape($this->input->post('input_frek_terbitan_id')),
				'waktu_review_id'  => html_escape($this->input->post('input_waktu_review_id')),
				'sitasi'  				 => html_escape($this->input->post('input_sitasi')),				
				'nama_editor'      => html_escape($this->input->post('input_nama_editor')),
				'telepon_editor'   => html_escape($this->input->post('input_telepon_editor')),
				'email_editor'     => html_escape($this->input->post('input_email_editor')),
				'url'              => html_escape($this->input->post('input_url')),
				'url_editor'       => html_escape($this->input->post('input_url_editor')),
				'kontak'           => html_escape($this->input->post('input_kontak')),
				'reviewer'         => html_escape($this->input->post('input_reviewer')),
				'etika'            => html_escape($this->input->post('input_etika')),
				'statistik'        => html_escape($this->input->post('input_statistik')),
				'indeksasi'        => html_escape($this->input->post('input_indeksasi')),
				'oai'              => html_escape($this->input->post('input_oai')),
				'doi'              => html_escape($this->input->post('input_doi')),
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

    protected function after_add($callback_id){
    	$this->m_penilaian->insert(['jurnal_id' => $callback_id]);
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
				$this->form_validation->set_rules('input_lisensi_id',	        'Lisensi',          'trim|max_length[11]|required');
				$this->form_validation->set_rules('input_frek_terbitan_id',	  'Frek Terbitan',    'trim|max_length[11]|required');
				$this->form_validation->set_rules('input_waktu_review_id',	  'Waktu Review',     'trim|max_length[11]|required');
				$this->form_validation->set_rules('input_provinsi_id',	      'Provinsi',         'trim|max_length[11]|required');
				$this->form_validation->set_rules('input_nama',	              'nama',             'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_eissn',	            'eissn',            'trim|max_length[20]');
				$this->form_validation->set_rules('input_pissn',	            'pissn',            'trim|max_length[20]');
				$this->form_validation->set_rules('input_penerbit',	          'penerbit',         'trim|max_length[200]|required');
				$this->form_validation->set_rules('input_tahun_terbit',	      'tahun_terbit',     'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_akre_sinta',	        'akreditasi sinta', 'trim|max_length[2]');
				$this->form_validation->set_rules('input_sitasi',	      			'sitasi',      			'trim|max_length[15]|required');
				$this->form_validation->set_rules('input_nama_editor',	      'nama_editor',      'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_telepon_editor',	    'telepon_editor',   'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_email_editor',	      'email_editor',     'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_url_editor',	        'url_editor',       'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_url',	              'URL Jurnal',       'trim|max_length[255]|required');
				$this->form_validation->set_rules('input_kontak',	            'URL kontak',       'trim|max_length[255]');
				$this->form_validation->set_rules('input_reviewer',	          'URL reviewer',     'trim|max_length[255]');
				$this->form_validation->set_rules('input_statistik',	        'URL statistik',    'trim|max_length[255]');
				$this->form_validation->set_rules('input_etika',	            'URL etika',        'trim|max_length[255]');
				$this->form_validation->set_rules('input_indeksasi',	        'URL Indeksasi',    'trim|max_length[255]');
				$this->form_validation->set_rules('input_oai',	              'URL oai',          'trim|max_length[255]');
				$this->form_validation->set_rules('input_doi',	              'URL doi',          'trim|max_length[255]');
		}  

		// ADD here additional process

	  public function nilai($id){
				$valid_id = $this->mfcrypt->decrypt($id);

				$invoke['arr_grade']    = ['Belum dinilai' => 'Belum dinilai',
																		'Sangat Baik' => 'Sangat Baik',
																		'Baik' => 'Baik',
																		'Cukup' => 'Cukup',
																		'Kurang' => 'Kurang'
																	 ];
				$invoke['arr_nilai']    = ['Belum dinilai' => 'Belum dinilai',
																		'1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'];
				$invoke['arr_sitasi']    = ['Belum dinilai' => 'Belum dinilai',
																		'Ada' => 'Ada',
																		'Tidak ada' => 'Tidak ada',
																		'Tidak tahu' => 'Tidak tahu'
																	 ];

				$invoke['jurnal_id']    = $id;
				$invoke['jurnal']       	= $this->m_data->get_data(['id' => $valid_id]);
				$invoke['penilaian']    	= $this->m_penilaian->get_data(['id' => $valid_id]);
				$invoke['penilaian_logs'] = $this->m_plogs->get_data(['jurnal_id' => $valid_id], true);

				$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
				$invoke['jsfile']       = 'nilai_js.php';
				$this->load->view('__'.$this->class.'/nilai', $invoke);						
	  }		

}