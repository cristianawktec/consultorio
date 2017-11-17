<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 26/08/2017
 * Time: 10:38
 */

class ProspectoCrmController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_model','usuario');
        $this->load->model('Endereco_Model','endereco');
        $this->load->model('Consulta_Model','consulta');
        $this->load->model('Prospecto_Model', 'prospecto');
        $this->load->model('Crm_Prospecto_Model');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');
        //$data['estados'] = $this->Crm_Prospecto_Model->getEstados();

        $estado = $this->Crm_Prospecto_Model->retorna_estados();
        //echo"<pre>estados: ";print_r($estado);echo"</pre>";exit;

        $option = "<option value=''></option>";
        foreach($estado as $linha) {
            $option .= "<option value='$linha->cod_estados'>$linha->nome</option>";
        }

        $variaveis['options_estado'] = $option;
        $this->load->view('template_dashboard_crm/adicionar_prospecto', $variaveis);
    }

    public function busca_cidades_estado()
    {   //echo"estou chegando aqui";exit;
        $this->load->model("Crm_Prospecto_Model");
        $cidades = $this->Crm_Prospecto_Model->getCidadesEstado();
        $option = "<option value=''></option>";
        foreach($cidades as $linha) {
            //echo"<pre>estados: ";print_r($linha);echo"</pre>";exit;
            $option .= "<option value='$linha->cod_cidades'>$linha->nome</option>";
        }
        echo $option;
    }

    public function listar()
    {
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $data['registros'] = $this->Crm_Prospecto_Model->getProspectoMedico($idmedico);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/listar_prospectos',$data);
    }

    function editar($id)
    {
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $data['registros'] = $this->Crm_Prospecto_Model->editar($id);
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/editar_prospecto',$data);
    }

    function atualizar()
    {
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $this->Crm_Prospecto_Model->atualizar();
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/editar_prospecto',$data);
        redirect('crm/prospecto/listar');
    }

    function novo(){
        $this->load->helper('form');
        $this->load->view('layout_principal_crm/menu');
        $this->load->view('template_dashboard_crm/adicionar_prospecto');
    }

    function exportar(){
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $data['registros'] = $this->Crm_Prospecto_Model->getProspectoMedico($idmedico);
        $this->load->view('template_dashboard_crm/exportar_prospecto',$data);
        redirect('crm/dashboard');
    }

    function adicionar(){
        //echo"<br><pre>adicionar: ";print_r($_POST);echo"</pre>";exit;
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $this->Crm_Prospecto_Model->adicionar();
        redirect('/crm/dashboard');
    }

    function deletar($id){
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $this->Crm_Prospecto_Model->excluir($id);
        redirect('crm/prospecto/listar');
    }

    function baixar()
    {
        //mostra se tem algum error
        while (ob_get_level())
            ob_end_clean();
        header("Content-Encoding: None", true);

        // Se carga la libreria fpdf
        $this->load->library('pdf');

        // Se busca os dados da lista dos prospectos
        $idmedico = $this->session->userdata('usuarioCrm')->id;
        $this->load->helper('form');
        $this->load->model('Crm_Prospecto_Model');
        $data = $this->Crm_Prospecto_Model->getProspectoMedico($idmedico);
        //echo"<pre>";print_r($data);echo"</pre>";exit;
        // Creacion del PDF

        /*
         * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
         * heredó todos las variables y métodos de fpdf
         */
        // Aqui já podemos passar algumas variáveis.
        // O primeiro é a orientação da página:
        // ("P" ou "portrait" = retrato) ("L" ou "landscape" = paisagem)
        // O segundo é a unidade metrica que você irá utilizar:
        // ("pt" = pontos) ("mm" = milimetros) ("cm" = centimetros) ("in" = polegadas)
        // O terceiro é o tamanho da página/papel
        // "A3", "A4", "A5", "letter" e "legal" são os tamanho já pré-definidos, mas
        // também pode ser passado o tamanho por meio de um array array('largura','altura')
        // onde os valores largura e altura podem ser qualquer número real maior que '0'.
        // caso algum ou nenhum valor for passado, irá assumir o
        // Escopo: FPDF($orientation='P', $unit='mm', $size='A4')
        $this->pdf = new PDF("L");
        // Agregamos una página
        $this->pdf->AddPage();
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();

        /* Se define el titulo, márgenes izquierdo, derecho y
         * el color de relleno predeterminado
         */
        $this->pdf->SetTitle("Lista de prospectos");
        $this->pdf->SetLeftMargin(10);
        $this->pdf->SetRightMargin(10);
        $this->pdf->SetFillColor(200,200,200);

        // define formato da fonte: Arial, negrito, tamaho 9
        $this->pdf->SetFont('Arial', 'B', 8);
        /*
         * TITULOS DE COLUMNAS
         *
         * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
         */
        //$this->pdf->Cell(15,7,'NUM','TBL',0,'C','1');
        $this->pdf->Cell(35,7,'Prospecto','TBL',0,'L','1');
        $this->pdf->Cell(35,7,'Responsável','TB',0,'L','1');
        $this->pdf->Cell(42,7,'E-mail','TB',0,'L','1');
        $this->pdf->Cell(25,7,'Telefone','TB',0,'L','1');
        $this->pdf->Cell(22,7,'Origem','TB',0,'L','1');
        $this->pdf->Cell(25,7,'Cadastrado','TBR',0,'L','1');
        $this->pdf->Ln(7);
        // La variable $x se utiliza para mostrar un número consecutivo
        $x = 1;
        foreach($data as $dados) {

            // se imprime el numero actual y despues se incrementa el valor de $x en uno
            //$this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
            // Se imprimen los datos de cada alumno
            $this->pdf->Cell(35,5,$dados->nome,'BL',0,'L',0);
            $this->pdf->Cell(35,5,$dados->nm_responsavel,'B',0,'L',0);
            $this->pdf->Cell(42,5,$dados->email,'B',0,'L',0);
            $this->pdf->Cell(25,5,$dados->nr_contato,'B',0,'L',0);
            $this->pdf->Cell(22,5,$dados->fonte,'B',0,'L',0);
            $this->pdf->Cell(25,5,substr($dados->data_cadastro,0,10),'BR',0,'L',0);
            //Se agrega un salto de linea
            $this->pdf->Ln(5);
        }
        /*
         * Se manda el pdf al navegador
         *
         * $this->pdf->Output(nombredelarchivo, destino);
         *
         * I = Muestra el pdf en el navegador
         * D = Envia el pdf para descarga
         *
         */
        $this->pdf->Output("Lista de prospectos.pdf", 'I');
    }

}