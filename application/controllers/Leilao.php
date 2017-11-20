<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Leilao extends CI_Controller {

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
		$this->load->model('leilao_model','pm');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	
	public function index() {
		$data = new stdClass();

		$data->result = $this->pm->getAll();
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$data->logar = 'logado';
		}else{
			$data->logar = 'Para participar e criar novos leilões faça login no sistema';
		}		

		$this->load->view('header');
		$this->load->view('leilao/index',$data);
		$this->load->view('footer');
		
	}

	public function detalhes($id) {
		$this->load->model('lance_model','lance');
		$data = new stdClass();

		$data->result = $this->pm->getInfo($id);

		$data->lance = $this->lance->getAll($id,$data->result[0]->tipo);

		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$data->logar = 'logado';
		}else{
			$data->logar = 'Para participar e criar novos leilões faça login no sistema';
		}		

		$this->load->view('header');
		$this->load->view('leilao/visualizar',$data);
		$this->load->view('footer');
		
	}

	public function meus_leiloes() {
		$data = new stdClass();

		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$data->logar = 'logado';
			$data->result  = $this->pm->getPublicados($_SESSION['user_id']);
			$data->result2 = $this->pm->getNaoPublicados($_SESSION['user_id']);
			$data->result3 = $this->pm->getFinalizados($_SESSION['user_id']);
		}else{
			$data->logar = 'Para participar e criar novos leilões faça login no sistema';
		}		

		$this->load->view('header');
		$this->load->view('leilao/my',$data);
		$this->load->view('footer');
		
	}
	
	public function add(){
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
		// set validation rules
		$this->form_validation->set_rules('data_fim', 'Data e Hora Fim', 'required');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		
		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('leilao/addedit',['page' => 'add']);
			$this->load->view('footer');			
		} else {

			$data = array(
				'data_fim'   	=> $this->input->post('data_fim'),
				'tipo' 			=> $this->input->post('tipo'),
				'tipo_lance'	=> $this->input->post('tipo_lance'),
				'valor'			=> $this->input->post('valor'),
				'user_id'		=> $_SESSION['user_id']
			);

			$this->pm->add($data);

			redirect(base_url().'index.php/leilao');
		}
		}else{
			redirect(base_url().'index.php/user/login');
		}

	}

	public function edit($id){
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {

		$this->load->model('lote_model','lote');
		// set validation rules
		$this->form_validation->set_rules('data_fim', 'Data e Hora Fim', 'required');
		
		$query = $this->pm->getById($id);
		$lote 	   = $this->lote->getNoLote($_SESSION['user_id']);
		$leilao_lote = $this->lote->getAllLote($id,$_SESSION['user_id']);

		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('leilao/addedit',['result' 		=> $query,
												 'page' 		=> 'edit',
												 'lote' 		=> $lote,
												 'leilao_lote'	=> $leilao_lote,
												 'idleilao'		=> $id]);
			$this->load->view('footer');			
		} else {

			$data = array(
				'data_fim'   	=> $this->input->post('data_fim'),
				'tipo' 			=> $this->input->post('tipo'),
				'tipo_lance'	=> $this->input->post('tipo_lance')
			);

			$this->pm->update($id,$data);

			redirect(base_url().'index.php/leilao');
		}
		}else{
			redirect(base_url().'index.php/user/login');
		}
	}

	public function delete($id){
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
		if($_POST == NULL){
			$query = $this->pm->getById($id);

			$this->load->view('header');
			$this->load->view('leilao/delete',['query'=>$query]);
			$this->load->view('footer');
		}else{
			if($this->input->post('confirma')=='S'){
				$this->pm->delete($id);
			}
			redirect(base_url().'index.php/leilao');
		}
		}else{
			redirect(base_url().'index.php/user/login');
		}
	}
	
	public function publicar($id){
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$this->pm->publicar($id);
			redirect(base_url().'index.php/leilao/meus_leiloes/'.$lote);
		}else{
			redirect(base_url().'index.php/user/login');
		}
	}
}
