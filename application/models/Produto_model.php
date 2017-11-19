<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Produto_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function add($_data) {
		
		$data = array(
			'descricao_breve'   	=> $_data['desc_breve'],
			'descricao_completa' 	=> $_data['desc_comp'],
			'produto_categoria_id'	=> $_data['id_categoria']
		);

		return $this->db->insert('produto', $data);
		
	}

	public function update($id,$_data) {
		
		$this->db->set('descricao_breve', $_data['desc_breve']);
		$this->db->set('descricao_completa', $_data['desc_comp']);
		$this->db->set('produto_categoria_id', $_data['id_categoria']);
		$this->db->where('id', $id);
		return $this->db->update('produto');
		
	}

	public function getAll() {
		$this->db->select('*, c.nome as categoria, p.id as idproduto, c.id as idcategoria ');
		$this->db->from('produto as p');
		$this->db->join('produto_categoria as c', 'p.id = c.id');
		return $this->db->get()->result();
	}	

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('produto')->row();
	}	

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('produto');
	}
	
}
