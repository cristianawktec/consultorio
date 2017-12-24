<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/3/15
 * Time: 8:00 PM
 */
class MedicoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')->id_usuario || !$this->session->userdata('logado')) {
            redirect(base_url('/login'));
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model('Usuario_model','usuario');
        $this->load->model('Endereco_Model','endereco');
        $this->load->model('Medico_Model','medico');
        $this->load->model('Agenda_Model','agenda');
        $this->load->model('Consulta_Model','consulta');
        $this->load->model('AgendaConsulta_Model','agendaConsulta');
        $this->load->model('Noticia_Model', 'noticia');
        $this->load->model('Pagamento_Model', 'pagamento');
    }

    public function perfil()
    {
        $id = $this->session->usuario->id_usuario;
        
        $dados['medico'] = $this->usuario->getUsuarioById($id);
        $dados['especialidades'] = $this->medico->getEspecialidade($id);
        $dados['endereços'] = $this->endereco->getEnderecoUsuarioById($id);
        $dados['agenda'] = $this->agenda->getAllAgenda($id);
        $dados['agendaConsultas'] = $this->agendaConsulta->getAllAgendaConsulta($id);
        $dados['agendaDia'] = $this->agendaConsulta->getAllAgendaConsultaHoje($id);
        $dados['consultas'] = $this->consulta->getAllConsultaByDoctorId($id);
        $dados['especializacoes'] = $this->db->get('especializacao')->result();
        $dados['notas'] = $this->medico->getNotas($id);
        $dados['noticias'] = $this->noticia->getAllNoticia2();
        $dados['pagamentos'] = $this->pagamento->getAllPagamentoByIdMedico($id);
        $dados['pagamentos2'] = $this->pagamento->getAllPagamentoByIdMedico2($id);

        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/meus_dados", $dados);
        $this->load->view('layout_principal/footer');
    }

    public function update_image()
    {
        $id_usuario = $this->input->post('id_usuario');
        $data['imagem'] = $this->do_upload('image',$id_usuario);
        if ($this->medico->upload_image($id_usuario,$data)) {
            return redirect('/medico/perfil');
        } else {
            return "error ao upload!";
        }

    }

    public function do_upload($name, $id_usuario)
    {
        if (file_exists("./assets/img/archive/doctor/img/" . $id_usuario)) {
           // echo "O arquivo $filename existe";
        } else {
            mkdir("./assets/img/archive/doctor/img/" . $id_usuario, 0777);
        }
        $config['upload_path']          = './assets/img/archive/doctor/img/' . $id_usuario . '/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 50000;
        $config['max_height']           = 50000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($name))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('/banner/adicionar', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            return $data['upload_data']['file_name'];
        }
    }

    public function new_specialty()
    {   //echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $dadosMedicoEspecializacao['id_medico'] = $this->input->post('id_usuario');
        $dadosMedicoEspecializacao['id_especializacao'] = $this->input->post('id_especializacao');
        $this->db->insert('medicos_especializacao', $dadosMedicoEspecializacao);
        return redirect('/medico/perfil');
    }

    public function updated_specialty()
    {
        $data['especializacoes'] = $this->db->get('especializacao')->result();
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_especialidade.php", $data);
        $this->load->view('layout_principal/footer');
    }

    public function removeSpecialty()
    {
        $this->db->where('id_medico', $this->input->post('id_medico'));
        $this->db->where('id_especializacao', $this->input->post('id_especializacao'));
        $this->db->delete('medicos_especializacao');
        return true;
    }


}