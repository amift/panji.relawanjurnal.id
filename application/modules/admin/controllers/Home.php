<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent::__construct();
      $this->modul='admin';
      $this->class=strtolower(__CLASS__);

      $this->loginCheck();
      $this->privilegeCheck($this->modul);

      $this->load->model('user_model','m_data'); 
      $this->load->model('jurnal_model','m_jurnal');
    }

	public function index(){

		$invoke['jurnal']     =  $this->m_jurnal->get_rows();
		$invoke['jurnal_dinilai']     =  $this->m_jurnal->get_rows(['status' => '1']);
		$invoke['penilai']    =  $this->m_data->get_rows(['level' => 'penilai']);
		$invoke['pengusul']     =  $this->m_data->get_rows(['level' => 'user']);

		$invoke['stat_pengusul']     =  $this->m_data->get_stat_of_pengusul();		

		$invoke['baseurl']      = base_url($this->modul.'/'.$this->class);
		$invoke['jsfile']       = 'index_js.php';

		$this->load->view('__home/index', $invoke);
	}

	public function detail($id){
		$result = $this->m_data->get_detail_jurnal_by_pengusul($id);
		echo '<div class="panel panel-info">';
		echo '	<div class="panel-body">';
		$no=1;
		foreach ($result as $key) {
			$jurnal = explode("|", $key->jurnal);
			echo $no++.'. '.$key->name.' <span class="pull-right"> '.$key->jumlah.' Jurnal </span> <br>';
			if( $key->jumlah > 0) {
			    echo '<ul style="padding-left:25px;">';
			    echo '<li>' . implode( '</li><li>', $jurnal) . '</li>';
			    echo '</ul>';
			}
			echo '<hr>';
		}
		echo '	</div>';
		echo '</div>';
	}
}