<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/23/15
 * Time: 7:09 PM
 */
class Agenda_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getAllAgenda($id)
    {
        $this->db->where('id_medico', $id);
        return $this->db->get('agenda')->result();
    }

    public function add($data)
    {
        return $this->db->insert('agenda',$data);
    }

    public function getAgendaById($id)
    {
        $this->db->where('id_agenda', $id);
        return $this->db->get('agenda')->result();
    }

    public function update($id,$data)
    {
        $this->db->where('id_agenda', $id);
        return $this->db->update('agenda', $data);
    }

    public function remove($id)
    {
        $this->db->where('id_agenda', $id);
        return $this->db->delete('agenda');
    }

}