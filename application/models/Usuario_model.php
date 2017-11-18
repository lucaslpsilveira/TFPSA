<?php
class Usuario_model extends CI_Model {

    # VALIDA USUÁRIO
    function validate() {
        if($_POST != NULL){
            $this->db->where('email', $this->input->post('email')); 
            $this->db->where('password', md5($this->input->post('password')));

            $query = $query = $this->db->get('usuario');

            var_dump($query) ;

            if ($query->num_rows == 1) { 
                return true; // RETORNA VERDADEIRO
            }
        }
        return false;
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://oficina2015/login">Efetuar Login</a>';
            die();
        }
    }
}

?>