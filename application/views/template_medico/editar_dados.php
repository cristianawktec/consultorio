<?php $medico = $medico[0]; ?>
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
<style type="text/css" media="all">

    form#myForm {
        margin-top: 0px !important;
    }

    form#myForm select {
        float:right;
        margin-right:80px;
    }
    hr {
        clear:both;
        visibility:hidden;
    }
    form#myForm a {
        display:block;
        position:relative;
        color:#990000;
        text-decoration:none;
    }
    form#myForm a b, form#myForm a span {
        display:block;
        position:absolute;
        left:-10000px;
    }

    form#myForm a:hover b, form#myForm a:focus b { /* focus shows up hints - in compliant browsers - for tab navigation */
        font-size:1.2em;
        background: #f7ffbe;
        border:1px solid #600;
        width:225px;
        padding:5px 8px;
        position:absolute;
        top:-10px;
        left:100px;
        font-weight:normal;
        min-height:20px;
    }

</style>

<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Informações do Médico</h4>

            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Médico: <?php echo $medico->nm_medico; ?></h3>

                        <form id="myForm" name="myForm" class="form" method="post" action="/medico/atualiza/<?php echo $medico->id_usuario; ?>">
                            <a href="#" tabindex="9">
                            <input id="user" tabindex="10" class="text" type="text" name="nm_medico" disabled value="<?php echo $medico->nm_medico; ?>" required>
                            <b>Este campo não pode ser editável!</b><span></span></a>

                            <a href="#" tabindex="9">
                            <select name="ch_sexo" class="email" disabled style="float: left;" required>
                                <option value="">Selecione o sexo</option>
                                <option <?php if($medico->ch_sexo == "M") { echo "selected='selected'";} ?> value="Masculino">Masculino</option>
                                <option <?php if($medico->ch_sexo == "F") { echo "selected='selected'";} ?> value="Feminino">Feminino</option>
                            </select>
                            <b>Este campo não pode ser editável!</b><span></span></a>

                            <input class="text" type="text" name="telefone" placeholder="Telefone do Médico" value="<?php echo $medico->telefone; ?>" >
                            <br/>
                            <a href="#" tabindex="9">
                               <input class="text" value="<?php echo $medico->nr_cpf; ?>" disabled onBlur="ValidarCPF(myForm.nr_cpf);" type="text" id="nr_cpf" name="nr_cpf" placeholder="CPF" required>
                            <b>Este campo não pode ser editável!</b><span></span></a>
                            <input class="text" value="<?php echo $medico->nr_rg; ?>" type="text" name="nr_rg" placeholder="RG" required>
                            <input class="text" value="<?php echo $medico->nm_conselho; ?>" type="text" name="nm_conselho" placeholder="Nome do Conselho" required>
                            <input class="text" value="<?php echo $medico->nr_conselho; ?>" type="number" name="nr_conselho" placeholder="Número do Conselho" required>
                            <input class="text" value="<?php echo $medico->nr_cnes; ?>" type="number" name="nr_cnes" placeholder="Número CNES" required>
                            <input class="text" value="" disabled type="text" name="pagina_web" placeholder="http://voce.clickconsultorio.com/ *  Em Breve este campo estará disponível para Você, Aguarde!!" >

                            <input style="float: none !important;" type="button" name="cancel" value="CANCELAR" onClick="history.back()" class="submit-btn" />&nbsp;&nbsp;
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