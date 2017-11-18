<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
}

    function index() {

        // VALIDATION RULES
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');


        // MODELO MEMBERSHIP
        $this->load->model('usuario_model', 'usuario');
        $query = $this->usuario->validate();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login/login');
        } else {
            var_dump($query);
            if ($query) { // VERIFICA LOGIN E SENHA
                $data = array(
                    'email' => $this->input->post('email'),
                    'logged' => true
                );
                $this->session->set_userdata($data);
                //redirect('login/area_restrita');
            } else {
                //redirect('login');
            }
        }
    }

    function area_restrita(){
        echo "teste";
    }
}