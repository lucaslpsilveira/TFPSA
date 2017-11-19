<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Produto_categoria_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function add($nome) {
		
		$data = array(
			'nome'   => $nome
		);

		return $this->db->insert('produto_categoria', $data);
		
	}

	public function update($id,$nome) {
		
		$this->db->set('nome', $nome);
		$this->db->where('id', $id);
		return $this->db->update('produto_categoria');
		
	}

	public function getAll() {
		return $this->db->get('produto_categoria')->result();
	}	

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('produto_categoria')->row();
	}	

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('produto_categoria');
	}
	
}
