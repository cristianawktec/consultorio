<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 1/28/16
 * Time: 7:12 PM
 */
class RelatorioController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')->id_usuario || !$this->session->userdata('logado')) {
            redirect(base_url('/login'));
        }
        $this->load->model('Relatorio_model', 'relatorio');
    }

    public function pacientReport()
    {
        $data['pacientes'] = $this->relatorio->relatorioPaciente();
        $this->load->view('layout_principal/top');
        $this->load->view('template_relatorios/report_pacient', $data);
        $this->load->view('layout_principal/footer');
    }

    public function financeiroReport()
    {
        $data['pagamentos'] = $this->relatorio->financeiroReport();
        $this->load->view('layout_principal/top');
        $this->load->view('template_relatorios/report_financeiro', $data);
        $this->load->view('layout_principal/footer');
    }

    public function confirmReport()
    {
        $data['pacientes'] = $this->relatorio->relatorioConsultaConfirmada();
        $this->load->view('layout_principal/top');
        $this->load->view('template_relatorios/report_confirm', $data);
        $this->load->view('layout_principal/footer');
    }

    public function cancelReport()
    {
        $data['pacientes'] = $this->relatorio->relatorioConsultaCancelada();
        $this->load->view('layout_principal/top');
        $this->load->view('template_relatorios/report_cancel', $data);
        $this->load->view('layout_principal/footer');
    }

}