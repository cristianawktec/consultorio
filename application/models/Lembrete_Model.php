<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 04/09/2017
 * Time: 20:26
 */

class Lembrete_Model extends CI_Model
{
    var $lembrete_titulo;
    var $lembrete_data;
    var $lembrete_hora;
    var $lembrete_minuto;
    var $lembrete_mensagem;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($lembrete)
    {
        return $this->db->insert('lembretes',$lembrete);
    }

    public function getLembreteById($id)
    {
        $this->db->select('*');
        $this->db->from('lembretes');
        $this->db->where('lembrete_paciente_id', $id);
        return $this->db->get()->result();

    }

    public function getAllOrigem()
    {
        $this->db->select('*');
        $this->db->from('lembretes');
        return $this->db->get()->result();

    }



}