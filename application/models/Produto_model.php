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
	
	public function add($nome) {
		
		$data = array(
			'nome'   => $nome
		);

		return $this->db->insert('produto', $data);
		
	}
	
}
