<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/28/15
 * Time: 12:32 PM
 */
class Consulta_Model extends  CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create_consult($data)
    {
        //echo"<br>e agora como fazer a data chegar no formato do banco?<br>ta tudo em OO não faço ideia :p ";die;
        return $this->db->insert('consultas', $data);
    }

    public function getConsultaPacienteId($id)
    {
        $this->db->from('consultas as c');
        $this->db->join('medicos as m', 'c.id_medico = m.id_usuario');
        $this->db->join('pacientes as p', 'c.id_paciente = p.id_usuario');
        $this->db->where('id_paciente', $id);
        $this->db->order_by("dt_consulta", "desc");
        return $this->db->get()->result();
    }

    public function getAllConsultaByDoctorId($id)
    {   //echo"<br>id: ".$id."<br>";
        $this->db->from('consultas as c');
        $this->db->join('pacientes as p', 'p.id_usuario = c.id_paciente');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        $this->db->where('id_medico', $id);
        $this->db->order_by("dt_consulta", "desc");
        //$r = $this->db->get()->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get()->result();
    }

    public function getAllConsulta()
    {
        $this->db->from('consultas as c');
        $this->db->join('pacientes as p', 'p.id_usuario = c.id_paciente');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        return $this->db->get()->result();
    }

    public function getAllConsultaId($id)
    {
        $this->db->select('*');
        $this->db->from('consultas');
        $this->db->where('id_medico', $id);
        //$query = $this->db->get('consultas');echo"<br>sql: ".$query;exit;
        //$r = $this->db->get()->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get()->result();
    }

    public function getAllConsultasCanceladas($id)
    {
        $this->db->select('dt_consulta');
        $this->db->from('consultas');
        $this->db->where('id_medico', $id);
        $this->db->where('ch_confirmacao', '2');
        //$query = $this->db->get('consultas');echo"<br>sql: ".$query;
        //$r = $this->db->get()->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get()->result();
    }

    public function getAllConsultasConfirmadas($id)
    {
        $this->db->select('dt_consulta');
        $this->db->from('consultas');
        $this->db->where('id_medico', $id);
        $this->db->where('ch_confirmacao', '1');
        //$query = $this->db->get('consultas');echo"<br>sql: ".$query;
        //$r = $this->db->get()->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get()->result();
    }

    public function getAllConsultasReagendadas($id)
    {
        $this->db->select('dt_consulta');
        $this->db->from('consultas');
        $this->db->where('id_medico', $id);
        $this->db->where('ch_confirmacao', '4');
        //$query = $this->db->get('consultas');echo"<br>sql: ".$query;
        //$r = $this->db->get()->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get()->result();
    }


    public function confirmConsult($id_consulta, $data)
    {
        $this->db->where('id_consulta', $id_consulta);
        return $this->db->update('consultas', $data);
    }

    public function getConsultaById($id)
    {
        $this->db->from('consultas as c');
        $this->db->join('medicos as m', 'c.id_medico = m.id_usuario');
        $this->db->where('id_consulta', $id);
        return $this->db->get()->result();
    }

    public function updateDateConsult($id, $data)
    {
        $data['ch_confirmacao'] = 4;
        $this->db->where('id_consulta', $id);
        return $this->db->update('consultas', $data);
    }

    public function updateStatus($id_consulta)
    {
        $data['ch_confirmacao'] = 2;
        $this->db->where('id_consulta', $id_consulta);
        return $this->db->update('consultas', $data);
    }



}