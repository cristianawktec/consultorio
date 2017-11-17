<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 07/09/2017
 * Time: 17:36
 */

class Arquivo_Model extends CI_Model
{
    var $arquivo_id;
    var $arquivo_nome;
    var $arquivo_medico_id;
    var $arquivo_paciente_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function adicionar($arquivo)
    {
        return $this->db->insert('arquivos',$arquivo);
    }

    public function getArquivoById($id)
    {
        $this->db->select('*');
        $this->db->from('arquvios');
        $this->db->where('arquivo_medico_id', $id);
        return $this->db->get()->result();

    }

    public function getAllArquivo()
    {
        $this->db->select('*');
        $this->db->from('arquvios');
        return $this->db->get()->result();

    }

    public function upload_doc($data)
    {   //echo"<pre>data: ";print_r($data);echo"</pre>";exit;
        $arquivo_medico_id = $data['arquivo_medico_id'];
        $arquivo_paciente_id = $data['arquivo_paciente_id'];
        $arquivo_nome = $data['arquivo_nome'];
        $arquivo_data = $data['arquivo_data'];

        $this->db->set('arquivo_medico_id', $arquivo_medico_id);
        $this->db->set('arquivo_paciente_id', $arquivo_paciente_id);
        $this->db->set('arquivo_nome', $arquivo_nome);
        $this->db->set('arquivo_data', $arquivo_data);
        return $this->db->insert('arquivos');
    }

}