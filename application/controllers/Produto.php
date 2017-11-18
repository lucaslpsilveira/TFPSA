<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Produto extends CI_Controller {

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
		$this->load->model('produto_model');
		
	}
	
	
	public function index() {
		//$data = new stdClass();

		$this->load->view('header');
		$this->load->view('produto_addedit');
		$this->load->view('footer');
		
	}
	
	public function add(){
		$this->load->view('header');
		$this->load->view('produto_categoria/addedit');
		$this->load->view('footer');
	}
	
}
