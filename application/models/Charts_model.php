<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 13/02/2018
 * Time: 15:05
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts_model extends CI_Model
{

    public function medicos()
    {   //echo"<br>estou no model do grafico";
        $points = $this->db->select("id_plano")->from("usuarios")->get()->result();
        //echo"<br><pre>total: ";print_r($points);echo"</pre>";exit;
        return $points;
        /*$data = array();
        foreach( $points as $point )
        {
            array_push($data, intval($point->points));
        }
        return $data;
        */
    }

    public function plano1()
    {
        $query = $this->db->query('select id_plano from usuarios where id_plano = 1');
        return $query->num_rows();
    }
    public function plano2()
    {
        $query = $this->db->query('select id_plano from usuarios where id_plano = 2');
        return $query->num_rows();
    }
    public function plano3()
    {
        $query = $this->db->query('select id_plano from usuarios where id_plano = 3');
        return $query->num_rows();
    }

    //Consultas Confirmadas
    public function confirmadas($id)
    {
        $query = $this->db->query("SELECT dt_consulta FROM consultas WHERE id_medico = '$id' AND ch_confirmacao = '1' ");
        return $query->num_rows();
    }
    //Consultas Canceladas
    public function canceladas($id)
    {
        $query = $this->db->query("SELECT dt_consulta FROM consultas WHERE id_medico = '$id' AND ch_confirmacao = '2' ");
        return $query->num_rows();
    }
    //Consultas Reagendadas
    public function reagendadas($id)
    {
        $query = $this->db->query("SELECT dt_consulta FROM consultas WHERE id_medico = '$id' AND ch_confirmacao = '4' ");
        return $query->num_rows();
    }

    public function basic()
    {
        $points = $this->db->select("points")->from("basic")->get()->result();

        $data = array();

        foreach( $points as $point )
        {
            array_push($data, intval($point->points));
        }
        return $data;
    }

    public function advanced()
    {
        $usersQuery = $this->db->select("
            SUM(if(u.popular = 2, 1, 0)) AS popul,
            SUM(if(u.popular = 1, 1, 0)) AS user,
            c.name as catName",
            false
        )
            ->from("users u")
            ->join("categories c", "u.categoryId = c.id")
            ->group_by("c.id")
            ->get()
            ->result_array();

        $data = array();
        $categories = array();

        foreach( $usersQuery as $user )
        {
            $data['users']['data'][] = intval($user['user']);
            $data['popul']['data'][] = intval($user['popul']);
            $categories["axis"][] = $user['catName'];
        }

        return array(
            "users" => $data["users"]["data"],
            "popul" => $data["popul"]["data"],
            "categories" => array_unique($categories["axis"])
        );
    }
}