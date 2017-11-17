<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/31/15
 * Time: 11:19 AM
 */

class Usuario_Model extends CI_Model{
    var $id_usuario;
    var $nm_login;
    var $nm_login_hash;
    var $ps_login;
    var $ps_login_hash;
    var $id_endereco;
    var $id_perfil;
    var $ch_remocao;
    var $ds_observacao;
    var $email;
    var $data_cadastro;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($usuario)
    {
        return $this->db->insert('usuarios',$usuario);
    }

    public function getLastUsuario()
    {
        $this->db->order_by("id_usuario", "desc");
        $this->db->limit(1);
        return $this->db->get('usuarios')->result();
    }

    /**
     * @param $nm_login
     * @param $ps_login
     * @return array|bool
     */
    public function login($nm_login, $ps_login)
    {
        $today = date('Y-m');
        $this->db->where('nm_login', $nm_login);
        $this->db->where('ps_login', $ps_login);
        $data = $this->db->get('usuarios')->result();
        $dt_atual = date('d');

        if (count($data)===1){
            if ($data[0]->id_perfil == 2) {
                    if ($this->validaMensalidade($data[0]->id_usuario, $today)) {
                        $dados = array('usuario' => $data[0], 'logado' => TRUE);
                        $this->session->set_userdata($dados);
                        $this->session->usuario;
                        $res = $this->session->usuario;
                        return $data[0]->id_usuario;
                    } else {
                        if($dt_atual < 20) {
                            $dados = array('usuario' => $data[0], 'logado' => TRUE);
                            $this->session->set_userdata($dados);
                            $this->session->usuario;
                            $res = $this->session->usuario;
                            return $data[0]->id_usuario;
                        } else {
                            return $result = array('id_usuario' => $data[0]->id_usuario, 'id_perfil' => $data[0]->id_perfil, 'saldoDevedor' => true);
                        }
                }
            } else {
                $dados = array('usuario' => $data[0], 'logado' => TRUE);
                $this->session->set_userdata($dados);
                return $result =  array('id_perfil' => $data[0]->id_perfil, 'saldoDevedor' => false);
            }
        }
        return false;
    }

    public function getUsuarioById($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        if ($this->session->usuario->id_perfil == 1) {
            $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        } else {
            $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        }
        $this->db->where('u.id_usuario', $id);
        return $this->db->get()->result();

    }

    public function update_password($id, $ps_login)
    {
        $dados['ps_login'] = md5($ps_login);
        $dados['ps_login_hash'] = $dados['ps_login'];
        return $this->db->where('id_usuario', $id)->update('usuarios',$dados);
    }

    public function pesquisa($nome, $cpf)
    {
        //$this->db->like('nr_cpf', $cpf);
        $this->db->like('nm_paciente', $nome);
        return $this->db->get('pacientes')->result();
    }

    public function validaMensalidade($id_usuario, $today)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('statusTransacao', 1);
        $this->db->like('dt_pagamento', $today);
        return $this->db->get('pagamentos')->result();
    }



}