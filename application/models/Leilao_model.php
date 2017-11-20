<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Leilao_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function add($nome) {
		
		$data = array(
			'nome'   => $nome
		);

		$this->db->insert('leilao', $data);
		return $this->db->insert_id();
		
	}

	public function update($id,$nome) {
		
		$this->db->set('nome', $nome);
		$this->db->where('id', $id);
		return $this->db->update('leilao');
		
	}

	public function getAll() {
		return $this->db->get('leilao')->result();
	}	

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('leilao')->row();
	}	

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('leilao');
	}

	public function utilizado($id){
		$this->db->where('leilao_id', $id);
		if($this->db->get('produto')->result() != null){
			return true;
		}
		return false;
	}
	
}
