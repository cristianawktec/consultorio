<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 30/07/2017
 * Time: 18:08
 */

class DashboardCrmController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuarioCrm')->id || !$this->session->userdata('logado')) {
            redirect(base_url('crm/login'));
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model('Crm_Usuario_Model','usuario');
        $this->load->model('Crm_Paciente_Model','paciente');
        $this->load->model('Arquivo_Model','arquivo');
        $this->load->helper('download');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/index');
    }

    public function usuario()
    {
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $data['registros'] = $this->Crm_Usuario_Model->getAllUsuario();
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/usuario',$data);
    }

    public function usuario_senha()
    {
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/usuario_senha');
    }

    function editar($id)
    {
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $data['registros'] = $this->Crm_Usuario_Model->editar($id);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/editar_usuario',$data);
    }

    function atualizar()
    {
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->atualizar();
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/usuario',$data);
        redirect('crm/dashboard/usuario');
    }

    function novo(){
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/adicionar_usuario');
    }

    function adicionar(){
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->adicionar();
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/adicionar_usuario',$data);
        redirect('crm/dashboard/usuario');
    }

    function deletar($id){
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->excluir($id);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/usuario',$data);
        redirect('crm/dashboard/usuario');
    }

    public function lembretes()
    {
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $data['registros'] = $this->Crm_Usuario_Model->getLembretesAll($idmedico);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/listar_lembretes',$data);
    }

    function editarLembrete($id)
    {
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $data['registros'] = $this->Crm_Usuario_Model->editarLembrete($id);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/editar_lembrete',$data);
    }

    function atualizar_lembrete()
    {
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->atualizarLembrete();
        $this->load->view('layout_principal_crm/menu');
        redirect('crm/dashboard/lembretes');
    }

    function NovoLembrete(){
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/adicionar_lembrete');
    }

    function AdicionarLembrete(){
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->AdicionarLembrete();
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/adicionar_lembrete',$data);
        redirect('crm/dashboard/lembretes');
    }

    function deletarLembrete($id){
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->excluirLembrete($id);
        $this->load->view('layout_principal_crm/menu');
        redirect('crm/dashboard/lembretes');
    }

    public function bancoArquivos()
    {
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $data['registros'] = $this->Crm_Usuario_Model->getArquivoAll($idmedico);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/listar_arquivos',$data);
    }

    function NovoArquivo()
    {
        $this->load->view('layout_principal_crm/menu');
        //carregar o select de pacientes
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->model("Crm_Paciente_Model");
        $pacientes = $this->Crm_Paciente_Model->getArquivoPacienteMedico($idmedico);

        $option = "<option value=''></option>";
        foreach($pacientes as $linha) {
            $option .= "<option value='$linha->id_usuario'>$linha->nm_paciente</option>";
        }
        $variaveis['options_pacientes'] = $option;
        $this->load->view('template_dashboard_crm/adicionar_arquivo',$variaveis);
    }

    function adicionarArquivos()
    {
        //echo"<pre>pacientes: ";print_r($_POST);echo"</pre>";exit;
        $idpaciente = $this->input->post('arquivo_paciente_id');
        $idmedico = $this->input->post('arquivo_medico_id');

        $data['arquivo_nome'] = $this->do_upload('arquivo_nome',$idpaciente, $idmedico);

        $data = array(
            'arquivo_medico_id'=>$idmedico,
            'arquivo_paciente_id'=>$idpaciente,
            'arquivo_nome'=>$data['arquivo_nome'],
            'arquivo_data'=>$this->input->post('arquivo_data')
        );

        if ($this->arquivo->upload_doc($data)) {
            return redirect('crm/dashboard/bancoArquivos');
        } else {
            return "error ao upload!";
        }
    }

    public function do_upload($name, $idpaciente, $idmedico)
    {
        if (file_exists("./assets/arquivos/" . $idpaciente)) {
             //echo "O arquivo $filename existe";
        } else {
            mkdir("./assets/arquivos/" . $idpaciente, 0777);
        }
        $config['upload_path']          = './assets/arquivos/' . $idpaciente . '/';
        $config['allowed_types']        = 'jpg|png|gif|pdf|zip|rar|doc|docx|xls';
        $config['max_size']             = 50000;
        $config['max_width']            = 50000;
        $config['max_height']           = 50000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($name))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('crm/dashboard/bancoArquivos', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }

    public function Download($id, $nome){
        $baseurl = base_url('assets');
        $arquivoPath = $baseurl.'/arquivos/'.$id."/".$nome;
        $url = $arquivoPath;

        $handle = fopen($url, 'r');
        $meta_data = stream_get_meta_data($handle);

        // Repassa todos os headers do servidor remoto para o nosso cliente
        foreach ( $meta_data['wrapper_data'] as $header ) {
            header($header);
        }
        // Repassa o conteúdo para o nosso cliente
        fpassthru($handle);
    }

    function remover_arquivo($id){
        $this->load->helper('form');
        $this->load->model('Crm_Usuario_Model');
        $this->Crm_Usuario_Model->excluirArquivo($id);
        $this->load->view('layout_principal_crm/menu');
        redirect('crm/dashboard/bancoArquivos');
    }

}