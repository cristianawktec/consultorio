<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 2/9/16
 * Time: 12:31 PM
 */
class Noticia_Model extends CI_Model
{

    public function getAllNoticia()
    {
        return $this->db->get('noticias')->result();
    }

    public function getAllNoticia2()
    {
        $this->db->order_by('data','desc');
        $this->db->limit(3);
        return $this->db->get('noticias')->result();
    }

    public function add($data)
    {
        return $this->db->insert('noticias', $data);
    }

    public function getNoticiaById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('noticias')->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('noticias', $data);
    }


}