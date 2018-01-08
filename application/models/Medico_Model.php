<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/2/15
 * Time: 11:40 AM
 */
class Medico_Model extends CI_Model
{
    var $id_usuario;
    var $nm_medico;
    var $ch_sexo;
    var $nr_cpf;
    var $nr_rg;
    var $nm_conselho;
    var $nr_conselho;
    var $nr_cnes;
    var $ds_observacao;
    var $ch_ativo;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($medico)
    {
        return $this->db->insert('medicos',$medico);
    }

    public function medicoxpaciente($dados)
    {
        return $this->db->insert('medicos_pacientes',$dados);
    }

    public function getLastMedico()
    {
        $this->db->order_by("id_usuario", "desc");
        $this->db->limit(1);
        return $this->db->get('medicos')->result();
    }

    public function getEspecialidade($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('medicos_especializacao as me', 'me.id_medico = u.id_usuario');
        $this->db->join('especializacao as e', 'e.id_especializacao = me.id_especializacao');
        $this->db->where('u.id_usuario', $id);
        return $this->db->get()->result();
    }

    public function searchMedico($cep, $especilidade)
    {

        $cep = explode('-',$cep);
        $cep = $cep[0];
        //echo"<br>cep:".$cep;
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('medicos_especializacao as me', 'me.id_medico = u.id_usuario');
        $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        $this->db->join('especializacao as e', 'e.id_especializacao = me.id_especializacao');
        $this->db->join('enderecos as end', 'end.id_endereco = u.id_endereco');
        $this->db->where('e.id_especializacao', $especilidade);
        if($cep!=""){
            $this->db->like('end.nr_cep',$cep);
        }
        //$query = $this->db->get();
        //$res = $this->db->get()->result();
        //echo"<pre>";print_r($query);echo"</pre>";die;
        return $this->db->get()->result();
    }

    public function upload_image($id_usuario,$data)
    {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('medicos', $data);
    }

    public function getMedicoById($id_medico)
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        $this->db->where('u.id_usuario', $id_medico);
        return $this->db->get()->result();
    }

    public function getAllMedico()
    {
        $this->db->select('*');
        $this->db->from('usuarios as u');
        $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        //$result = $this->db->get()->result();echo"<br><pre>medicos: ";print_r($result);echo"</pre>";
        return $this->db->get()->result();
    }

    public  function update($id, $data)
    {
        $this->db->where('id_usuario', $id);
        return $this->db->update('medicos', $data);
    }

    public function getNotas($id)
    {
        $this->db->select('n.data_cadastro,p.nm_paciente, n.id_medico,n.id_consulta, n.nota');
        $this->db->from('consulta_medico_avaliacao as n');
        $this->db->join('consultas as c','n.id_consulta = c.id_consulta');
        $this->db->join('pacientes as p','p.id_usuario = c.id_paciente');
        $this->db->where('n.id_medico', $id);
        return $this->db->get()->result();
    }

    public function avaliacao()
    {
        $this->db->select('n.data_cadastro,p.nm_paciente, n.id_medico,n.id_consulta, n.nota');
        $this->db->from('consulta_medico_avaliacao as n');
        $this->db->join('consultas as c','n.id_consulta = c.id_consulta');
        $this->db->join('pacientes as p','p.id_usuario = c.id_paciente');
        return $this->db->get()->result();
    }


}