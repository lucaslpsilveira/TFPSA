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
		$this->load->model('produto_model','pm');
		$this->load->helper('form');
		$this->load->library('form_validation');
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			
		}else{
			redirect(base_url().'index.php/user/login');
		}
	}
	
	
	public function index() {
		$data = new stdClass();

		$data->result = $this->pm->getAll();

		$this->load->view('header');
		$this->load->view('produto/index',$data);
		$this->load->view('footer');
		
	}
	
	public function add(){
		$this->load->model('produto_categoria_model','pcm');
		// set validation rules
		$this->form_validation->set_rules('desc_breve', 'Descrição Breve', 'required');
		
		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('produto/addedit',['page' => 'add',
												 'result_categoria' =>$this->pcm->getAll()]);
			$this->load->view('footer');			
		} else {

			$data = array(
				'desc_breve'   	=> $this->input->post('desc_breve'),
				'desc_comp' => $this->input->post('desc_comp'),
				'id_categoria'	=> $this->input->post('id_categoria')
			);

			$this->pm->add($data);

			redirect(base_url().'index.php/produto');
		}

	}

	public function edit($id){
		$this->load->model('produto_categoria_model','pcm');
		// set validation rules
		$this->form_validation->set_rules('desc_breve', 'Descrição breve', 'required');
		
		$query = $this->pm->getById($id);

		if ($this->form_validation->run() == false) {	
			$this->load->view('header');
			$this->load->view('produto/addedit',['query' => $query,
												 'page' => 'edit',
												 'result_categoria' =>$this->pcm->getAll()]);
			$this->load->view('footer');			
		} else {

			$data = array(
				'desc_breve'   	=> $this->input->post('desc_breve'),
				'desc_comp' => $this->input->post('desc_comp'),
				'id_categoria'	=> $this->input->post('id_categoria')
			);

			$this->pm->update($id,$data);

			redirect(base_url().'index.php/produto');
		}
	}

	public function delete($id){
		if($_POST == NULL){
			$query = $this->pm->getById($id);

			$this->load->view('header');
			$this->load->view('produto/delete',['query'=>$query]);
			$this->load->view('footer');
		}else{
			if($this->input->post('confirma')=='S'){
				$this->pm->delete($id);
			}
			redirect(base_url().'index.php/produto');
		}
	}
	
	public function addLote($id,$lote) {
		$this->pm->addLote($id,$lote);
		redirect(base_url().'index.php/lote/edit/'.$lote);
	}

	public function rmLote($id,$lote) {
		$this->pm->rmLote($id);
		redirect(base_url().'index.php/lote/edit/'.$lote);
	}
}
