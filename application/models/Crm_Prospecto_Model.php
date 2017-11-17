<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 26/08/2017
 * Time: 11:34
 */

class Crm_Prospecto_Model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');

        // Load validation library
        $this->load->library('form_validation');
    }

    public  function getMedico()
    {
        return $this->session->userdata('usuarioCrm')->nome;
    }

    public function getProspectoMedico($id_medico)
    {
        $this->db->select('*');
        $this->db->from('prospectos');
        $this->db->where('id_medico', $id_medico);
        //$var = $this->db->get()->result();echo"<br><pre>sql: ";print_r($var);echo"</pre>";exit;
        return $this->db->get()->result();
    }

    public function getProspectoById($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        $this->db->where('u.id_usuario', $id);
        return $this->db->get()->result();

    }

    public function getAllProspecto()
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('pacientes as p', 'p.id_usuario = u.id_usuario');
        $this->db->order_by('u.id_usuario','asc');
        //$this->db->join('origem as o', 'p.id_usuario = u.id_usuario', 'left');
        //$this->db->where('u.id_origem');
        //echo"<br><pre>sql: ";print_r($this->db->get()->result());echo"</pre>";exit;
        return $this->db->get()->result();

    }

    public function adicionar()
    {
        echo"<br><pre>sql: ";print_r($_POST);echo"</pre>";exit;
        $dadosProspecto['id_medico'] = $this->input->post('id_medico');
        $dadosProspecto['nome'] = $this->input->post('nome');
        $dadosProspecto['nm_responsavel'] = $this->input->post('nm_responsavel');
        $dadosProspecto['email'] = $this->input->post('email');
        $dadosProspecto['nr_contato'] = $this->input->post('nr_contato');
        $dadosProspecto['cod_estados'] = $this->input->post('nm_estado');
        $dadosProspecto['cod_cidades'] = $this->input->post('nm_cidade');
        $dadosProspecto['data_cadastro'] = date('d/m/Y H:i:s', time());
        $dadosProspecto['id_perfil'] = $this->input->post('id_perfil');
        $dadosProspecto['fonte'] = $this->input->post('fonte');
        $dadosProspecto['template'] = $this->input->post('template');

        if ($this->prospecto->adicionar($dadosProspecto)) {
            $usuario = $this->prospecto->getLastUsuario();
        } else {
            return "Error";
            die;
        }
    }

    function editar($id)
    {
        $this->db->select('*');
        $this->db->from('prospectos');
        $this->db->where('id', $id);
        //$var = $this->db->get()->result();echo"<pre>";print_r($var);echo"</pre>";exit;
        return $this->db->get()->result();
    }

    function excluir($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('prospectos');
    }

    function atualizar()
    {   //echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $prospecto = array(
            'nome'=>$_POST['nome'],
            'nm_responsavel'=>$_POST['nm_responsavel'],
            'email'=>$_POST['email'],
            'fonte'=>$_POST['fonte'],
            'nr_contato'=>$_POST['nr_contato']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('prospectos', $prospecto);
    }

    function origem($id){
        $this->db->select('nm_origem');
        $this->db->from('usuarios as u');
        $this->db->join('origem as o', 'o.id_origem = u.id_origem');
        $this->db->where('u.id_origem',$id);
        $this->db->get()->result();
    }

    function getCidadesEstado() {
        //$estado = $this->db->get('estados')->result(); echo"<pre><br>estado: ";print_r($estado);echo"</pre>";exit;
        $cod_estados = $this->input->post("cod_estados");
        $this->db->select('*');
        $this->db->from('cidades');
        $this->db->where("estados_cod_estados", $cod_estados);
        $this->db->order_by("nome", "asc");
        $consulta = $this->db->get()->result();
        //echo"<pre>consulta: ";print_r($consulta);echo"</pre>";exit;
        return $consulta;
        //$estado = $this->db->get()->result(); echo"<pre><br>estado: ";print_r($estado);echo"</pre>";exit;
    }

    public function retorna_estados()
    {
        $this->db->select('*');
        $this->db->from('estados');
        $this->db->order_by("nome", "asc");
        $consulta = $this->db->get()->result();

        return $consulta;
    }

    function getCidades($id) {
        $this->db->select('cidades.cod_cidades, cidades.nome');
        $this->db->from('estados');
        $this->db->join('cidades', 'cidades.estados_cod_estados = estados.cod_estados');
        $this->db->where( array('estados.cod_estados' => $id) );
        return $this->db->get()->result();
    }

}