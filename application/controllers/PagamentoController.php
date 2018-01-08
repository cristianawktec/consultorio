<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/21/15
 * Time: 4:40 PM
 *
 * Pag Seguro dados a baixo.
 *
 * Método de retorno do pag seguro
 * Conteúdo do POST:
 * VendedorEmail: email@pagseguro.com.br
 * TransacaoID: 23A080959E0346F58B8C73D2F032E814 <=
 * Referencia: 169 <= ID de cms_extrato
 * Extras: 0,00
 * TipoFrete: FR <=
 * ValorFrete: 0,00 <=
 * Anotacao: <=
 * DataTransacao: 31/07/2012 01:03:59 <=
 * TipoPagamento: Pagamento Online <=
 * StatusTransacao: Aguardando Pagto|Aprovado <=
 * CliNome: Nome do usurio
 * CliEmail: emaildo@cliente.com
 * CliEndereco: rua alguma coisa
 * CliNumero: 0
 * CliComplemento:
 * CliBairro: ing
 * CliCidade: Niteri
 * CliEstado: RJ
 * CliCEP: 24210445
 * CliTelefone: 21 33335555
 * NumItens: 2
 * Parcelas: 1 <=
 * ProdID_1: 129
 * ProdDescricao_1: Descrio obrigatria
 * ProdValor_1: 0,90
 * ProdQuantidade_1: 1
 * ProdFrete_1: 0,00
 * ProdExtras_1: 0,00
 * ProdID_2: 112
 * ProdDescricao_2: 2 Descrio obrigatria
 * ProdValor_2: 0,10
 * ProdQuantidade_2: 1
 * ProdFrete_2: 0,00
 * ProdExtras_2: 0,00
 */

class PagamentoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagseguro');
        $this->load->model('Pagamento_Model', 'pagamento');
    }

    public function pagamento2(){
        $refenrence = $this->input->get('reference');//precisa validar o plano
        $url = 'https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristian@awktec.com&valor=3490&nome=Cristian Marques Santos&descricao=cadastro&id_transacao='.$refenrence;
        //$url = 'https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristianms.awk@gmail.com&valor=490&nome=Cristian Marques Santos&descricao=cadastro&id_transacao='.$refenrence;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/xml; charset=ISO-8859-1'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        $xml= curl_exec($curl);
    }

    public function notifica()
    {
        $id_transacao = $_POST['id_transacao'];
        $valor = $_POST['valor'];
        $status_pagamento = $_POST['status_pagamento'];
        $cod_moip = $_POST['cod_moip'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $tipo_pagamento = $_POST['tipo_pagamento'];
        $email_consumidor = $_POST['email_consumidor'];

        if(isset($cod_moip)){
            header("HTTP/1.0 200 OK");
            $data['code'] = $id_transacao;
            $data['statusTransacao'] = $status_pagamento;
            $data['vl_pagamento'] =  $valor;
            $data['paymentMethod'] = $forma_pagamento;

            if ($id_transacao){
                $this->db->where('reference_transection', $id_transacao);
                $this->db->update('pagamentos', $data);
            }
        }else{
            header("HTTP/1.0 404 Not Found");

        }
    }

    public function renovarPagamento($id_medico, $id_plano)
    {   //echo"<br><pre>renova: ";print_r($GLOBALS);echo"</pre>";exit;
        if($id_plano == '2') {
            $reference = rand(999, 9999);
            if ($this->pagamento->add($id_medico, $reference)) {
                //echo"<br>reference: ".$reference;exit;
                return redirect('https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristian@awktec.com&valor=590&nome=ClickConsultorio&descricao=cadastro&id_transacao=' . $reference);
                //return redirect('https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristianms.awk@gmail.com&valor=3490&nome=Cristian Marques Santos&descricao=cadastro&id_transacao=' . $reference);
            }
        }
        if($id_plano == '3') {
            $reference = rand(999, 9999);
            if ($this->pagamento->add($id_medico, $reference)) {
                return redirect('https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristian@awktec.com&valor=690&nome=ClickConsultorio&descricao=cadastro&id_transacao=' . $reference);
                //return redirect('https://www.moip.com.br/PagamentoMoIP.do?id_carteira=cristianms.awk@gmail.com&valor=4990&nome=Cristian Marques Santos&descricao=cadastro&id_transacao=' . $reference);
            }
        }
    }


    public function index()
    {
        $email = 'financeiro@awktec.com';
        $token = '78A4F05C993D447DA509F7E44FA8C323';
        //$email = 'cristianms.awk@gmail.com';
        //$token = 'ABADABBD962E4A40816B361AB6D17F1B';

        $reference = rand(999, 9999);
        $url = 'https://ws.pagseguro.uol.com.br/v2/checkout/?email=' . $email . '&token=' . $token;
        $xml = '<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?>
    <checkout>
        <currency>BRL</currency>
        <redirectURL>'.base_url().'</redirectURL>
        <items>
            <item>
                <id>0001</id>
                <description>Cadastro Medico</description>
                <amount>0.90</amount>
                <quantity>1</quantity>
                <weight>0</weight>
            </item>
        </items>
        <reference>'.$this->input->get('reference').'</reference>
    </checkout>';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/xml; charset=ISO-8859-1'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        $xml= curl_exec($curl);

        if($xml == 'Unauthorized'){
            //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
            header('Location: paginaDeErro.php');
            exit;//Mantenha essa linha
        }

        curl_close($curl);

        $xml= simplexml_load_string($xml);

        if ($xml->code) {
            $data['code'] = (string)$xml->code;
            $this->db->where('reference_transection', $this->input->get('reference'));
            $this->db->update('pagamentos', $data);
        }
        if(count($xml -> error) > 0){
            //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção, talvez seja útil enviar os códigos de erros.
            header('Location: paginaDeErro.php');
            exit;
        }

        return redirect('https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);

    }

    public function retorno_pagseguro() {

        if (count($_POST) > 0) {

            // SALVA O POST PARA DEGUG
            $this->debug($_P0ST);

            $informacao = array();

            // POST recebido, indica que é a requisição do NPI,
            // ou notificação de status
            $this->load->library('pagseguro'); //Carrega a library


            // faz conexão com PS para validar o retorno
            $retorno = $this->pagseguro->notificationPost();

            // quando recebe uma notificação que necessita uma requisição GET
            // para recuperar status da transação
            $notificationType = (isset($_POST['notificationType']) && $_POST['notificationType'] != '') ? $_POST['notificationType'] : FALSE;
            $notificationCode = (isset($_POST['notificationCode']) && $_POST['notificationCode'] != '') ? $_POST['notificationCode'] : FALSE;

            // É uma notificação de status. Passa a ação para o método que vai
            // atualizar o status do pedido.
            if ($notificationType && $notificationCode) {

                $not = $this->pagseguro->get_notification($notificationCode);
                /*
                 * FAZ AS ATUALIZAÇÕES COM A NOTIFICAÇÃO DE STATUS
                 */

            }

            // informação quando é enviado um POST completo
            $transacaoID = (isset($_POST['TransacaoID'])) ? $_POST['TransacaoID'] : FALSE;

            // Se existe $transacaoID é uma notificação via POST logo após a
            // solicitação de pagamento, neste momento
            if ($transacaoID) {

                /*
                 * FAZ AS ATUALIZAÇÕES COM A NOTIFICAÇÃO DE STATUS
                 */

            }



            //O post foi validado pelo PagSeguro.
            if ($retorno == "VERIFICADO") {

                if ($_POST['StatusTransacao'] == 'Aprovado') {
                    $informacao['status'] = '1';
                } elseif ($_POST['StatusTransacao'] == 'Em Análise') {
                    $informacao['status'] = '2';
                } elseif ($_POST['StatusTransacao'] == 'Aguardando Pagto') {
                    $informacao['status'] = '3';
                } elseif ($_POST['StatusTransacao'] == 'Completo') {
                    $informacao['status'] = '4';
                } elseif ($_POST['StatusTransacao'] == 'Cancelado') {
                    $informacao['status'] = '5';
                }
            } else if ($retorno == "FALSO") {
                //O post não foi validado pelo PagSeguro.
                $informacao['status'] = '1000';
            } else {
                //Erro na integração com o PagSeguro.
                $informacao['status'] = '6';
            }
        } else {
            // POST não recebido, indica que a requisição é o retorno do Checkout PagSeguro.
            // No término do checkout o usuário é redirecionado para este bloco.
            // redirecionar para página de OBRIGADO e aguarde...
            // redirect('loja');
        }


    }

    // -------------------------------------------------------------------------

    /**
     * Exemplode como consultar status de notificação
     * @param string $code
     */
    public function check($code = NULL) {

        if($code === NULL){
            $code = '45AC39-82659E659E9A-72242E0FAAB7-1EEBBF';
        }

        $string = $this->pagseguro->get_notification($code);

        var_dump($string);
    }

    // -------------------------------------------------------------------------
    /**
     * Salva um array no arquivo pagseguro...php em cache/
     * @param type $array
     */
    public function debug($array) {

        $data = array();
        foreach ($array as $c => $v) {
            $data[] = $c . ': ' . $v;
        }

        $output = implode("\n", $data);

        $this->load->helper('file');
        write_file(APPPATH . "cache/pagseguro_" . date("Y-m-d_h-i") . ".php", $output);
    }

    public function testeConsulta()
    {
        $email = 'financeiro@awktec.com';
        $token = '78A4F05C993D447DA509F7E44FA8C323';
        //$email = 'cristianms.awk@gmail.com';
        //$token = 'ABADABBD962E4A40816B361AB6D17F1B';

        $url = 'https://ws.pagseguro.uol.com.br/v2/transactions?email=' . $email . '&token=' . $token . '&reference=7728';

        $transaction = $this->curlExec($url);


        if($transaction == 'Unauthorized') {
            //Insira seu código avisando que o sistema está com problemas
            //sugiro enviar um e-mail avisando para alguém fazer a manutenção
            echo 'You shall not pass';
            exit;//Mantenha essa linha para evitar que o código prossiga
        }

        $transaction = simplexml_load_string($transaction);
var_dump($transaction);die;
        if(count($transaction -> error) > 0) {
            //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
            var_dump($transaction);
        }
        echo $transaction->sender->email;

    }

    public function consultaPagamento($reference)
    {
        $email = 'financeiro@awktec.com';
        $token = '78A4F05C993D447DA509F7E44FA8C323';
        //$email = 'cristianms.awk@gmail.com';
        //$token = 'ABADABBD962E4A40816B361AB6D17F1B';

        $url = 'https://ws.pagseguro.uol.com.br/v2/transactions?email=' . $email . '&token=' . $token . '&reference='. $reference;

        $transaction = $this->curlExec($url);

        if($transaction == 'Unauthorized') {
            //Insira seu código avisando que o sistema está com problemas
            //sugiro enviar um e-mail avisando para alguém fazer a manutenção
            echo 'You shall not pass';
            exit;//Mantenha essa linha para evitar que o código prossiga
        }

        $transaction = simplexml_load_string($transaction);

        if(count($transaction -> error) > 0) {
            //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
            var_dump($transaction);
        }

        $data['code'] = $transaction->transactions->transaction->code;
        $data['statusTransacao'] = $transaction->transactions->transaction->status;
        $data['vl_pagamento'] = $transaction->transactions->transaction->grossAmount + $transaction->transactions->transaction->feeAmount;
        $data['paymentMethod'] = $transaction->transactions->transaction->paymentMethod;

        if ($reference){
            $this->db->where('reference_transection', $reference);
            $this->db->update('pagamentos', $data);
        }

    }

    public function curlExec($url, $post = NULL, array $header = array()){

        //Inicia o cURL
        $ch = curl_init($url);

        //Pede o que retorne o resultado como string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Envia cabeçalhos (Caso tenha)
        if(count($header) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        //Envia post (Caso tenha)
        if($post !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        //Ignora certificado SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Manda executar a requisição
        $data = curl_exec($ch);

        //Fecha a conexão para economizar recursos do servidor
        curl_close($ch);

        //Retorna o resultado da requisição

        return $data;
    }

}