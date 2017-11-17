<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/24/15
 * Time: 11:55 AM
 */
class FinanceiroController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuarioAdmin')->id || !$this->session->userdata('logado')) {
            redirect(base_url('/admin'));
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model('Usuario_model','usuario');
        $this->load->model('Endereco_Model','endereco');
        $this->load->model('Medico_Model','medico');
        $this->load->model('Paciente_Model','paciente');
        $this->load->model('Consulta_Model','consulta');
        $this->load->model('Pagamento_Model','pagamento');
        $this->load->model('AgendaConsulta_Model','agendaConsulta');
        $this->load->model('Especialidade_Model','especialidade');
    }

    public function index()
    {
        $data['pagamentos'] = $this->pagamento->getAllPagamento();
        $this->load->view('layout_principal_admin/top');
        $this->load->view('template_financeiro_admin/index', $data);
        $this->load->view('layout_principal_admin/footer_admin');
    }

    public function detalhe($id_pagamento)
    {
        $data['pagamento'] = $this->pagamento->getAllPagamentoById($id_pagamento);
        $this->pagamento->consultaPagamento($data['pagamento'][0]->reference_transection);
        $this->load->view('layout_principal_admin/top');
        $this->load->view('template_financeiro_admin/detalhe', $data);
        $this->load->view('layout_principal_admin/footer_admin');
    }

}