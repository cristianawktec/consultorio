<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/24/15
 * Time: 10:33 AM
 */
class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuarioAdmin')->id || !$this->session->userdata('logado')) {
            redirect(base_url('/login'));
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model('Usuario_model','usuario');
        $this->load->model('Endereco_Model','endereco');
        $this->load->model('Medico_Model','medico');
        $this->load->model('Paciente_Model','paciente');
        $this->load->model('Consulta_Model','consulta');
        $this->load->model('AgendaConsulta_Model','agendaConsulta');
        $this->load->model('Especialidade_Model','especialidade');
        $this->load->model('Charts_model','charts');
    }

    public function index()
    {
        $dados['especialidades'] = $this->especialidade->getAllEspecialidade();
        $dados['medicos'] = $this->medico->getAllMedico();
        $dados['pacientes'] = $this->paciente->getAllPaciente();
        $dados['consultas'] = $this->consulta->getAllConsulta();

        $dados['plano1'] = $this->charts->plano1();
        $dados['plano2'] = $this->charts->plano2();
        $dados['plano3'] = $this->charts->plano3();

        $this->load->view('layout_principal_admin/top');
        $this->load->view('template_dashboard_admin/index', $dados);
        $this->load->view('layout_principal_admin/footer_admin');
    }

}