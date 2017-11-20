<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class lance extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('lance_model','pcm');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			
		}else{
			redirect(base_url().'index.php/user/login');
		}
	}
	
	
	public function index() {
		
	}
	
	public function add($idleilao){

		// set validation rules
		$this->form_validation->set_rules('lance', 'lance', 'required');
		
		if ($this->form_validation->run() == false) {	
			redirect(base_url().'index.php/leilao/detalhes/'.$idleilao);	
		} else {

			$this->pcm->add($this->input->post('lance'),$idleilao,$_SESSION['user_id']);

			redirect(base_url().'index.php/leilao/detalhes/'.$idleilao);
		}

	}
	
}
