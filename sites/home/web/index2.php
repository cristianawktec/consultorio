<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="col_1_of_3 span_1_of_3">
                <a href="http://www.clickconsultorio.com">
                    <img  class="content-top" style="padding: 10px !important;height: 90px !important;" src="../web/images/logo_trans.png" alt="ClickConsultório">
                </a>
            </div>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <h4>QUER GANHAR UM SITE AGORA?</h4>
            <h3>
                <p>Mais um subdominio com acesso a sua agenda e marcação de consultas?</p>
                <p>Siga as instruções abaixo!!!</p>
            </h3>
        </div>
        <div class="col_1_of_3 span_1_of_3">
           <img  class="content-top" style="padding: 0px !important;height: 300px !important;" src="../web/images/cristian2.png" >
        </div>
    </div>
</div>

<div class="content">
	<div class="wrap">
			<div class="content-top">
				<div class="col_1_of_3 span_1_of_3">
					<span class="image">
						<img src="web/images/template1.png" alt=""/>
					</span>
					<h3>Template1</h3>
					<p>Este é o primeiro template disponível, para escolher este você receberá um email solicitando uma foto, sua especialidade, seus tratamentos e um texto falando sobre você.</p>

				</div>
				<div class="col_1_of_3 span_1_of_3">
					<span class="image">
						<img src="web/images/template2.png" alt=""/>
					</span>
					<h3>Template2</h3>
					<p>Este é o segundo template estará disponível à partir do dia 10/09, para escolher este você receberá um email solicitando uma foto, sua especialidade, seus tratamentos e um texto falando sobre você.</p>

				</div>
				<div class="col_1_of_3 span_1_of_3">
					<span class="image">
						<img src="web/images/pic2.jpg" alt=""/>
					</span>
					<h3>Template3</h3>
					<p>Este é o terceiro template disponível em breve, para escolher este você receberá um email solicitando uma foto, sua especialidade, seus tratamentos e um texto falando sobre você.</p>

				</div>
				<div class="clear"></div>
			</div>


			<div class="content-bottom">
				<div class="cont span_2_of_3">
				       <h3>Como Funciona?</h3>
					   	<p>
                            Neste mês de SETEMBRO o ClickConsultório está dando um PRESENTE para VOCÊ, os 100(cem) primeiros cadastrados irão GANHAR um SITE de PRESENTE!!! Isso mesmo, um site e mais um subdominio(voce.clickconsultorio.com) com acesso a sua agenda e marcação de consultas. Para isso basta você escolher um template e se cadastrar preenchendo os campos ao lado. Quer ser um dos 100(cem) primeiros e garantir o seu? Não perca tempo acesse e cadastre-se agora mesmo!
                        </p>
				</div>

				<!-- HEADER FORM -->
				<div class="rsidebar span_1_of_3">
				<div class="banner-form animated fadeInUp" style="visibility: visible;">
					<h3 style="
                                  /* float: inherit; */
                                  font-size: 26px;
                                  margin-top: -26px;
                                  margin-bottom: 7px;
                                  color: #f6f6f6;
                                  text-align: center;
                              ">Quero Um Site!!!</h3>

					<form id="form" name="form" method="post" action="cadastra.php">
						<input class="text" type="hidden" name="id_perfil" value="2">
						<fieldset>
							<label></label>
							<input type="text" placeholder="Digite o seu Nome. . ." name="nome" required="">
						</fieldset>
						<fieldset>
							<label></label>
							<input type="text" placeholder="Informe o seu email  . . ." name="email" required="">
						</fieldset>
						<fieldset>
                            <select name="template" id="template" style="padding: 0px !important;height: 23px !important;">
                                <option value="">Escolha um Template:</option>
                                <option value="template1">Template1</option>
                                <option value="template2">Template2</option>
                                <option value="template3">Template3</option>
                            </select>
						</fieldset>
						<fieldset>
							<select name="cod_estados" id="cod_estados" style="padding: 0px !important;height: 23px !important;">
								<option value="">Estado:</option>
								<?php
                                  include("../../config/default.php");
                                  $sql = "SELECT cod_estados, sigla
                                                          FROM estados
                                                          ORDER BY sigla";
                                  $res = mysql_query( $sql );
                                  while ( $row = mysql_fetch_assoc( $res ) ) {
                                      echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
                                  }
								?>
                            </select>
                        </fieldset>

                        <fieldset>
                            <span class="carregando" style="display: none;">Aguarde, carregando...</span>
                            <select name="cod_cidades" id="cod_cidades" style="padding: 0px !important;height: 23px !important;">
                                <option value="">-- Escolha um estado --</option>
                            </select>
                        </fieldset>

                        <script src="http://www.google.com/jsapi"></script>
                        <script type="text/javascript">
                            google.load('jquery', '1.3');
                        </script>

                        <script type="text/javascript">
                            $(function(){
                                $('#cod_estados').change(function(){
                                    if( $(this).val() ) {
                                        $('#cod_cidades').hide();
                                        $('.carregando').show();
                                        $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                                            var options = '<option value=""></option>';
                                            for (var i = 0; i < j.length; i++) {
                                                options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                                            }
                                            $('#cod_cidades').html(options).show();
                                            $('.carregando').hide();
                                        });
                                    } else {
                                        $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
                                    }
                                });
                            });
                        </script>
                        <input type="submit" value="CADASTRAR" class="btn">
                        </form>
                        </div>
                        </div>
                        <!-- END OF HEADER FORM-->

                        <div class="clear"></div>
                        </div>



                        </div>
                        </div>
                        <div class="footer">
                            <div class="wrap">
                                <div class="content-top">
                                    <div class="col_1_of_4 span_1_of_4">
                                        <h4>Siga-nos</h4>
                                        <div class="footer-pic">
                                            <a href="https://www.facebook.com/ClickConsult%C3%B3rio-457104751143587/" class="link-1">Facebook</a>
                                            <a href="#" class="link-2">Blogger</a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>

                                    <div class="col_1_of_4 span_1_of_4">
                                        <h4>Online help</h4>
                                        <div class="text">Nosso suporte online por Skype ou email:<br>
                                            <span>contato@clickconsultorio.com</span></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

        <div class="footer-bottom">
            <div class="wrap">
                <div class="copy">
                    <p>© ClickConsultório 2016. All Rights Reserved <a href="http://www.awktec.com">Awk Consultoria</a></p>
                </div>
            </div>
        </div>

