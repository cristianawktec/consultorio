<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/21/15
 * Time: 12:00 PM
 */
class Especialidade_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getAllEspecialidade()
    {
        $this->db->order_by("nm_especializacao","asc");
        return $this->db->get('especializacao')->result();
    }



}