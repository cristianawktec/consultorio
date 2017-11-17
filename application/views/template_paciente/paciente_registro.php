<script>
    function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" );
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
            soma1+=eval(cpf.charAt(i)*(vlr-1));
            soma2+=eval(cpf.charAt(i)*vlr);
            vlr--;
        }
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)
            alert('CPF Invalido!');
    }
</script>
<script type="text/javascript">
    $(function () {
        $.mask.definitions['~'] = "[+-]";
        $("#dt_nascimento").mask("99/99/9999");
        $("#cep").mask("99999-999");
        $("#nr_cpf").mask("999.999.999-99");

        $("input").blur(function () {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function () {
            $(this).unmask();
        });

    });



</script>
<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Cadastro de Pacientes</h4>

            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Informe seus dados</h3>

                        <form name="form1" class="form" method="post" action="/paciente/adicionar">
                            <input class="text" type="hidden" name="id_perfil" value="1">
                            <input class="text" type="hidden" name="dt_cadastro"
                                   value="<?php echo date('d/m/Y H:i:s', time()); ?>">

                            <input class="text" type="text" name="nm_paciente" placeholder="Nome do Paciente" required>
                            <select name="ch_sexo" class="email" style="float: left;" required>
                                <option value="">Selecione o sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                            <select name="ds_estado_civil" class="email" style="float: left;" required>
                                <option value="">Selecione o estado civil</option>
                                <option value="Solteiro(a)">Solteiro(a)</option>
                                <option value="Casado(a)">Casado(a)</option>
                                <option value="Viuvo(a)">Viuvo(a)</option>
                            </select>
                            <br/>
                            <!--
                            <input class="text" type="text" onBlur="ValidarCPF(form1.nr_cpf);"
                                    id="nr_cpf" name="nr_cpf" placeholder="CPF" required>
                            <input class="text" type="number" name="nr_rg" placeholder="RG" required>
                            -->
                            <input class="text" type="text" id="dt_nascimento" name="dt_nascimento"
                                   placeholder="Data de Nascimento" required>
                            <input class="text" type="text" name="nm_pai" placeholder="Nome do Pai">
                            <input class="text" type="text" name="nm_mae" placeholder="Nome da Mãe">
                            <hr/>
                            <h3 style="float: left;">Dados de acesso</h3>
                            <input class="text" type="text" name="nm_login" placeholder="Login de acesso" required>
                            <input class="text" type="hidden" name="nm_login_hash">
                            <input class="text" type="password" name="ps_login" placeholder="Senha" required>
                            <input class="text" type="hidden" name="ps_login_hash">

                            <input class="email" type="email" name="email" placeholder="Seu e-mail" required>

                            <hr/>
                            <h3 style="float: left;">Endereço</h3>
                            <input class="text" type="text" name="nr_cep" id="cep" placeholder="Informe seu Cep" required>
                            <input class="text" type="text" name="nm_endereco" id="nm_endereco" placeholder="Rua">
                            <input class="text" type="text" name="nr_endereco" id="nr_endereco"
                                   placeholder="número do apto ou residencia">
                            <input class="text" type="text" name="nm_bairro" id="nm_bairro" placeholder="Seu Bairro">
                            <input class="text" type="text" name="nm_cidade" id="nm_cidade" placeholder="Sua Cidade">
                            <input class="text" type="text" name="nm_estado" id="nm_estado" placeholder="Estado">
                            <input class="text" type="text" name="ds_observacao" id="ds_observacao"
                                   placeholder="Complemento">


                            <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-6"></div>

        </div>
    </div>
</section><!-- end of about section -->
