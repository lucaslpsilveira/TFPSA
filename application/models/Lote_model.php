<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Lote_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function add($nome) {
		
		$data = array(
			'nome'   => $nome
		);

		$this->db->insert('lote', $data);
		return $this->db->insert_id();
		
	}

	public function update($id,$nome) {
		
		$this->db->set('nome', $nome);
		$this->db->where('id', $id);
		return $this->db->update('lote');
		
	}

	public function getAll() {
		return $this->db->get('lote')->result();
	}	

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('lote')->row();
	}	

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('lote');
	}

	public function utilizado($id){
		$this->db->where('lote_id', $id);
		if($this->db->get('produto')->result() != null){
			return true;
		}
		return false;
	}
	
}
