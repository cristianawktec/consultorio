<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 28/08/2017
 * Time: 9:02
 */

class Prospecto_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($prospecto)
    {
        return $this->db->insert('prospectos',$prospecto);
    }

    public function getProspectoById($idprospecto)
    {
        $this->db->select('*');
        $this->db->from('prospectos ');
        $this->db->where('id', $idprospecto);
        return $this->db->get()->result();

    }

    public function getAllProspecto($idmedico)
    {
        $this->db->select('*');
        $this->db->from('prospectos');
        $this->db->where('id', $idmedico);
        return $this->db->get()->result();

    }

    public function getLastUsuario()
    {
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        return $this->db->get('prospectos')->result();
    }



}