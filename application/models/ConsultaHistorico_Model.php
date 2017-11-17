<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 1/9/16
 * Time: 1:15 PM
 */
class ConsultaHistorico_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getHistoricoById($id)
    {
        $this->db->where('id_consulta', $id);
        return $this->db->get('consulta_historico')->result();
    }

}