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
			'produto_categoria_id'	=> $_data['id_categoria'],
			'user_id'				=> $_data['user_id']
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

	public function getAll($id) {
		$query = 'SELECT *, c.nome as categoria, p.id as idproduto, c.id as idcategoria 
				  FROM (produto as p) JOIN produto_categoria as c 
				  ON p.produto_categoria_id = c.id where p.user_id = '.$id;

		return $this->db->query($query)->result();
	}

	public function getAllLote($id) {
		$query = 'SELECT *, c.nome as categoria, p.id as idproduto, c.id as idcategoria 
				  FROM (produto as p) JOIN produto_categoria as c 
				  ON p.produto_categoria_id = c.id
				  WHERE p.lote_id = '.$id;
				  
		return $this->db->query($query)->result();
	}	

	public function getNoLote() {
		$query = 'SELECT *, c.nome as categoria, p.id as idproduto, c.id as idcategoria 
				  FROM (produto as p) JOIN produto_categoria as c 
				  ON p.produto_categoria_id = c.id
				  WHERE p.lote_id IS NULL';

		return $this->db->query($query)->result();
	}

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('produto')->row();
	}	

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('produto');
	}

	public function addLote($id,$lote) {
		$this->db->set('lote_id', $lote);
		$this->db->where('id', $id);
		return $this->db->update('produto');
	}

	public function rmLote($id) {
		$this->db->set('lote_id', NULL);
		$this->db->where('id', $id);
		return $this->db->update('produto');
	}
	
}