<!-- Theme Styles -->
<link href="files/bootstrap.css" rel="stylesheet" type="text/css">
<link href="files/animations.css" rel="stylesheet" type="text/css">

<!-- Main Style -->
<link href="files/style.less" rel="stylesheet" type="text/less">
<style type="text/css" id="less:medipro-v2-demos-html-less-style">@import url(http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,400italic,700,700italic);
    @import url(http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic);


    /*
    * Title:   ClickConsultorio  - Consultório Online
    * Author:  http://www.awktec.com
    */
    /* GOOGLE FONTS */
    /* END OF GOOGLE FONTS */
    /* VARIALBLES */
    /* VARIALBLES */
    /* BASIC STYLE */

    * {
        margin: 0px;
        padding: 0px;
        -moz-box-sizing: border-box;
        /* Firefox 1, probably can drop this */
        -webkit-box-sizing: border-box;
        /* Safari 3-4, also probably droppable */
        box-sizing: border-box;
        /* Everything else */
    }
    ul,
    li {
        list-style: none;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 400;
        margin: 0;
        font-family: 'Titillium Web', sans-serif;
        font-weight: bold;
    }
    h1,
    h2 {
        font-size: 54px;
        color: #0267b9;
        padding-bottom: 74px;
        line-height: 56px;
        text-transform: uppercase;
    }
    p {
        line-height: 27px;
    }
    input,
    textarea,
    select {
        border: 0px none;
        background: none;
        font-family: 'Lato', sans-serif;
        outline: none;
    }
    /* END Of BASIC STYLE */
    /* BUTTON */
    .btn {
        color: #ffffff;
        font-size: 26px;
        /* background: #dc3522;*/
        background: #e3320c;
        text-align: center;
        text-transform: uppercase;
        font-family: 'Lato', sans-serif;
        font-weight: bold;
        line-height: 48px;
        height: 60px;
    }
    .btn-round {
        border-radius: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        -o-border-radius: 6px;
        -ms-border-radius: 6px;
    }
    /* END OF BUTTON */


    /* HEADER FORM usando... */
    .banner-form {
        width: 100%;
        height: 441px;
        padding-top: 120px;
        background-color: #286727;
        padding: 40px 12px 0px;
        visibility: hidden;
    }
    .banner-form span {
        display: block;
        color: #696969;
        font-weight: 400;
        text-align: center;
        padding-bottom: 10px;
    }
    .banner-form h2 {
        text-align: center;
        font-size: 48px;
        color: #dc3522;
        font-weight: bold;
        text-transform: uppercase;
        padding-bottom: 4px;
    }
    .banner-form form fieldset {
        margin-bottom: 20px;
        background-color: #ffffff;
        border-top: 1px solid #edf0f1;
        height: 50px;
        position: relative;
        padding: 13px !important;
    }
    .banner-form form fieldset:nth-last-child(2) {
        padding: 0px;
    }
    .banner-form form fieldset label {
        position: absolute;
        top: 9px;
        left: 22px;
        display: inline-block;
        font-size: 14px;
        color: #696969;
        font-weight: 400;
        z-index: 0;
    }
    .banner-form form fieldset input[type="text"],
    .banner-form form fieldset input[type="password"] {
        width: 100%;
        height: 20px;
        line-height: 20px;
        font-size: 15px;
        color: #9f9f9f;
        font-weight: 400;
        /* padding: 30px 22px 10px; */
        z-index: 1;
        position: relative;
    }
    .banner-form form fieldset input[type="text"]::-webkit-input-placeholder,
    .banner-form form fieldset input[type="password"]::-webkit-input-placeholder {
        color: #9f9f9f;
        opacity: 1 !important;
    }
    .banner-form form fieldset input[type="text"]:-moz-placeholder,
    .banner-form form fieldset input[type="password"]:-moz-placeholder {
        color: #9f9f9f;
        opacity: 1 !important;
    }
    .banner-form form fieldset input[type="text"]::-moz-placeholder,
    .banner-form form fieldset input[type="password"]::-moz-placeholder {
        color: #9f9f9f;
        opacity: 1 !important;
    }
    .banner-form form fieldset input[type="text"]:-ms-input-placeholder,
    .banner-form form fieldset input[type="password"]:-ms-input-placeholder {
        color: #9f9f9f;
        opacity: 1 !important;
    }
    .banner-form form fieldset span.hidden-overflow {
        overflow: hidden;
        width: 100%;
        height: 59px;
        background-position: right center;
        background-repeat: no-repeat;
        background-image: url(http://conceptbeans.co.uk/medipro/v2/demos/html/images/select-bg.png);
    }
    .banner-form form fieldset select {
        width: 105%;
        height: 59px;
        font-size: 15px;
        color: #696969;
        font-weight: 400;
        padding: 15px 20px;
        line-height: 39px;
        position: relative;
    }
    .banner-form form fieldset select option {
        padding: 5px 22px;
    }
    .banner-form input[type="submit"] {
        width: 100%;
    }
    /* END OF HEADER FORM */
    /* END OF HEADER */

</style>



<style type="text/css">
    *, html {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        margin: 0px;
        padding: 0px;
        font-size: 16px;
    }

</style>