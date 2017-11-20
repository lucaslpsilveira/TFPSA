<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class leilao extends CI_Controller {

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
		$this->load->model('leilao_model','leilao');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	
	public function index() {
		$data = new stdClass();

		$data->result = $this->leilao->getAll();
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$data->logar = 'logado';
		}else{
			$data->logar = 'Logue no sistema para dar lances e criar leilões';
		}

		$this->load->view('header');
		$this->load->view('leilao/index',$data);
		$this->load->view('footer');
		
	}
	
	public function add(){

		// set validation rules
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		
		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('leilao/addedit',['page' => 'add']);
			$this->load->view('footer');			
		} else {
			redirect(base_url().'index.php/leilao/edit/'.$this->leilao->add($this->input->post('nome')));
		}

	}

	public function edit($id){
		$this->load->model('produto_model','prod');
		// set validation rules
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		
		$query = $this->leilao->getById($id);
	
		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('leilao/addedit',['query' 		  => $query,
											  'page'  		  => 'edit']);
			$this->load->view('footer');			
		} else {

			$this->leilao->update($id,$this->input->post('nome'));

			redirect(base_url().'index.php/leilao');
		}
	}

	public function delete($id){
		if($_POST == NULL){
			$query = $this->leilao->utilizado($id);
			$this->load->view('header');
			$this->load->view('leilao/delete',['utilizado' => $query]);
			$this->load->view('footer');
		}else{
			if($this->input->post('confirma')=='S'){
				$this->leilao->delete($id);
			}
			redirect(base_url().'index.php/leilao');
		}
	}
	
}
