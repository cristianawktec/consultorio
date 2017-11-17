<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/2/15
 * Time: 10:11 AM
 */
class Endereco_Model extends CI_Model
{
    var $id_endereco;
    var $nm_endereco;
    var $nr_endereco;
    var $nr_cep;
    var $nm_bairro;
    var $nm_cidade;
    var $nm_estado;
    var $ds_observacao;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($endereco)
    {
        return $this->db->insert('enderecos',$endereco);
    }

    public function getLastEndereco()
    {
        $this->db->order_by("id_endereco", "desc");
        $this->db->limit(1);
        return $this->db->get('enderecos')->result();
    }

    public function getEnderecoUsuarioById($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('enderecos as e', 'e.id_endereco = u.id_endereco');
        $this->db->where('u.id_usuario', $id);
        return $this->db->get()->result();
    }

    public function getEnderecoById($id)
    {
        $this->db->where('id_endereco', $id);
        return $this->db->get('enderecos')->result();
    }

}