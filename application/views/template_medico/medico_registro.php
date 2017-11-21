<? //echo"<br> Cadastra1: <pre>";print_r($GLOBALS);echo"</pre><br>";

$plano_id= $this->uri->segment(4, 0);

?>

<!-- Google Code for Conversao de lancamento Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 927687500;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "rJJPCKON02cQzMatugM";
    var google_remarketing_only = false;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/927687500/?label=rJJPCKON02cQzMatugM&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>


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
    $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#cep").mask("99999-999");
        $("#nr_cpf").mask("999.999.999-99");
        $("#telefone").mask("(99)9999-9999");
        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
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

            <h4>Cadastro de Médicos</h4>

            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Informe seus dados</h3>

                            <form name="myForm" class="form" method="post" action="/medico/adicionar">
                            <input class="text" type="hidden" name="id_perfil" value="2">
                            <input class="text" type="hidden" name="ch_ativo" value="1">
                            <input class="text" type="hidden" name="ch_prospecto" value="0">

                                <!-- input quando é prospecto e ja traz o nome do medico e o template escolhido
                                <input class="text" type="text" name="nm_medico" placeholder="Nome do Médico" value="<? if($_POST['nome']!=""){echo $_POST['nome'];}?>" required>
                                <input class="text" type="hidden" name="template" value="<? echo $_POST['template'];?>">
                                -->

                            <input class="text" type="text" name="nm_medico" placeholder="Nome do Médico" required>
                                <input class="text" type="hidden" name="template">
                                <select name="ch_sexo" class="email" style="float: left;" required>
                                <option value="">Selecione o sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                            <input class="text" type="text" name="telefone" id="telefone" placeholder="Telefone do Médico" >
                            <br/>
                            <!--
                                <input class="text" onBlur="ValidarCPF(myForm.nr_cpf);" type="text" id="nr_cpf" name="nr_cpf" placeholder="CPF" required>
                                <input class="text" type="text" name="nr_rg" placeholder="RG" required>
                             -->
                            <input class="text" type="text" name="nm_conselho" placeholder="Nome do Conselho" required>
                            <input class="text" type="number" name="nr_conselho" placeholder="Número do Conselho" required>
                            <input class="text" type="number" name="nr_cnes" placeholder="Número CNES" required>
                            <select name="id_especializacao" class="email" style="float: left;"  required>
                                <option value="">Selecione sua Especialização</option>
                                <?php
                                foreach($especializacoes as $esp){
                                ?>
                                <option value="<?php echo $esp->id_especializacao; ?>"><?php echo $esp->nm_especializacao; ?></option>
                                <?php } ?>
                            </select>
                            <br />
                            <br />
                            <br />

                            <hr/>
                            <h3 style="float: left;">Dados de acesso</h3>
                            <input class="text" type="text" name="nm_login" placeholder="Login de acesso" autocomplete="off" required>
                            <input class="text" type="hidden" name="nm_login_hash">
                            <input class="text" type="password" name="ps_login" placeholder="Senha" autocomplete="off" required>
                            <input class="text" type="hidden" name="ps_login_hash">

                            <input class="email" type="email" name="email" placeholder="Seu e-mail" autocomplete="off" value="<?php if(@$_POST['email']!=""){echo @$_POST['email'];}?>" required>


                                <hr/>
                                <h3 style="float: left;border-bottom: 0;">Tipo de Assinatura</h3>
                                <input class="text" type="hidden" name="" id="" placeholder="" >
                                <br/><br/>
                                <select name="id_plano" class="email" style="align-items: left;float: left;border-left-width: 0px;border-top-width: 0px;border-bottom-width: 0px;margin-left: -185px;margin-top: 30px;margin-right: 0px;padding-left: 0px;padding-right: 60px;">
                                    <?php
                                    //echo"plano: ".$plano_id;
                                    $planos = $this->db->get('planos')->result();
                                        if($plano_id=='0'){ ?>
                                            <option value="0">Escolha o seu Plano!</option>
                                            <option value="1">Free</option>
                                            <option value="2">Básico</option>
                                            <option value="3">Premium</option>
                                        <?php }
                                        if($plano_id=='1'){ ?>
                                            <option value="1">Free</option>
                                            <option value="2">Básico</option>
                                            <option value="3">Premium</option>
                                        <?php }
                                        if($plano_id=='2'){ ?>
                                            <option value="2">Básico</option>
                                            <option value="1">Free</option>
                                            <option value="3">Premium</option>
                                        <?php }
                                        if($plano_id=='3'){ ?>
                                            <option value="3">Premium</option>
                                            <option value="1">Free</option>
                                            <option value="2">Básico</option>
                                        <?php } ?>
                                </select>
                                <br/><br/>
                                <input class="text" type="hidden" name="" id="" placeholder="" >
                                <br/>

                                <hr/>
                            <h3 style="float: left;">Endereço</h3>
                            <input class="text" type="text" name="nr_cep" id="cep" placeholder="Informe seu Cep" required>
                            <input class="text" type="text" name="nm_endereco" id="nm_endereco" placeholder="Rua">
                            <input class="text" type="number" name="nr_endereco" id="nr_endereco" placeholder="número do apto ou residencia">
                            <input class="text" type="text" name="nm_bairro" id="nm_bairro" placeholder="Seu Bairro">
                            <input class="text" type="text" name="nm_cidade" id="nm_cidade" placeholder="Sua Cidade">
                            <input class="text" type="text" name="nm_estado" id="nm_estado" placeholder="Estado">
                            <input class="text" type="text" name="ds_observacao" id="ds_observacao" placeholder="Complemento">


                            <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-6"></div>

        </div>
    </div>
</section><!-- end of about section -->


<script>

        $("#backToShop").click(function(){
            document.getElementById("myForm").submit();
        });
</script>