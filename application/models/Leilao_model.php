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
	
	public function add($_data) {
		
		$data = array(
			'data_hora_fim' => $_data['data_fim'],
			'tipo' 			=> $_data['tipo'],
			'tipo_lance'	=> $_data['tipo_lance'],
			'valor_minimo'	=> $_data['valor'],
			'user_id'		=> $_data['user_id']
		);

		return $this->db->insert('leilao', $data);
		
	}

	public function update($id,$_data) {
		
		$this->db->set('data_hora_fim', $_data['data_fim']);
		$this->db->set('tipo', $_data['tipo']);
		$this->db->set('tipo_lance', $_data['tipo_lance']);
		$this->db->where('id', $id);
		return $this->db->update('leilao');
		
	}

	public function publicar($id) {

		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);		
		
		$this->db->set('data_hora_inicio', $date['date']);
		$this->db->where('id', $id);
		return $this->db->update('leilao');
		
	}

	public function getAll() {
		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);		

		$query = "SELECT * FROM leilao where data_hora_fim >= '".$date['date']."'
				  AND data_hora_inicio IS NOT NULL";

		//echo $query;

		return $this->db->query($query)->result();
	}

	public function getPublicados($id) {
		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);		

		$query = "SELECT * FROM leilao where data_hora_fim >= '".$date['date']."'
				  AND data_hora_inicio IS NOT NULL AND user_id = ".$id;

		//echo $query;

		return $this->db->query($query)->result();
	}

	public function getNaoPublicados($id) {

		$query = "SELECT * FROM leilao where data_hora_inicio IS NULL AND user_id = ".$id;

		return $this->db->query($query)->result();
	}

	public function getFinalizados($id) {
		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);		

		$query = "SELECT * FROM leilao where data_hora_fim <= '".$date['date']."'
				  AND data_hora_inicio IS NOT NULL AND user_id = ".$id;

		//echo $query;

		return $this->db->query($query)->result();
	}

	public function getById($id) {
		$this->db->where('id', $id);
		return $this->db->get('leilao')->row();
	}	

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('leilao');
	}
	
	public function getInfo($id) {
		$query = 'SELECT lei.id as idleilao, valor_minimo, tipo, tipo_lance, 
					u.username as usuario, descricao_breve, p.id as idproduto
			 		FROM leilao as lei 
					join lote as lote on lei.id = lote.leilao_id
				    join produto as p on lote.id = p.lote_id
				    join users 	as u on lei.user_id = u.id
				    where lei.id = '.$id;
				  
	    return $this->db->query($query)->result();
	}	

}
