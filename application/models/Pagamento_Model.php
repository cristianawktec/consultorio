<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 12/21/15
 * Time: 5:01 PM
 */
class Pagamento_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagseguro');

    }

    public function add($id_medico,$reference)
    {   //echo"<br><pre>pagamento: ";print_r($GLOBALS);echo"</pre>";exit;
        $dados['id_usuario'] = $id_medico;
        $dados['reference_transection'] = $reference;
        $dados['dt_pagamento'] = date('Y-m-d H:i:s', time());
        //$pag = $this->db->insert('pagamentos',$dados); echo"<br><pre>pagamento: ";print_r($dados);echo"</pre>";exit;
        return $this->db->insert('pagamentos',$dados);
    }

    public function getAllPagamento()
    {
        $this->db->select('u.id_usuario as id_usuario, u.nm_login, p.dt_pagamento, p.reference_transection,p.statusTransacao, p.id_pagamento');
        $this->db->from('pagamentos as p');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        return $this->db->get()->result();
    }

    public function getAllPagamentoById($id_pagamento)
    {
        $this->db->select('m.nm_medico,m.nr_cpf,u.id_usuario as id_usuario, u.nm_login, p.dt_pagamento, p.reference_transection,p.statusTransacao, p.id_pagamento, p.code,p.vl_pagamento, p.paymentMethod');
        $this->db->from('pagamentos as p');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        $this->db->where('id_pagamento', $id_pagamento);
        return $this->db->get()->result();
    }

    public function getAllPagamentoByIdMedico($id_medico)
    {
        $today = date('Y-m', time());
        $this->db->select('m.nm_medico,m.nr_cpf,u.id_usuario as id_usuario, u.nm_login, p.dt_pagamento, p.reference_transection,p.statusTransacao, p.id_pagamento, p.code,p.vl_pagamento, p.paymentMethod');
        $this->db->from('pagamentos as p');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        $this->db->where('u.id_usuario', $id_medico);
        $this->db->like('p.dt_pagamento', $today);

        return $this->db->get()->result();
    }

    public function getAllPagamentoByIdMedico2($id_medico)
    {
        $this->db->select('m.nm_medico,m.nr_cpf,u.id_usuario as id_usuario, u.nm_login, p.dt_pagamento, p.reference_transection,p.statusTransacao, p.id_pagamento, p.code,p.vl_pagamento, p.paymentMethod');
        $this->db->from('pagamentos as p');
        $this->db->join('usuarios as u', 'u.id_usuario = p.id_usuario');
        $this->db->join('medicos as m', 'm.id_usuario = u.id_usuario');
        $this->db->where('u.id_usuario', $id_medico);
        $this->db->order_by('dt_pagamento','desc');

        return $this->db->get()->result();
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

        if ($transaction->transactions->transaction){
            if(count($transaction -> error) > 0) {
                //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
                var_dump($transaction);
            }

            $data['code'] = $transaction->transactions->transaction->code;
            $data['statusTransacao'] = $transaction->transactions->transaction->status;
            $data['vl_pagamento'] = $transaction->transactions->transaction->grossAmount + $transaction->transactions->transaction->feeAmount;
            $data['paymentMethod'] = $transaction->transactions->transaction->paymentMethod->type;

            if ($reference){
                $this->db->where('reference_transection', $reference);
                $this->db->update('pagamentos', $data);
            }
        }

        return true;

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