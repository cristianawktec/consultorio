<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 27/07/2017
 * Time: 12:05
 */
class LoginCrmController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('layout_principal_crm/header');
        $this->load->view("template_login_crm/login");
        $this->load->view('layout_principal_crm/footer');
    }

    public function fullview()
    {
        $this->load->view('layout_principal_crm/header');
        $this->load->view('layout_principal_crm/footer');
    }

    public function login()
    {   //echo"<pre>post: ";print_r($_POST);echo"</pre>";
        $nm_login = $this->input->post('usuario');
        $ps_login = $this->input->post('senha');

        $this->db->where('usuario', $nm_login);
        $this->db->where('senha', $ps_login);
        $data = $this->db->get('crm_usuarios')->result();

        //echo"<br><pre>dados: ";print_r($data);echo"</pre>";
        //exit;

        if (count($data)===1) {
            $dados = array('usuarioCrm' => $data[0], 'logado' => TRUE);
            $this->session->set_userdata($dados);
            //$this->load->view('layout_principal_crm/header');nao chamou a view do cabecallho
            return redirect('/crm/dashboard/');
        } else {
            return redirect('/crm/');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('/crm'));
    }

}