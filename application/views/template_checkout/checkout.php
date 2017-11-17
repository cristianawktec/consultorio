<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 3/8/16
 * Time: 7:22 PM
 */
?>
<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>

<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Iniciar Sessão</h4>

            <div class="col-md-6 col-sm-6">


                <form class="form"  method='POST' action='/checkout'>
                    <label for='bandeira'>
                        Bandeira
                        <select id='bandeira' name='formulario[bandeira]'>
                            <option value="visa" selected='selected'>visa</option>
                            <option value="master">master</option>
                        </select>
                    </label>
                    <br />
                    <label for='nome_titular_cartao'>
                        Titular do cartão
                        <input id='nome_titular_cartao' name='formulario[nome_titular_cartao]' value='Teste'>
                    </label><br />

                    <label for='cartao_numero'>
                        Numero do cartão
                        <input id='cartao_numero' name='formulario[cartao_numero]' value='4012001037141112'>
                    </label><br />

                    <label for='cartao_cvv'>
                        Numero do CVV2 do cartão
                        <input id='cartao_cvv' name='formulario[cartao_cvv]' value='973'>
                    </label><br />

                    <label for='cartao_validade'>
                        Vencimento do cartao
                        <input id='cartao_validade' name='formulario[cartao_validade]' value='082015'>
                    </label><br />

                    <label for='tipo_operacao'>
                        Tipo da operação
                        <select id='tipo_operacao' name='formulario[tipo_operacao]'>
                            <option value='credito_a_vista'>A vista</option>
                        </select>
                    </label><br />

                    <label for='parcelas'>
                        Numero de parcelas
                        <select name='formulario[parcelas]'>
                            <option value='1'>A vista</option>
                        </select>
                    </label><br />

                    <label for='nome'>
                        Nome
                        <input id='nome' name='formulario[nome]' value = 'Bruna da silva'>
                    </label><br />

                    <label for='documento'>
                        Numero de parcelas
                        <input id='documento' name='formulario[documento]' value = '123.456.789-00'>
                    </label><br />

                    <label for='endereco'>
                        Endereço
                        <input id='endereco' name='formulario[endereco]' value = 'Rua da casa 22'>
                    </label><br />
                    <label for='cep'>
                        CEP
                        <input id='cep' name='formulario[cep]' value = '09710-240'>
                    </label><br />
                    <label for='bairro'>
                        Bairro
                        <input id='bairro' name='formulario[bairro]' value = 'Centro'>
                    </label><br />
                    <label for='cidade'>
                        Cidade
                        <input id='cidade' name='formulario[cidade]' value = 'São Paulo'>
                    </label><br />
                    <label for='estado'>
                        Estado
                        <input id='estado' name='formulario[estado]' value = 'SP'>
                    </label><br />

                    <input type="submit">
                </form>

            </div>



        </div>
    </div>
</section><!-- end of about section -->
