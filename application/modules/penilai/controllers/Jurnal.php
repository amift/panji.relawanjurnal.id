<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string']);
			$this->load->library(['form_validation','mfcrypt']);

      $this->modul='penilai';
      $this->class=strtolower(__CLASS__);
   
      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('Jurnal_model','m_data');

      $this->load->model('Penilaian_model','m_penilaian');
      $this->load->model('Penilaian_logs_model','m_plogs');
      $this->load->model('Lisensi_model','m_lisensi');
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
						$list = $this->m_data->get_datatables('user_id='.$this->session->userdata('ses_id'));
						// debugme($this->db->last_query());
						$data = array();
						foreach ($list as $db_data) {
							$row     = array();
							$row[]   = '';

							$url        = ($db_data->url)?'<a target="_blank" href="'.$db_data->url.'"><i class="fa fa-globe"></i> URL Jurnal</a>':'URL Jurnal [kosong]';
							$url_editor = ($db_data->url_editor)?'<a target="_blank" href="'.$db_data->url_editor.'"><i class="fa fa-globe"></i> URL Editor</a>':'URL Editor [kosong]';
							$kontak     = ($db_data->kontak)?'<a target="_blank" href="'.$db_data->kontak.'"><i class="fa fa-globe"></i> URL Kontak</a>':'URL Kontak [kosong]';
							$reviewer   = ($db_data->reviewer)?'<a target="_blank" href="'.$db_data->reviewer.'"><i class="fa fa-globe"></i> URL Reviewer</a>':'URL Reviewer [kosong]';
							$statistik  = ($db_data->statistik)?'<a target="_blank" href="'.$db_data->statistik.'"><i class="fa fa-globe"></i> URL Statistik</a>':'URL Statistik [kosong]';
							$etika      = ($db_data->etika)?'<a target="_blank" href="'.$db_data->etika.'"><i class="fa fa-globe"></i> URL Etika Publikasi</a>':'URL Etika Publikasi [kosong]';
							$indeksasi  = ($db_data->indeksasi)?'<a target="_blank" href="'.$db_data->indeksasi.'"><i class="fa fa-globe"></i> URL Indeksasi</a>':'URL Indeksasi [kosong]';
							$oai        = ($db_data->oai)?'<a target="_blank" href="'.$db_data->oai.'"><i class="fa fa-globe"></i> URL oai</a>':'URL oai [kosong]';
							$doi        = ($db_data->doi)?'<a target="_blank" href="'.$db_data->doi.'"><i class="fa fa-globe"></i> URL Doi</a>':'URL Doi [kosong]';

							$secure_id = $this->mfcrypt->encrypt($db_data->id);
							$penilaian = $this->m_plogs->get_rows(['jurnal_id' => $db_data->id]);


							$row[]   = '<div class="text-center">
														<a href="'.base_url('penilai/jurnal/nilai/').$secure_id.'" class="btn btn-app">
														   <span class="badge bg-green">'.$penilaian.'</span>
														   <i class="fa fa-calendar-check-o"></i> Penilaian
														</a>														
													</div>';


							$row[]   = '<div class="text-center">
														  <img id="foto" width="120" class="img-responsive center-block rounded-circle img-thumbnail shadow" src="'.IMG_URL.$db_data->user_foto.'" alt=""><br>
														  '.$db_data->user_nama.'
												  </div>';
							$row[]   = '<div>
															<b>Nama editor : </b>'.$db_data->nama_editor.'<br>
															<b>Telepon editor : </b>'.$db_data->telepon_editor.'<br>
															<b>Email editor : </b>'.$db_data->email_editor.'<br>
															<hr>
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
				$invoke['jurnal']       = $this->m_data->get_data(['id' => $valid_id]);
				$invoke['penilaian']    = $this->m_penilaian->get_data(['id' => $valid_id]);

				$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
				$invoke['jsfile']       = 'nilai_js.php';
				$this->load->view('__'.$this->class.'/nilai', $invoke);						
	  }

	  public function process(){	  	
	      if ($this->input->is_ajax_request()){
	      	$valid_id = $this->mfcrypt->decrypt($this->input->post('input_id'));
		    	$jurnal_id = html_escape($valid_id);

		    	$data_penilaian = array(		    								
						'relevansi' => html_escape($this->input->post('input_relevansi')),
						'kualitas' => html_escape($this->input->post('input_kualitas')),
						'editorial' => html_escape($this->input->post('input_editorial')),
						'pengeditan' => html_escape($this->input->post('input_pengeditan')),
						'peer_review' => html_escape($this->input->post('input_peer_review')),
						'tata_kelola_jurnal' => html_escape($this->input->post('input_tata_kelola_jurnal')),
						'diver_penulis' => html_escape($this->input->post('input_diver_penulis')),
						'diver_dewan_redaksi' => html_escape($this->input->post('input_diver_dewan_redaksi')),
						'sitasi' => html_escape($this->input->post('input_sitasi')),
						'inovasi' => html_escape($this->input->post('input_inovasi')),
						'catatan' => html_escape($this->input->post('input_catatan')),
		    	);
					$this->m_penilaian->update($data_penilaian,['jurnal_id' => $jurnal_id]);

		    	$json_data_penilaian=json_encode($data_penilaian);		    	
		    	$this->m_plogs->insert([
		    											'jurnal_id' => $jurnal_id,
		    											'user_id' => $this->session->userdata('ses_id'),
		    											'data_penilaian' => $json_data_penilaian
		    										]);

		    	$this->m_data->update(['status' => '1'],['id' => $jurnal_id]);

	      	$output['status'] = true;
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));		    	
	      }else{
	      	$output['status'] = false;
	      	$output['message'] = 'bad request method';
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }      
	  }

	  public function update_sitasi($id){
				if ($this->input->is_ajax_request()) {      
					$valid_id = $this->mfcrypt->decrypt($id);
	        $data_jurnal = $this->m_data->get_it(['id' => $valid_id ]);	  		
	        if (empty($data_jurnal)){
		      	$output['status']   = false;
		      	$output['message']  = 'data tidak valid';
	        }else{
	        	$jumlah_sitasi = html_escape($this->input->post('j_sitasi'));
	        	if (is_numeric($jumlah_sitasi)){
	        		$this->m_data->update(['sitasi' => $jumlah_sitasi], ['id' => $valid_id] );
							$output['status'] = true;
							$output['jumlah_sitasi'] = $jumlah_sitasi;
	        	}else{
			      	$output['status'] = false;
			      	$output['message']= 'Harus diisi dengan angka';
	        	}
	        }
			    $this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }else{
	      	$output['status'] = false;
	      	$output['message'] = 'bad request method';	      	
	      	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	      }	  	
	  }

}