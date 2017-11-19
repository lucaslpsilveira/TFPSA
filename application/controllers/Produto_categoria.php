<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Produto_categoria extends CI_Controller {

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
		$this->load->model('produto_categoria_model','pcm');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	
	public function index() {
		$data = new stdClass();

		$data->result = $this->pcm->getAll();

		$this->load->view('header');
		$this->load->view('produto_categoria/index',$data);
		$this->load->view('footer');
		
	}
	
	public function add(){

		// set validation rules
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		
		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('produto_categoria/addedit',['page' => 'add']);
			$this->load->view('footer');			
		} else {

			$this->pcm->add($this->input->post('nome'));

			redirect(base_url().'index.php/produto_categoria');
		}

	}

	public function edit($id){
		// set validation rules
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		
		$query = $this->pcm->getById($id);

		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('produto_categoria/addedit',['query' => $query,'page' => 'edit']);
			$this->load->view('footer');			
		} else {

			$this->pcm->update($id,$this->input->post('nome'));

			redirect(base_url().'index.php/produto_categoria');
		}
	}

	public function delete($id){
		if($_POST == NULL){
			$this->load->view('header');
			$this->load->view('produto_categoria/delete');
			$this->load->view('footer');
		}else{
			if($this->input->post('confirma')=='S'){
				$this->pcm->delete($id);
			}
			redirect(base_url().'index.php/produto_categoria');
		}
	}
	
}
