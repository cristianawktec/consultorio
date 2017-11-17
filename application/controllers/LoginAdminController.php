<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/24/15
 * Time: 9:58 AM
 */
class LoginAdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('layout_principal_admin/header');
        $this->load->view("template_login_admin/index");
        $this->load->view('layout_principal_admin/footer');
    }

    public function login()
    {
        $nm_login = $this->input->post('nm_login');
        $ps_login = $this->input->post('ps_login');

        $this->db->where('nm_login', $nm_login);
        $this->db->where('ps_login', $ps_login);
        $data = $this->db->get('administradores')->result();
        if (count($data)===1) {
            $dados = array('usuarioAdmin' => $data[0], 'logado' => TRUE);
            $this->session->set_userdata($dados);
            return redirect('/admin/dashboard/');
        } else {
            return redirect('/admin/');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('/admin'));
    }

}