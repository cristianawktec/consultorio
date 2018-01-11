<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/22/15
 * Time: 12:37 PM
 */
class AgendaConsulta_Model extends  CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Consulta_Model','consulta');
        $this->load->model('Paciente_Model', 'paciente');
    }

    public function getAllAgendaConsulta($id_medico)
    {
        $this->db->where('id_medico', $id_medico);
        return $this->db->get('agenda_consulta')->result();
    }

    public function getAllAgendaConsultaHoje($id_medico)
    {
        $date = date('Y-m-d');
        $this->db->where('id_medico', $id_medico);
        $this->db->like('data_inicio', $date);
        //$r = $this->db->get('agenda_consulta')->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get('agenda_consulta')->result();
    }

    public function addAgenda($id_consulta)
    {
        $consulta = $this->consulta->getConsultaById($id_consulta);


        $data['data_inicio'] = $consulta[0]->dt_consulta . " " . $consulta[0]->hr_inicio;
        $data['data_final'] = $consulta[0]->dt_consulta . " " . date('H:i:s', strtotime('+1 hour', strtotime($consulta[0]->hr_inicio)));
        $data['id_medico'] = $consulta[0]->id_medico;
        $data['id_paciente'] = $consulta[0]->id_paciente;
        $data['id_consulta'] = $id_consulta;
        $paciente = $this->paciente->getPacienteById($consulta[0]->id_paciente);
        $data['descricao'] = "[ ".$consulta[0]->nm_consulta . " ] - " . $paciente[0]->nm_paciente;
        $data['feito'] = 0;

        $this->db->insert('agenda_consulta', $data);

    }

    public function updateDay($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('agenda_consulta', $data);
    }

    public function getAgendaConsultById($id)
    {
        $this->db->select('*');
        $this->db->from('agenda_consulta as ac');
        $this->db->join('consultas as c', 'c.id_consulta = ac.id_consulta');
        $this->db->where('ac.id', $id);
        return $this->db->get()->result();

    }

}