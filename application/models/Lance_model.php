<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Lance_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function add($valor) {
		
		$data = array(
			'valor'   => $valor
		);

		return $this->db->insert('lance', $data);
		
	}

	public function getAll($id,$tipo) {
		$query = 'SELECT l.id as id,data_hora,valor,username FROM lance as l join users as u 
	on l.user_id = u.id where l.leilao_id = '.$id;
	
		if ($tipo == 1) {
			$query .= ' order by valor desc';
		}else{
			$query .= ' order by valor asc';
		}
		
		return $this->db->query($query)->result();
	}	

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('lance')->row();
	}	
	
}
