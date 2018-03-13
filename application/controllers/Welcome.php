<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                
                /**
                $email = 'mlegowicz@gmail.com';
                $id = '143';
                
                $string = $id.'_'.$email;
                $encoded = urlencode( base64_encode($string));
                var_dump($encoded);
                $decoded = base64_decode( urldecode($encoded));
                
                var_dump($decoded);
                **/    
            
            
		$this->load->view('oneui/base_pages_login');
	}
}
