<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 20/11/2017
 * Time: 21:17
 */

class Planos_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getAllPlanos()
    {
        $this->db->order_by("nm_plano","asc");
        return $this->db->get('planos')->result();
    }



}