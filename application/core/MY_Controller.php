<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   class       = MY_CONTROLLER
*   by          = miftahul (a.k.a) amift
*   email       = amift.me@gmail.com
*/

class MY_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('EmailSetting_model','m_emailsettings');
        $this->load->model('User_model','gm_user');
        $this->load->library('Guzzle_PHP_HTTP');

        define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);

        define('DATA_URL',$this->config->item('base_url').'/assets/');
        define('DATA_DIR',FCPATH.'assets/');

        define('PUBLIC_URL',DATA_URL.'public/');
        define('PUBLIC_DIR',DATA_DIR.'public/');

        define('IMG_URL',DATA_URL.'images/');
        define('IMG_DIR',DATA_DIR.'images/');

        define('DOC_URL',DATA_URL.'document/');
        define('DOC_DIR',DATA_DIR.'document/');

        define('CAPTCHA_URL',DATA_URL.'captcha/');
        define('CAPTCHA_DIR',DATA_DIR.'captcha/');

        define('ASSETS_FONT_DIR',FCPATH.'assets/fonts/');
                
    }

    public function loginCheck(){
        // digunakan untuk multi device yang akan dilogout semuanya
        // $user=$this->gm_user->get_it(['id' => $this->session->userdata('ses_id')],false ,'session');
        // if (empty($user->session)) {
        //     redirect(base_url('logout'));
        // }        
        if ($this->session->userdata('is_login') != 'logged') {
            redirect(base_url('login'));
        }
    }

    function privilegeCheck($param){
        if($this->session->userdata('ses_level') != $param ) {
            redirect(base_url($this->session->userdata('ses_level')));
        }        
    }

    public function send_mail($mail_data=null){
        $EmailSettings=$this->m_emailsettings->get_it(['active' => 'yes']);
        $mail = $this->phpmailer_lib->load();
        try {
            $result='ok';
            $mail->IsSMTP();
            $mail->Host       = $EmailSettings->host;
            $mail->Port       = $EmailSettings->port;
            $mail->SMTPSecure = $EmailSettings->smtp_secure;
            $mail->SMTPDebug  = $EmailSettings->smtp_debug;
            $mail->SMTPAuth   = $EmailSettings->smtp_auth;
            $mail->Username   = $EmailSettings->username;
            $mail->Password   = $EmailSettings->password;
            $mail->Subject    = $mail_data['email_subject'];
            $mail->SetFrom($EmailSettings->username,$EmailSettings->sender_name);
            if ($this->config->item('site_dev_mode')==true) {                
                $mail->AddAddress($this->config->item('site_dev_received_email'));
            }else{
                $mail->AddAddress($mail_data['to_address']);
            }
            $mail->MsgHTML($mail_data['message']);
            if (isset($mail_data['attachment'])) {
                $mail->addAttachment($mail_data['attachment']);
            }
            $mail->Send();
        } catch (phpmailerException $e) {
            $result=$e->errorMessage();
        } catch (Exception $e) {
            $result=$e->getMessage();
        }
        return $result;
    }

    public function set_validation_language(){
        $this->form_validation->set_message('max_length',   'Karakter terlalu panjang, maksimal {param} karakter');
        $this->form_validation->set_message('min_length',   'Karakter terlalu pendek, minimal {param} karakter');
        $this->form_validation->set_message('valid_email',  'Email tidak valid');
        $this->form_validation->set_message('required',     '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique',    '{field} sudah terdaftar,gunakan nama lain');
        $this->form_validation->set_message('numeric',      '{field} harus angka');
        $this->form_validation->set_message('alpha_dash',   '{field} hanya boleh diisi angka, huruf, underscores, dan dashes.');
        $this->form_validation->set_message('alpha_numeric','{field} hanya boleh diisi angka dan huruf');
    }

    public function add(){
        if ($this->input->is_ajax_request()) {
            $this->validation_for = 'add';
            $data = array();
            $data['status'] = TRUE;

            $this->validate('add');

            if ($this->form_validation->run() == FALSE){
                $data = array(
                    'status'        => FALSE,
                    'errors'        => $this->stat_error(),
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }else{
                if (method_exists($this,'before_add')) {
                    $additional_data=$this->before_add();
                    $insert = array_merge($this->data_post('add'),$additional_data);
                }else{
                    $insert = $this->data_post('add');
                }
                $result=$this->m_data->insert($insert);
                if (method_exists($this,'after_add')) {
                    $this->after_add($result);
                }
                $data['status'] = TRUE;
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }else{
            $output=['Status' => 'false'];
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }

    public function update(){
        if ($this->input->is_ajax_request()) {
            $this->validation_for = 'update';
            $data = array();
            $data['status'] = TRUE;

            $this->validate('edit');

            if ($this->form_validation->run() == FALSE){
                $data = array(
                    'status'   => FALSE,
                    'errors'   => $this->stat_error(),
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }else{
                if ($this->config->item('site_secure_id')==true) {
                    $secure_id=$this->input->post('input_id');
                    $id=$this->mfcrypt->secureit($secure_id,'d');
                }else{
                    $id=$this->input->post('input_id');
                }
                $data_update = $this->data_post('edit');
                $this->m_data->update($data_update, array('id' => $id));
                $data['status'] = TRUE;
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        }else{
            $output=['Status' => 'false'];
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }

    public function delete($secure_id=null){
        if ($this->input->is_ajax_request()) {
            if ($this->config->item('site_secure_id')==true) {
                $id=$this->mfcrypt->secureit($secure_id,'d');
            }else{
                $id=$secure_id;
            }
            if ($this->is_related($id)) {
                $data['is_safe'] = FALSE;
            }else{
                $this->m_data->delete_by_id($id);
                $data['status'] = TRUE;
                $data['is_safe'] = TRUE;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{
            $output=['status' => 'false'];
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }

    public function check_captcha($input_captcha,$captcha_expiration){
        $expired_captcha = time() - $captcha_expiration; 
        $this->db->where('captcha_time < ', $expired_captcha)->delete('captcha');
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($input_captcha, $this->input->ip_address(), $expired_captcha);
        $query = $this->db->query($sql, $binds);
        return $query->row();
    }

    public function generate_captcha($captcha_expiration){
        $numb=mt_rand(1,2);
        $login_captcha_config = array(
                'font_path'     => ASSETS_FONT_DIR.'font0'.$numb.'.ttf',
                // 'font_path'     => ASSETS_FONT_DIR.'font01.ttf',
                'font_size'     => 18,
                'img_width'     => 160,
                'img_height'    => 35,
                'img_id'        => 'img_captcha',
                'expiration'    => 600,
                'word_length'   => 4,
                'pool'          => '1234567890',
                'expiration'    => $captcha_expiration,
                'img_path'      => CAPTCHA_DIR,
                'img_url'       => CAPTCHA_URL,
                'colors'        => array(
                                        'background' => array(238,238,238),
                                        // 'grid' => array(255,14,0),
                                        'grid' => array(238,238,238),
                                        'border' => array(238,238,238),
                                        'text' => array(0, 0, 0)
                                        )
        );

        $cap = create_captcha($login_captcha_config);
        $data = array(
            'captcha_time'  => $cap['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $cap['word']
        );

        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
        return $cap['image'];
    }    

    public function bulan_indo($param,$short=false){
      $data = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember','Error');
      if ( $param < 1 || $param > 12) {
        $param=13;
      }
      if ($short==true) {
        $result=left($data[$param-1],3);
      }else{
        $result=$data[$param-1];
      }
      return $result;
    }

    public function hari_indo($param){
        $eng = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
        $ind = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        $pos = array_search($param, $ind);
        $result=$ind[$pos];
        return $result;
    }

    public function gen_tanggal($ibulan,$assoc=false,$year=null){
          $year_now=($year===null)?date('Y'):$year;

          $jumHari = cal_days_in_month(CAL_GREGORIAN, $ibulan, $year_now);

          $options = array();
          if ($assoc==false) {
              for ($i=1; $i <= $jumHari ; $i++) {
                $options[] = $i;
              }
          }else{
              for ($i=1; $i <= $jumHari ; $i++) {
                if (strlen($i)==1) {
                  $i='0'.$i;
                }else{
                  $i=$i;
                }
                $options[$i] = $i;
              }
          }
          return $options;
    }

    public function upload_file($inputvar, $path, $allow, $size){
        $config['upload_path']   = $path;
        $config['allowed_types'] = $allow;
        $config['max_size']     = $size;
        $config['overwrite']     = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($inputvar)){
            return FALSE;
        }else{
            return TRUE;
        }
    }

}
