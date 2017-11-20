<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class lote extends CI_Controller {

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
		$this->load->model('lote_model','lote');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			
		}else{
			redirect(base_url().'index.php/user/login');
		}
	}
	
	
	public function index() {
		$data = new stdClass();

		$data->result = $this->lote->getAll();

		$this->load->view('header');
		$this->load->view('lote/index',$data);
		$this->load->view('footer');
		
	}
	
	public function add(){

		// set validation rules
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		
		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('lote/addedit',['page' => 'add']);
			$this->load->view('footer');			
		} else {
			redirect(base_url().'index.php/lote/edit/'.$this->lote->add($this->input->post('nome')));
		}

	}

	public function edit($id){
		$this->load->model('produto_model','prod');
		// set validation rules
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		
		$query = $this->lote->getById($id);
		$produtos 	   = $this->prod->getNoLote();
		$produtos_lote = $this->prod->getAllLote($id);

		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('lote/addedit',['query' 		  => $query,
											  'page'  		  => 'edit',
											  'produtos' 	  => $produtos,
											  'produtos_lote' => $produtos_lote,
											  'idlote'        => $id]);
			$this->load->view('footer');			
		} else {

			$this->lote->update($id,$this->input->post('nome'));

			redirect(base_url().'index.php/lote');
		}
	}

	public function delete($id){
		if($_POST == NULL){
			$query = $this->lote->utilizado($id);
			$this->load->view('header');
			$this->load->view('lote/delete',['utilizado' => $query]);
			$this->load->view('footer');
		}else{
			if($this->input->post('confirma')=='S'){
				$this->lote->delete($id);
			}
			redirect(base_url().'index.php/lote');
		}
	}
	
}
