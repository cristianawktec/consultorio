<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 3/8/16
 * Time: 7:10 PM
 */
class CheckoutController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function checkout()
    {
        $this->load->library("gateway");
        $dados_internos = array(
            'meio_pagamento' => 'redecard_ws',
            'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345',
            'capturar_automaticamente' => 'true',
            'numero_pedido' => '12345',
            'total' => '100.00',
            'moeda' => 'real',
            'descricao' => 'Something shiny!',
            'operacoes_permitidas' => array('credito_a_vista'),
            'parcelas_permitidas' => array('1')
        );
        $formulario = $this->input->post('formulario');

        $processor = new LocawebGatewayProcessor($dados_internos,$formulario);

        $requisicao = $processor->locawebGateway->sendRequest();
        if(is_null($requisicao)){
            die('Falha ao tentar se comunicar com o gateway , a url está correta? url atual: '.$dados_internos['url']);
        }

        // Verifica se existe uma url de retorno, se existir acessa a url.
        if (!is_null($requisicao->transacao->url_acesso))
        {
            // Verifica se é boleto , se for exibe ele , caso contrario redireciona usuario.
            if($formulario['meio_pagamento']=='boleto'){
                print '<p><img src="'.$requisicao->transacao->url_acesso.'">';
            } else {
                header("HTTP/1.1 301 Moved Permanently",true );
                header("Location: ".$requisicao->transacao->url_acesso);
                header("Cache-Control: no-cache, must-revalidate");
                exit;
            }
        }



    }

}