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
	
	public function add($valor,$idleilao,$user_id) {
		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);

		$data = array(
			'valor'   	=> $valor,
			'leilao_id' => $idleilao,
			'user_id'	=> $user_id,
			'data_hora'	=> $date['date']
		);

		return $this->db->insert('lance', $data);
		
	}

	public function getAll($id,$tipo) {
		$query = 'SELECT l.id as id,data_hora,valor,username FROM lance as l join users as u 
	on l.user_id = u.id where l.leilao_id = '.$id;
	
		if ($tipo == 1) {
			$query .= ' order by valor desc, data_hora asc';
		}else{
			$query .= ' order by valor,data_hora asc  ';
		}
		
		return $this->db->query($query)->result();
	}	

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('lance')->row();
	}	
	
}
