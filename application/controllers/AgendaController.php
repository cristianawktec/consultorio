<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/23/15
 * Time: 7:08 PM
 */
class AgendaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')->id_usuario || !$this->session->userdata('logado')) {
            redirect(base_url('/login'));
        }
        $this->load->model('Agenda_Model', 'agenda');
    }

    public function create()
    {
        $this->load->view('layout_principal/top');
        $this->load->view("template_agenda/create_agenda");
        $this->load->view('layout_principal/footer');
    }

    public function edit($id)
    {
        $data['agenda'] = $this->agenda->getAgendaById($id);
        $this->load->view('layout_principal/top');
        $this->load->view("template_agenda/edit_agenda", $data);
        $this->load->view('layout_principal/footer');
    }

    public function add()
    {
        $data['id_medico'] = $this->input->post('id_medico');
        $data['horario'] = $this->input->post('horario');

        if($this->agenda->add($data)){
            return redirect('/medico/perfil');
        } else {
            return 'error';
        }

    }

    public function update($id)
    {
        $data['id_medico'] = $this->input->post('id_medico');
        $data['horario'] = $this->input->post('horario');

        if($this->agenda->update($id,$data)){
            return redirect('/medico/perfil');
        } else {
            return 'error';
        }

    }

    public function remove($id)
    {
        if($this->agenda->remove($id)){
            return redirect('/medico/perfil');
        } else {
            return 'error';
        }
    }


}