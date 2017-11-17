<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 1/28/16
 * Time: 9:25 PM
 */
class Relatorio_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function relatorioPaciente()
    {
        $this->db->from('consultas as c');
        $this->db->join('pacientes as p', 'p.id_usuario = c.id_paciente');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        $this->db->where('id_medico', $this->session->usuario->id_usuario);
        $this->db->order_by("p.nm_paciente", "desc");
        return $this->db->get()->result();
    }

    public function financeiroReport()
    {
        $this->db->from('pagamentos as p');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        $this->db->where('p.id_usuario', $this->session->usuario->id_usuario);
        $this->db->order_by("p.dt_pagamento", "desc");
        return $this->db->get()->result();
    }

    public function relatorioConsultaConfirmada()
    {
        $this->db->from('consultas as c');
        $this->db->join('pacientes as p', 'p.id_usuario = c.id_paciente');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        $this->db->where('id_medico', $this->session->usuario->id_usuario);
        $this->db->where('ch_confirmacao', '1');
        $this->db->order_by("p.nm_paciente", "desc");
        //$arrqy= $this->db->get()->result();echo"<pre>";print_r($arrqy);echo"</pre>";die;
        return $this->db->get()->result();
    }

    public function relatorioConsultaCancelada()
    {
        $this->db->from('consultas as c');
        $this->db->join('pacientes as p', 'p.id_usuario = c.id_paciente');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        $this->db->where('id_medico', $this->session->usuario->id_usuario);
        $this->db->where('ch_confirmacao', '2');
        $this->db->order_by("p.nm_paciente", "desc");
        return $this->db->get()->result();
    }

}