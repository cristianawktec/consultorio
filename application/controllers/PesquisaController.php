<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 2/9/16
 * Time: 11:00 AM
 */
class PesquisaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model', 'usuario');
    }

    public function index()
    {
        $nome = $this->input->post('nm_paciente');
        $cpf = $this->input->post('nr_cpf');
        $dados['pacientes'] = $this->usuario->pesquisa($nome, $cpf);
        $this->load->view('layout_principal/top');
        $this->load->view("template_pesquisa/resultado", $dados);
        $this->load->view('layout_principal/footer');
    }

}