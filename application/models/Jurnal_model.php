<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends MY_Model {
    
    var $table  = 'jurnal';
    var $sql_view = '';    
    var $owner  = '';

    var $column_order  = array(NULL,NULL,'nama','user_foto', 'eissn', 'pissn', 'penerbit', 'akre_sinta', 'nama_editor', 'telepon_editor', 'email_editor', 'url_editor', 'tahun_terbit', 'provinsi_nama', 'url', 'kontak', 'reviewer', 'statistik', 'etika', 'oai', 'doi', 'sitasi'); 
    var $column_search = array('nama','user_foto', 'eissn', 'pissn', 'penerbit', 'akre_sinta', 'nama_editor', 'telepon_editor', 'email_editor', 'url_editor', 'tahun_terbit', 'provinsi_nama', 'url', 'kontak', 'reviewer', 'statistik', 'etika', 'oai', 'doi', 'sitasi'); 
    var $order         = array('id' => 'ASC');

	public function __construct(){
		parent::__construct();
    $this->load->database();

		$this->sql_view  = ' (SELECT j.id, 
										j.lisensi_id, 
											l.nama AS lisensi_nama, 
										j.frek_terbitan_id,
											ft.nama AS frek_terbitan_nama,
										j.waktu_review_id, 
											wr.nama AS waktu_review_nama,
										j.provinsi_id, 
											p.name AS provinsi_nama,
										j.nama, 
										j.user_id, 
											u.name AS user_nama,
											u.foto AS user_foto,
										j.url, 
										j.eissn, 
										j.pissn, 
										j.penerbit, 
										j.akre_sinta, 
										j.nama_editor, 
										j.telepon_editor, 
										j.email_editor, 
										j.url_editor, 
										j.tahun_terbit, 
										j.kontak, 
										j.reviewer, 
										j.statistik, 
										j.etika, 
										j.indeksasi, 
										j.oai, 
										j.doi,
										j.sitasi';
		$this->sql_view .= ' FROM jurnal j ';
		$this->sql_view .= ' LEFT JOIN user u ON u.id = j.user_id';
		$this->sql_view .= ' LEFT JOIN lisensi l ON l.id = j.lisensi_id';
		$this->sql_view .= ' LEFT JOIN frek_terbitan ft ON ft.id = j.frek_terbitan_id';
		$this->sql_view .= ' LEFT JOIN waktu_review wr ON wr.id = j.waktu_review_id';
		$this->sql_view .= ' LEFT JOIN provinsi p ON p.id = j.provinsi_id';
		if (!empty($this->owner)) {
			$this->sql_view .= ' WHERE '.$this->owner;
		}

		$this->sql_view .= ' ) AS sql_view';
	}

	public function query_data(){
		$sql  = ' SELECT id, user_id, user_nama,user_foto, lisensi_id, frek_terbitan_id, waktu_review_id, provinsi_id, lisensi_nama, frek_terbitan_nama, waktu_review_nama, provinsi_nama, nama, eissn, pissn, penerbit, akre_sinta, nama_editor, telepon_editor, email_editor, url_editor, tahun_terbit, url, kontak, reviewer, statistik, indeksasi, etika, oai, doi, sitasi';
		$sql .= ' FROM '.$this->sql_view;
		return $sql;
	}

	public function get_data($keyword=null, $field=null){
    if ($keyword!=null) {
        $this->db->where($keyword);
    }
    if ($field!=null) {
        $this->db->select($field);
    }
		$this->db->from($this->sql_view);
		$query = $this->db->get();
		return $query->row();
	}

}



// 'id','lisensi_id','frek_terbitan_id','waktu_review_id','nama','eissn','pissn','penerbit','open_akses','akre_sinta','nama_editor','telepon_editor','email_editor','url_editor','tahun_terbit','frek_terbit','provinsi','url','kontak','reviewer','statistik','etika','oai','doi'
// id,lisensi_id,frek_terbitan_id,waktu_review_id,nama,eissn,pissn,penerbit,akre_sinta,nama_editor,telepon_editor,email_editor,url_editor,tahun_terbit,frek_terbit,provinsi,url,kontak,reviewer,statistik,etika,oai,doi,