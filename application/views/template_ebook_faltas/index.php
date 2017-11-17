<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Agende gratuitamente consultas médicas em todo o Brasil.
    Encontre o especialista mais próximo de você. Notícias, dicas e pesquisas sobre saúde." />
    <meta id="MetaKeywords" name="KEYWORDS" content="consultas médicas, consultório, doenças, médico, médico online,
marcar consulta, marcar médico, dráuzio varela, ana escobar, atendimento,
vacinas, medicamentos, remédios, hospitais, clínicas, exames, saúde,
notícias, dicas de saúde, horas da vida, clickconsultorio">
    <meta name="author" content="ClickConsultorio">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>ClickConsultório - E-book Reduza Faltas de seus pacientes</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/lancamento/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/lancamento/css/soon.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    //assets/lancamento/js/
    <script src="assets/lancamento/js/html5shiv.js"></script>
    <script src="assets/lancamento/js/respond.min.js"></script>
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>
<!-- START BODY -->
<body class="nomobile">

<div class="col-xs-4 header-logo" style="z-index: 9999;">
    <br>
    <!--<a href="<?php echo base_url(); ?>#home"><img src="<?php echo base_url('assets'); ?>/img/logo_trans.png" alt="" class="img-responsive logo" style="width: 35%; height: 35%"></a>-->
</div>
<!-- START HEADER -->
<section id="header">
    <div class="container">
        <header>
            <!-- HEADLINE -->
            <!--<h1 ><b>ClickConsultório</b></h1>-->
            <center><img src="<?php echo base_url('assets'); ?>/img/logo_trans.png" alt="" class="img-responsive logo" style="width: 20%; height: 20%"></center>
            </br></br>
            <h4 data-animated="GoIn"><b>Agendamento online, prontuário eletrônico, gestão administrativa e muito mais.</br>
                Tenha uma gestão simples e inteligente para seu consultório médico.</br>
                <!--Plano: R$ 34,90/mês--></b></h4>
            <h5 data-animated="GoIn"><b><br>Módulo Paciente</br></br>
                Módulo de interação e compartilhamento de informações entre Pacientes e Médicos, </br>
                como dados referentes ao histórico médico do cidadão e quais exames foram feitos. <br><br>

                Criação de histórico, resultados de exames, agendamento de consultas, <br>
                localização de unidades de atendimento, dentre outras funcionalidades. <br>
                Dessa forma, o tempo da consulta será menor e, consequentemente, a espera ao atendimento, <br>
                pois o Médico terá conhecimento prévio do quadro do paciente.</b></h5>
        </header>
        <!-- START TIMER -->
        <div id="timer" data-animated="FadeIn">
            <p id="message"></p>
            <div id="days" class="timer_box"></div>
            <div id="hours" class="timer_box"></div>
            <div id="minutes" class="timer_box"></div>
            <div id="seconds" class="timer_box"></div>
        </div>
        <!-- END TIMER -->
        <div class="col-lg-4 col-lg-offset-4 mt centered">
            <h4>Entre em contato com nossa equipe!</h4>
            <!-- chamada do formulario
            <form class="form-inline" role="form" id="form" name="form" method="post" action="sendMail.php">
            <form class="form-inline" role="form" id="form" name="form" method="post" action="<?php echo base_url('assets'); ?>/lancamento/enviarEmail.php">-->
            <form class="form-inline" role="form" id="form" name="form" method="post" action="/lancamento/envia">
                <div class="form-group">
                <table width="500" border="0" align="center" cellpadding="0" cellspacing="2">
                    <tr>
                        <td align="right">Nome:</td>
                        <td align="left"><input type="text" class="form-control" name="nome" id="nome" title="Preencha o seu Nome" required/></td>
                    </tr>
                    <tr>
                        <td align="right">E-mail:</td>
                        <td align="left"><input type="text" class="form-control" name="email" id="email" title="Informe o seu E-mail" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Perfil:</td>
                        <td align="left">
                            <select class="form-control formSearch" id="perfil" name="perfil" title="Escolha um perfil" required/>
                                <option value="">Selecione o seu Perfil</option>
                                <option value="medico">Médico</option>
                                <option value="paciente">Paciente</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Mensagem:</td>
                        <td align="left"><textarea class="form-control" name="mensagem" id="mensagem" cols="45" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="btn btn-info" value="Enviar" /></td>
                    </tr>
                </table>
                    </div>
            </form>

            <!--- contatdor de visitas --->
            <div align="center">
                <br><br>
                <a href="<?php echo base_url('welcome'); ?>#home"><img src="http://contadores.gratisparaweb.com/imagen.php?contador=55&id2=482634" alt="Contadores" border="0"></a>

            </div>
            <!--- fim contador de visitas --->

        </div>

    </div>
    <!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXTE READABLE -->
    <div id="layer"></div>
    <!-- END LAYER -->
    <!-- START SLIDER -->
    <div id="slider" class="rev_slider">
        <ul>
            <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/lancamento/img/slider/1.jpg">
                <img src="assets/lancamento/img/slider/1.jpg">
            </li>
            <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/lancamento/img/slider/2.jpg">
                <img src="assets/lancamento/img/slider/2.jpg">
            </li>
            <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/lancamento/img/slider/3.jpg">
                <img src="assets/lancamento/img/slider/3.jpg">
            </li>
            <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/lancamento/img/slider/4.jpg">
                <img src="assets/lancamento/img/slider/4.jpg">
            </li>
        </ul>
    </div>
    <!-- END SLIDER -->
</section>
<!-- END HEADER -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/lancamento/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/lancamento/js/modernizr.custom.js"></script>
<script src="assets/lancamento/js/bootstrap.min.js"></script>
<script src="assets/lancamento/js/soon/plugins.js"></script>
<script src="assets/lancamento/js/soon/jquery.themepunch.revolution.min.js"></script>
<script src="assets/lancamento/js/soon/custom.js"></script>


</body>
<!-- END BODY -->
</html>