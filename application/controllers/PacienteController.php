<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/2/15
 * Time: 4:43 PM
 */
class PacienteController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')->id_usuario || !$this->session->userdata('logado')) {
            redirect(base_url('/login'));
        }
        $this->load->model('Usuario_model','usuario');
        $this->load->model('Endereco_Model','endereco');
        $this->load->model('Consulta_Model','consulta');
    }

    public function perfil()
    {

        $id = $this->session->usuario->id_usuario;
        $dados['paciente'] = $this->usuario->getUsuarioById($id);
        $dados['endereços'] = $this->endereco->getEnderecoUsuarioById($id);
        $dados['consultas'] = $this->consulta->getConsultaPacienteId($id);
        $this->load->view('layout_principal/top');
        $this->load->view("template_paciente/meus_dados", $dados);
        $this->load->view('layout_principal/footer');
    }

    public function note_doctor()
    {
        $data['id_consulta'] = $this->input->post('id_consulta');
        $data['id_medico'] = $this->input->post('id_medico');
        $data['nota'] = $this->input->post('nota');
        $data['data_cadastro'] = date('Y-m-d H:i:s', time());
        $this->db->insert('consulta_medico_avaliacao', $data);
        return redirect('paciente/perfil');
    }

}