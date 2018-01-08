<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/27/15
 * Time: 10:43 PM
 */
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model','usuario');
    }

    public function index()
    {
        $this->load->view('layout_principal/top');
        $this->load->view("template_login/form_login.php");
        $this->load->view('layout_principal/footer');
    }

    public function auth()
    {
        $ajax = $this->input->post('requisicao');
        $urlRetorno = $this->input->post('urlRetorno');

        $nm_login = $this->input->post('email');
        $ps_login = md5($this->input->post('ps_login'));
        $txt = $this->usuario->login($nm_login, $ps_login);//vai em usuario_model.php:44
        //echo"<br>autenticando com txt:<pre> ";print_r($_SESSION['usuario']);echo"</pre>";exit;
        if (!empty($txt)){
            //echo"<pre>";print_r($txt);echo"</pre>";die;
            if ($txt['id_perfil'] == 1) {
                if($ajax == 'ajax'){
                    echo json_encode( array( 'logado' => true ) );
                } else {
                    return redirect('/paciente/perfil');
                }
            } elseif($txt['id_perfil'] == 2 && $txt['saldoDevedor'] == true){//echo"<br>aqui1";exit;
                    $msg = "Você possui mensalidades em aberto neste mês! <a href='/pagamento/medico/" . $txt['id_usuario'] . "/" . $txt['id_plano'] ."'>clique aqui</a> para realizar o pagamento!";
                    $this->session->set_flashdata('msg2', $msg);
                    return redirect('/login');
            } else {//plano free
                $id = $_SESSION['usuario']->id_usuario;
                $n_pacientes = $this->usuario->getNumeroPacientes($id);//vai em usuario_model.php:146
                $num_paciente = $n_pacientes['0'];
                $pacientes = $num_paciente->num_paciente;

                $consultas = $this->usuario->getNumeroConsultas($id);
                $num_consultas = $consultas['0'];
                $consultas = $num_consultas->consultas;

                if ($pacientes == '25'){
                    $msg = "Você Atingiu o Limite Máximo de Pacientes, <a href='/medico/perfil'>clique aqui</a> para Mudar de Plano! ";
                    $this->session->set_flashdata('msg2', $msg);
                    return redirect('/login');
                }elseif($consultas == '15'){
                    $msg = "<font color='red' size='3'><B> Você Atingiu o Limite Máximo de Consultas Agendadas, <a href='/medico/perfil'><font color='red' size='3'><B>CLIQUE AQUI!</B></font></a> para Mudar de Plano!</B></font> ";
                    $this->session->set_flashdata('msg2', $msg);
                    return redirect('/login');
                }
                else {
                    return redirect('/medico/perfil');
                }
            }
        } else {//echo"<br>aqui3";exit;
            $this->session->set_flashdata('msg', 'Error! - Verifique seu login ou senha!');
            if($txt['id_perfil'] == 2 && $txt['saldoDevedor'] == true){
                echo "aqui";die;
                $this->session->set_flashdata('msg2', 'Você possui mensalidades em aberto neste mês!');
            }
            return redirect('/login');
        }

    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('/'));
    }




}