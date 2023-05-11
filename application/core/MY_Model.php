<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* class       = MY_MODEL
* by          = miftahul (a.k.a) amift 
* email       = miftahul81@gmail.com
* year        = 2018
*
*/
class MY_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    // DATA TABLE - BEGIN
      public function get_datatables(){
          if($_POST['length'] != -1){
            $length = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
            $sql_limit =' LIMIT '.$start.','.$length;
          }
          $sql = $this->_get_datatables_query().$sql_limit;
          $query = $this->db->query($sql);
          return $query->result();
      }
      
      public function count_filtered(){
          $sql = $this->_get_datatables_query();
          $query = $this->db->query($sql);
          return $query->num_rows();
      }

      public function count_all(){
                $query_result = $this->db->query($this->query_data());
          return $query_result->num_rows();
      }

      public function _get_datatables_query(){
          $sql_search =$this->query_data().' ';
          $i = 0;      
          foreach ($this->column_search as $item){
              if($_POST['search']['value']){
                    $search = htmlspecialchars($_POST['search']['value']);
                  if($i===0){
                        $sql_search .='WHERE (';
                        $sql_search .=$item.' LIKE \'%'.$search.'%\' ';
                  }else{
                        $sql_search .='OR '.$item.' LIKE \'%'.$search.'%\' ';
                  }
                  if(count($this->column_search) - 1 == $i){
                    $sql_search .=') ';
                  }
              }
              $i++;
          }

          if(isset($_POST['order'])){
                $sql_order = 'ORDER BY '.$this->column_order[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'];
          }elseif(isset($this->order)){
              $order = $this->order;
                $sql_order = 'ORDER BY '.key($order).' '.$order[key($order)];
          }
          return $sql_search.$sql_order;
      }
    // DATA TABLE - END

    public function get_it($keyword=null,$field=null, $is_all=false){
        if ($keyword!=null) {
            $this->db->where($keyword);
        }
        if ($field!=null) {
            $this->db->select($field);
        }
        $this->db->from($this->table);
        $query = $this->db->get();

        if ($is_all==true) {
            return $query->result();
        }else{
            return $query->row();
        }
    }   

    public function get_rows($keyword=null){
        if ($keyword!=null) {
            $this->db->where($keyword);
        }
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function is_present($keyword){
        $this->db->from($this->table);
        $this->db->where($keyword);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return true;
        }else{
          return false;
        }
    }

    public function get_data_as_simple_array($keyword=null){

        if ($keyword!=null) {
            $this->db->where($keyword);
        }
        $this->db->from($this->table);
        $result = $this->db->get()->result();
        $options = array();
        foreach($result as $key){
            $options[] = $key->name;
        }
        return $options;
    }

    public function get_data_as_array($opt=null, $field=null, $keyword=null){

        if ($field!=null) {
            $this->db->select($field);
        }

        if ($keyword!=null) {
            $this->db->where($keyword);
        }

        $this->db->from($this->table);
        $result = $this->db->get()->result();

        $options = array();
        if ($opt!=null){
            $options[''] = $opt;
        }
        foreach($result as $key){
            if ($this->config->item('site_secure_id')==true) {
                $options[$this->mfcrypt->secureit($key->id)] = $key->name;
            }else{
                $options[$key->id] = $key->name;
            }            
        }
        return $options;
    }

    // MAIN DB PROCESS
    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data, $where){
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function delete_by_keyword($keyword){
        $this->db->where($keyword);
        $this->db->delete($this->table);
    }

    public function get_relation_data($table,$field,$id){
        $relation=false;
        $rows=$this->db->get_where($table, array($field => $id))->num_rows();
        if ($rows>0) {
            $relation=true;
        }
        return $relation;
    }
} 

