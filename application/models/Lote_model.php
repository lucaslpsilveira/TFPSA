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
	
	public function add($_data) {
		
		$data = array(
			'nome'   => $_data['nome'],
			'user_id' => $_data['user_id'],
		);

		$this->db->insert('lote', $data);
		return $this->db->insert_id();
		
	}

	public function update($id,$nome) {
		
		$this->db->set('nome', $nome);
		$this->db->where('id', $id);
		return $this->db->update('lote');
		
	}

	public function getAll($id) {
		$this->db->where('user_id', $id);
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

	public function getAllLote($id,$user_id) {
		$this->db->where('leilao_id', $id);
		$this->db->where('user_id', $user_id);
				  
		return $this->db->get('lote')->result();
	}	

	public function getNoLote($user_id) {
		$this->db->where('user_id', $user_id);
		$this->db->where('leilao_id IS NULL');

		return $this->db->get('lote')->result();
	}
	
	public function addLote($id,$leilao) {
		$this->db->set('leilao_id', $leilao);
		$this->db->where('id', $id);
		return $this->db->update('lote');
	}

	public function rmLote($id) {
		$this->db->set('leilao_id', NULL);
		$this->db->where('id', $id);
		return $this->db->update('lote');
	}
}
