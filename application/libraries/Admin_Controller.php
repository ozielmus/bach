<?php 

class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->data['meta_title'] = ucfirst($this->uri->segment(2)) . ' - Bach PHP';

 		//Helpers
 		$this->load->helper('form');

 		//Libraries
 		$this->load->library('session');
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('user_m', 'user');
 		$this->load->model('page_m', 'page');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		//$this->output->enable_profiler(TRUE);

 		// Login check
 		$exception_uris = array(
 			'login',
 			'logout'
 		);
 		if (in_array(uri_string(), $exception_uris) == FALSE) {
 			if ($this->user->loggedin() == FALSE) {
	 			redirect('login');
	 		}
 		}

 		$this->data['page'] = $this->page->get_by(array("Slug" => $this->uri->segment(2)), TRUE);
 		$this->data['menu'] = $this->page->get_nested();
 	}
}

