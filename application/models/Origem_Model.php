<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 16/08/2017
 * Time: 11:49
 */
class Origem_Model extends CI_Model
{
    var $id_origem;
    var $nm_origem;
    var $ds_origem;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($origem)
    {
        return $this->db->insert('origem',$origem);
    }

    public function getOrigemById($id)
    {
        $this->db->select('*');
        $this->db->from('origem as o');
        $this->db->join('usuarios as u', 'u.id_origem = o.id_origem');
        $this->db->where('u.id_origem', $id);
        return $this->db->get()->result();

    }

    public function getAllOrigem()
    {
        $this->db->select('*');
        $this->db->from('origem as o');
        $this->db->join('usuarios as u', 'u.id_origem = o.id_origem');
        return $this->db->get()->result();

    }



}

