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
        $txt = $this->usuario->login($nm_login, $ps_login);

        if (!empty($txt)){
            //echo"<pre>";print_r($txt);echo"</pre>";die;
            if ($txt['id_perfil'] == 1) {
                if($ajax == 'ajax'){
                    echo json_encode( array( 'logado' => true ) );
                } else {
                    return redirect('/paciente/perfil');
                }
            } elseif($txt['id_perfil'] == 2 && $txt['saldoDevedor'] == true){
                    $msg = "Você possui mensalidades em aberto neste mês! <a href='/pagamento/medico/" . $txt['id_usuario'] . "'>clique aqui</a> para realizar o pagamento!";
                    $this->session->set_flashdata('msg2', $msg);
                    return redirect('/login');
            } else {
                return redirect('/medico/perfil');
            }
        } else {
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