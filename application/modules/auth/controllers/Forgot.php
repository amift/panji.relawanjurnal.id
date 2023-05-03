<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function __construct(){
		parent::__construct();
    	$this->load->helper(['form','string','general']);
			$this->load->library(['form_validation']);
			$this->load->library(['PHPMailer_Lib']);

      $this->modul='auth';
      $this->class=strtolower(__CLASS__);

      $this->load->model('User_model','m_data');
	}

	public function index(){
		$invoke['baseurl'] = base_url($this->modul.'/'.$this->class);
		$invoke['jsfile']  = 'index_js.php';
		$this->load->view('__'.$this->class.'/index', $invoke);   
  }

  public function forgot(){
      if ($this->input->is_ajax_request()) { 
					$this->validation_language();

	        $this->form_validation->set_rules('input_email'        ,'Email'     ,'trim|valid_email|max_length[255]|required');

          if ($this->form_validation->run() == FALSE){
						$errors = array(
												'input_email'        =>  form_error('input_email'),
											);

          	$invoke['status'] = FALSE;
          	$invoke['errors'] = $errors;
            $this->output->set_content_type('application/json')->set_output(json_encode($invoke));
          }else{
          	$email    = $this->input->post('input_email');
				  	$result = $this->m_data->get_it(['email' => $email]);

					  if ( !empty($result) ) {
					  	$password = random_str(false,6);
					  	$hash_password    = hash('sha256', $password);

              $message  ='<img src="'.base_url('assets/backend/images/logo.png').'" alt=""> <br>';
              $message .='Program Pendampingan Pengelolaan Jurnal Internasional';
              $message .='<hr>';
							$message .='<br>';

              $message .='Dear '.$result->name.', anda telah melakukan permintaan reset password <br>';
							$message .='Berikut ini adalah password baru anda : '.$password.'.<br><br>';

							$message .='Disarankan untuk segera mengganti password setelah berhasil login.<br><br>';

							$message .='Terimakasih';
							$message .='<p><span style="font-size:12px">Note: Mohon tidak membalas email ini, email ini dikirim otomatis oleh sistem.</span></p>';


						// debugme($message);
				  // 	debugme($result,true);

							$mail_data['to_address']    = $email;
							$mail_data['email_subject'] = 'Permintaan reset password - PANJI';
							$mail_data['message']       = $message;

							$email_stat=$this->send_mail($mail_data);
							if ($email_stat=='ok') {
            		$result=$this->m_data->update(['password' => $hash_password],['email' => $email ]);
							}else{
                $invoke['send_mail_error'] = TRUE;
							}							
					  }else{
					  	echo 'tidak ada';
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