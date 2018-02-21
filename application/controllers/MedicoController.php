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
        $this->load->model('Paciente_Model','paciente');
        $this->load->model('Charts_model','charts');
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
        $dados['todasConsultas'] = $this->consulta->getAllConsultaId($id);
        $dados['ConsultasCanceladas'] = $this->consulta->getAllConsultasCanceladas($id);
        $dados['ConsultasConfirmadas'] = $this->consulta->getAllConsultasConfirmadas($id);
        $dados['ConsultasReagendadas'] = $this->consulta->getAllConsultasReagendadas($id);
        $dados['especializacoes'] = $this->db->get('especializacao')->result();
        $dados['notas'] = $this->medico->getNotas($id);
        $dados['noticias'] = $this->noticia->getAllNoticia2();
        $dados['pagamentos'] = $this->pagamento->getAllPagamentoByIdMedico($id);
        $dados['pagamentos2'] = $this->pagamento->getAllPagamentoByIdMedico2($id);
        $dados['plano'] = $this->usuario->getPlanoId($id);
        $dados['numeroPacientes'] = $this->usuario->getNumeroPacientes($id);
        $dados['pacientes'] = $this->paciente->getAllPacienteMedicoById($id);

        //grafico
        $dados['confirmadas'] = $this->charts->confirmadas($id);
        $dados['canceladas'] = $this->charts->canceladas($id);
        $dados['reagendadas'] = $this->charts->reagendadas($id);

        //echo"<br>dados: <pre>";print_r($dados['agenda']);echo"</pre>";exit;
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

    public function update_plano($id)
    {
        $dados['plano'] = $this->usuario->getPlanoId($id);
        //echo"<pre>";print_r($dados['plano']);echo"</pre>";exit;
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_plano.php", $dados);
        $this->load->view('layout_principal/footer');
    }

    public function mudar_plano($id)
    {   //echo"<pre>";print_r($_POST);echo"</pre>";exit;
        $dadosMedicoPlano['id_usuario'] = $this->input->post('id_usuario');
        $dadosMedicoPlano['id_plano'] = $this->input->post('id_plano');
        $this->db->where('id_usuario', $id)->update('usuarios',$dadosMedicoPlano);
        return redirect('/medico/perfil');
    }

    public function mudar_valorConsutla1($id)
    {   //echo"<pre>mudar: ".$id;exit;
        $data['valor'] = $this->medico->getMedicoById($id);
        //echo"<pre>controller: ";print_r($data);echo"</pre>";exit;
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_valor", $data);
        $this->load->view('layout_principal/footer');
    }

    public function updated_valor1($id)
    {   //echo"<pre>controler: ".$id;print_r($_POST);echo"</pre>";exit;
        $dadosMedicoValor['id_usuario'] = $id;
        $dadosMedicoValor['vr_consulta1'] = $this->input->post('vr_consulta1');
        $this->db->where('id_usuario', $id)->update('medicos',$dadosMedicoValor);
        return redirect('/medico/perfil');
    }

    public function mudar_valorConsutla2($id)
    {   //echo"<pre>mudar: ".$id;exit;
        $data['valor'] = $this->medico->getMedicoById($id);
        //echo"<pre>controller: ";print_r($data);echo"</pre>";exit;
        $this->load->view('layout_principal/top');
        $this->load->view("template_medico/update_valor2", $data);
        $this->load->view('layout_principal/footer');
    }

    public function updated_valor2($id)
    {   //echo"<pre>controler: ".$id;print_r($_POST);echo"</pre>";exit;
        $dadosMedicoValor['id_usuario'] = $id;
        $dadosMedicoValor['vr_consulta2'] = $this->input->post('vr_consulta2');
        $this->db->where('id_usuario', $id)->update('medicos',$dadosMedicoValor);
        return redirect('/medico/perfil');
    }
}