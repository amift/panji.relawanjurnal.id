<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string','general']);
			$this->load->library(['form_validation']);
			$this->load->library(['PHPMailer_Lib']);


      $this->modul='auth';
      $this->class=strtolower(__CLASS__);

      $this->load->model('User_model','m_data');
      $this->load->model('Provinsi_model','m_provinsi');
	}


	public function index(){
		$invoke['arr_provinsi'] = $this->m_provinsi->get_data_as_array('-- Provinsi --');

		$invoke['baseurl'] = base_url($this->modul.'/'.$this->class);
		$invoke['jsfile']  = 'index_js.php';
		$this->load->view('__'.$this->class.'/index', $invoke);   
  }

  public function reg(){
      if ($this->input->is_ajax_request()) { 
					$this->validation_language();

	        $this->form_validation->set_rules('input_username'     ,'Username'  ,'trim|max_length[50]|required');
	        $this->form_validation->set_rules('input_password'     ,'Password'  ,'trim|max_length[255]|required');
	        $this->form_validation->set_rules('input_name'         ,'Nama Lengkap'      ,'trim|max_length[255]|required');
	        $this->form_validation->set_rules('input_email'        ,'Email'     ,'trim|valid_email|max_length[255]|required');
	        $this->form_validation->set_rules('input_telepon'      ,'Telepon'   ,'trim|max_length[30]|required');
	        $this->form_validation->set_rules('input_institusi'    ,'Institusi' ,'trim|max_length[255]|required');
	        $this->form_validation->set_rules('input_provinsi_id'  ,'Provinsi'  ,'trim|max_length[3]|required');

          if ($this->form_validation->run() == FALSE){
						$errors = array(
												'input_username'     =>  form_error('input_username'),
												'input_password'     =>  form_error('input_password'),
												'input_name'         =>  form_error('input_name'),
												'input_email'        =>  form_error('input_email'),
												'input_telepon'      =>  form_error('input_telepon'),
												'input_institusi'    =>  form_error('input_institusi'),                        
												'input_provinsi_id'  =>  form_error('input_provinsi_id'),
											);

          	$invoke['status'] = FALSE;
          	$invoke['errors'] = $errors;
            $this->output->set_content_type('application/json')->set_output(json_encode($invoke));
          }else{
          	$hash_password    = hash('sha256', $this->input->post('input_password'));
          	$verification_key = hash('sha256', $hash_password.html_escape($this->input->post('input_username')) );
						$data = array(
										'username'     =>  html_escape($this->input->post('input_username')),
										'password'     =>  $hash_password,
										'name'         =>  html_escape($this->input->post('input_name')),
										'email'        =>  html_escape($this->input->post('input_email')),
										'telepon'      =>  html_escape($this->input->post('input_telepon')),
										'verification_key' => $verification_key,
										'institusi'    =>  html_escape($this->input->post('input_institusi')),
                    'level'        =>  'user',
										'provinsi_id'  =>  html_escape($this->input->post('input_provinsi_id')),
						    	);

	      		if ($this->m_data->is_present(['username' => $data['username'] ])) {
	            $invoke['user_exist'] = TRUE;
	      		}elseif($this->m_data->is_present(['email' => $data['email'] ])) {
	            $invoke['email_exist'] = TRUE;
	      		}else{
              $message ='<img src="'.base_url('assets/backend/images/logo.png').'" alt=""> <br>';
              $message .='Program Pendampingan Pengelolaan Jurnal Internasional';
              $message .='<hr>';
							$message .='<br>';

              $message .='Dear '.$data['name'].'<br><br>';

							$message .='Anda telah mendaftar pada Sistem PANJI <br>';
							$message .='Silakan klik tautan berikut <a href="'.base_url('verify/').$verification_key.'">VERIFIKASI</a> untuk memverifikasi email Anda.<br><br>';

							$message .='Jika tombol tersebut tidak berfungsi, silakan salin pranala berikut di peramban/browser.<br><br>';
							$message .= base_url('verify/').$verification_key.'<br><br>';
							$message .='Jika Anda merasa tidak melakukan pendaftaran pada Sistem PANJI mohon abaikan pesan ini.<br><br>';

							$message .='Terimakasih';
							$message .='<p><span style="font-size:12px">Note: Mohon tidak membalas email ini, email ini dikirim otomatis oleh sistem.</span></p>';
							// $message .='Jika ada pertanyaan, silahkan hubungi kami melalui contact@relawanjurnal.id dan atau melalui pesan whatsapp wa.me/628170240689 .'

							$mail_data['to_address']    = $data['email'];
							$mail_data['email_subject'] = 'Pendaftaran Akun PANJI';
							$mail_data['message']       = $message;

							$email_stat=$this->send_mail($mail_data);
							if ($email_stat=='ok') {
            		$result=$this->m_data->insert($data);
							}else{
                $invoke['send_mail_error'] = TRUE;
							}	      			
	      		}

            $invoke['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($invoke));
          }
      }else{
          $invoke['status'] = FALSE;
          $this->output->set_content_type('application/json')->set_output(json_encode($output));
      }
  }  

  function validation_language(){
      $this->form_validation->set_message('max_length',   'Karakter terlalu panjang, maksimal {param} karakter');
      $this->form_validation->set_message('min_length',   'Karakter terlalu pendek, minimal {param} karakter');
      $this->form_validation->set_message('valid_email',  'Email tidak valid');
      $this->form_validation->set_message('required',     '{field} tidak boleh kosong');
      $this->form_validation->set_message('is_unique',    '{field} sudah terdaftar,gunakan nama lain');
      $this->form_validation->set_message('numeric',      '{field} harus angka');
      $this->form_validation->set_message('alpha_dash',   '{field} hanya boleh diisi angka, huruf, underscores, dan dashes.');
      $this->form_validation->set_message('alpha_numeric','{field} hanya boleh diisi angka dan huruf');

			$this->form_validation->set_error_delimiters('','');
  }

    public function send_mail($mail_data=null){
        $this->load->model('EmailSetting_model','m_emailsettings');    
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

}