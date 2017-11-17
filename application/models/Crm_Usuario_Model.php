<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 01/08/2017
 * Time: 12:47
 */

class Crm_Usuario_Model extends CI_Model{

    var $id;
    var $usuario;
    var $senha;
    var $nivel;

    public function __construct()
    {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');

        // Load session library
        $this->load->library('session');

        // Load validation library
        $this->load->library('form_validation');
        $this->load->model('Lembrete_Model', 'lembrete');
    }


    public function getLastUsuario()
    {
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        return $this->db->get('crm_usuarios')->result();
    }

    public function getAllUsuario()
    {
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->db->select('*');
        $this->db->from('crm_usuarios');
        $this->db->where('id', $idmedico);
        return $this->db->get()->result();
    }

    function editar($id)
    {
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('crm_usuarios');
        //$res = $this->db->get()->result();echo"<pre><br>resultado model: ";print_r($res);echo"</pre>";exit;
        return $this->db->get()->result();
    }

    function excluir($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('crm_usuarios');
    }

    function atualizar()
    {
        $data = array(
            'nome'=>$_POST['nome'],
            'usuario'=>$_POST['usuario'],
            'senha'=>$_POST['senha'],
            'nivel'=>$_POST['nivel']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('crm_usuarios', $data);
    }

    public function adicionar()
    {
        $data = array(
            'nome'=>$_POST['nome'],
            'usuario'=>$_POST['usuario'],
            'senha'=>$_POST['senha'],
            'nivel'=>$_POST['nivel']
        );
        $this->db->insert('crm_usuarios', $data);
    }

    public function editarLembrete($idlembrete)
    {
        $this->db->select('*');
        $this->db->from('lembretes');
        $this->db->where('lembrete_id', $idlembrete);
        return $this->db->get()->result();
    }

    public function getLembretesAll($idmedico)
    {
        $this->db->select('*');
        $this->db->from('lembretes');
        $this->db->where('lembrete_medico_id', $idmedico);
        return $this->db->get()->result();
    }

    function atualizarLembrete()
    {   //echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $data2 = explode('/',$_POST['lembrete_data']);
        $_POST['lembrete_data'] = $data2['2']."-".$data2['1']."-".$data2['0'];
        $hora = substr($_POST['lembrete_hora'],0,2);
        $minuto = substr($_POST['lembrete_hora'],3,2);
        $lembrete = array(
            'lembrete_titulo'=>$_POST['lembrete_titulo'],
            'lembrete_data'=>$_POST['lembrete_data'],
            'lembrete_hora'=>$hora,
            'lembrete_minuto'=>$minuto,
            'lembrete_mensagem'=>$_POST['lembrete_mensagem']
        );
        $this->db->where('lembrete_id', $_POST['lembrete_id']);
        $this->db->update('lembretes', $lembrete);
    }

    public function AdicionarLembrete()
    {   //echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $dados['lembrete_medico_id'] = $this->input->post('id_medico');
        $dados['lembrete_titulo'] = $this->input->post('lembrete_titulo');
        $data = explode('/', $this->input->post('lembrete_data'));
        $data2 = $data[2] . "-" . $data[1] . "-" . $data[0];
        $dados['lembrete_data'] = $data2;
        $dados['lembrete_hora'] = $this->input->post('lembrete_hora');
        $dados['lembrete_minuto'] = $this->input->post('lembrete_minuto');
        $dados['lembrete_mensagem']= $this->input->post('lembrete_mensagem');

        if ($this->lembrete->adicionar($dados)) {
            return redirect('crm/dashboard/lembretes');
        } else {
            return "Error";
        }
    }

    function excluirLembrete($id)
    {
        $this->db->where('lembrete_id', $id);
        $this->db->delete('lembretes');
    }

    public function getArquivoAll($idmedico)
    {
        $this->db->select('a.arquivo_id, a.arquivo_paciente_id, a.arquivo_data, a.arquivo_nome, p.nm_paciente');
        $this->db->from('arquivos as a');
        $this->db->join('pacientes as p', 'p.id_usuario = a.arquivo_paciente_id');
        $this->db->where('a.arquivo_medico_id', $idmedico);
        //echo"<pre>";print_r($this->db->get()->result());echo"</pre>";exit;
        return $this->db->get()->result();
    }

    public function AdicionarArquivos()
    {   echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $dados['lembrete_medico_id'] = $this->input->post('id_medico');
        $dados['arquivo_nome'] = $this->input->post('arquivo_nome');
        $data = explode('/', $this->input->post('arquivo_data'));
        $data2 = $data[2] . "-" . $data[1] . "-" . $data[0];
        $dados['arquivo_data'] = $data2;
        $dados['arquivo_paciente']= $this->input->post('arquivo_paciente');

        if ($this->lembrete->adicionar($dados)) {
            return redirect('crm/dashboard/listar_arquivos');
        } else {
            return "Error";
        }
    }

    function excluirArquivo($id)
    {
        $this->db->where('arquivo_id', $id);
        $this->db->delete('arquivos');
    }


}