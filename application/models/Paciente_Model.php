<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/2/15
 * Time: 10:11 AM
 */
class Paciente_Model extends CI_Model
{
    var $id_usuario;
    var $nm_paciente;
    var $ch_sexo;
    var $ds_estado_civil;
    var $nr_cpf;
    var $nr_rg;
    var $dt_nascimento;
    var $nm_pai;
    var $nm_mae;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($paciente)
    {
        return $this->db->insert('pacientes',$paciente);
    }

    public function getPacienteById($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        $this->db->where('u.id_usuario', $id);
        return $this->db->get()->result();

    }

    public function getAllPaciente()
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        return $this->db->get()->result();

    }

    public function getAllPacienteMedicoById($id)
    {
        $this->db->select('*');
        $this->db->from('medicos_pacientes as m');
        $this->db->join('pacientes as p', 'p.id_usuario = m.id_paciente');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->where('m.id_medico', $id);
        //$r = $this->db->get()->result(); echo"<pre>";print_r($r);echo"</pre>";
        return $this->db->get()->result();

    }

}