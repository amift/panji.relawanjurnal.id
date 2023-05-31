<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter ecnrypt amd decrypt library
 *
 * @package     Mfcrypt
 * @subpackage  Libraries
 * @category    Cryptography
 * @author      Miftahul (amift) <miftahul81@gmail.com>
 */
class Mfcrypt{

	protected $secret_key     = 'my-key-128';
	protected $secret_iv      = 'iv-128';
	protected $encrypt_method = "aes128";

    private $key = '';
    private $iv = '';

    public function __construct(){
        $this->initialize();
    }

    private function initialize(){
	    $this->key = hash( 'sha256', $this->secret_key );
	    $this->iv = substr( hash( 'sha256', $this->secret_iv ), 0, 16 );
    }

    public function secureit($string,$opt='e',$url_safe=true){
	 	if ($opt=='e') {
	        $enc_data = $this->enc($string);
	        if ($url_safe){
	            $enc_data = base64_encode($enc_data);
	        }
	        $result=$enc_data;
	 	}else{
	        $dec_data = base64_decode($string);
	        $result= $this->dec($dec_data);
	 	}
	    return $result;
    }

	public function enc( $string ) {
	    $output = false;

		$output = openssl_encrypt( $string, $this->encrypt_method, $this->key, 0, $this->iv );
	    return $output;
	}

	public function dec( $string ) {
	    $output = false;
		$output = openssl_decrypt($string, $this->encrypt_method, $this->key, 0, $this->iv );
	    return $output;
	}	

}
