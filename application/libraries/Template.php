<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		//  Copyright :  Jérôme Jaglale
		//  http://jeromejaglale.com/doc/php/codeigniter_template

		var $template_data = array();
		
		function set($name, $value){
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE){               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}