<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends MY_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string']);
			$this->load->library(['form_validation']);

      $this->modul='admin';
      $this->class=strtolower(__CLASS__);
   
      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('Review_model','m_reviewer');      
    }

		public function index(){
			$invoke['reviewer'] = $this->m_reviewer->get_info();

			$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
			$invoke['jsfile']       = 'index_js.php';
			$this->load->view('__'.$this->class.'/index', $invoke);			
		}

		public function get_info(){
			  $reviewer = $this->m_reviewer->get_info();
        $no=1;
        foreach ($reviewer as $key) {
          echo '<tr>';
          echo ' <td>'.$no++.'</td>';
          echo ' <td style="width:370px">'.$key->user_name.'<br>'.$key->provinsi_nama.'</td>';
          echo ' <td class="text-center">'.$key->all_jurnal.'</td>';
          echo ' <td class="text-center">
									<a href="#" style="width:30px" class="infoDone btn btn-primary btn-xs" data-user_id="'.$key->user_id.'">
	                  '.$key->j_done.'
	                </a>
          		   </td>';
					echo ' <td class="text-center">
									<a href="#" style="width:30px" class="infoNotYet btn btn-danger btn-xs" data-user_id="'.$key->user_id.'">
	                  '.$key->j_notyet.'
	                </a>
          		   </td>';
          echo '</tr>';
        }
		}

		public function retrieve_info_done($id){
			$jurnal = $this->m_reviewer->get_info_done($id);
			if ( empty($jurnal) ) {
        echo '<br>';
        echo '<div class="alert alert-info">';
        echo '   <strong>Informasi!</strong> Tidak ada jurnal yang dinilai';
        echo '</div>';
			}else{				
				echo '<table class="table table-striped table-hover">';
				echo '	<thead>';
				echo '		<tr>';
				echo '		<th>No</th>';
				echo '		<th>Jurnal</th>';
				echo '		</tr>';
				echo '	</thead>';
				echo '		<tbody>';
        $no=1;
        foreach ($jurnal as $key) {
          echo '<tr>';
          echo ' <td>'.$no++.'</td>';
          echo ' <td><a href="'.$key->url.'" target="_blank">'.$key->nama.'</a><br>'.$key->provinsi_nama.'</td>';
          echo '</tr>';
        }
				echo '		</tbody>';
				echo '</table>';
			}	
		}

		public function retrieve_info_notyet($id){
			$jurnal = $this->m_reviewer->get_info_notyet($id);
			$reviewer = $this->m_reviewer->get_reviewer($id);
			$person = '';
			$x=0;
			foreach ($reviewer as $key) {
					$x++;
					if ( $x % 4 == 0 ){
						$person .= '<a href="#" id="assigment'.$id.$key->id.'999" style="border:1px solid blue" class="assigment btn btn-default btn-xs" 
													data-requires="'.$id.';'.$key->id.';999'.'">'.$key->name.'
												</a><br>';
					}else{
						$person .= '<a href="#" id="assigment'.$id.$key->id.'999" style="border:1px solid blue" class="assigment btn btn-default btn-xs" 
													data-requires="'.$id.';'.$key->id.';999'.'">'.$key->name.'
												</a> ';
					}
			}
			if ( empty($jurnal) ) {
        echo '<br>';
        echo '<div class="alert alert-danger">';
        echo '   <strong>Informasi!</strong> Semua jurnal telah dinilai';
        echo '</div>';
			}else{				
				echo '<table class="table table-striped table-hover">';
				echo '	<thead>';
				echo '		<tr>';
				echo '		<th>No</th>';
				echo '		<th>Jurnal</th>';
				echo '		</tr>';
				echo '	</thead>';
				echo '		<tbody>';
        $no=1;
        foreach ($jurnal as $key) {
        	$new_assign=str_replace('999', $key->id, $person);
          echo '<tr>';
          echo ' <td>'.$no++.'</td>';
          echo ' <td>
          				<a href="'.$key->url.'" target="_blank">'.$key->nama.'</a><br>'.$key->provinsi_nama.
          		 '  <br><br>Reassignment jurnal review from <div style="border:1px solid red" class="btn btn-default btn-xs disabled">'.$key->user_nama.'</div> to <br>'.$new_assign.
          		 '</td>';
          echo '</tr>';
        }
				echo '		</tbody>';
				echo '</table>';
			}	
		}

		public function reassigment(){
			$idfrom = $this->input->post('idfrom');
			$idto = $this->input->post('idto');
			$idjurnal = $this->input->post('idjurnal');
			$this->m_reviewer->do_reassigment($idfrom, $idto, $idjurnal);
		}
}