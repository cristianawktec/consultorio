<!DOCTYPE html>
<!-- precisa arrumar o js-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ClickConsultorio  - Consultório Online *** marcar consultas medicas online, médicos, marcar, consulta, online</title>

    <!-- Templete Beagle-->
    <link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../sites/beagle/dist/html/assets/css/style_beagle.css" type="text/css"/>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../sites/beagle/dist/html/assets/css/style_beagle.css" type="text/css"/>
    <!--buttons-->
    <link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/font-awesome/css/font-awesome.min.css"/>
    <!--fim buttons-->
    <!--icons-->
    <link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/select2/css/select2.min.css"/>
    <!--fim icons-->
    <!-- end Beagle-->


    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-79289611-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- end analytics-->

    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/style.css">
    <script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<!--    <script src="--><?php //echo base_url('assets'); ?><!--/js/jquery.maskedinput.js" type="text/javascript"></script>-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/img/favicon.png">

    <meta name="description" content="marcar consultas medicas online, médicos, marcar, consulta, online, clínico geral, dentista, dermatologista">
    <meta name="keywords" content="marcar consultas medicas online, médicos, marcar, consulta, online, clínico geral, dentista, dermatologista">

    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <meta content="text/css" http-equiv="Content-Style-Type" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta id="MetaDescription" name="DESCRIPTION" content="Agende gratuitamente consultas médicas em todo o Brasil.
    Encontre o especialista mais próximo de você. Notícias, dicas e pesquisas sobre saúde." />
    <meta id="MetaKeywords" name="KEYWORDS" content="consultas médicas, consultório, doenças, médico, médico online,
marcar consulta, marcar médico, dráuzio varela, ana escobar, atendimento,
vacinas, medicamentos, remédios, hospitais, clínicas, exames, saúde,
notícias, dicas de saúde, horas da vida, clickconsultorio" />
    <meta id="MetaCopyright" name="COPYRIGHT" content="Direitos reservados por ClickConsultorio 2015 - 2018 " />
    <meta id="MetaGenerator" name="GENERATOR" content=" Zollie R2 Framework ( www.zollie.com.br ) - ZL " />
    <meta id="MetaAuthor" name="AUTHOR" content="ClickConsultorio | Agendamento Online de Consultas" />
    <meta name="RESOURCE-TYPE" content="DOCUMENT" />
    <meta name="DISTRIBUTION" content="GLOBAL" />
    <meta id="MetaRobots" name="ROBOTS" content="INDEX, FOLLOW" />
    <meta name="REVISIT-AFTER" content="1 DAYS" />
    <meta name="RATING" content="GENERAL" />
    <meta http-equiv="PAGE-ENTER" content="RevealTrans(Duration=0,Transition=1)" />
    <style id="StylePlaceholder" type="text/css"></style>
    <link rel="alternate" type="application/rss+xml" title="Dicas de Saude" href="clickconsultorio.blogspot.com" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <!-- <meta property="og:type" content="ecommerce" /> -->
    <meta property="og:site_name" content="ClickConsultorio" />
    <meta property="og:description" content="Agendamento Online de Consultas" />
    <meta name="application-name" content="ClickConsultorio" />
    <meta name="msapplication-tooltip" content="ClickConsultorio - Agendamento Online de Consultas" />
    <meta name="msapplication-starturl" content="http://www.clickconsultorio.com/" />
    <meta name="msapplication-task-separator" content="Ações mais frequentes" />
    <meta name="msapplication-task" content="name=Busca Avançada;action-uri=http://www.clickconsultorio.com/consulta/nova" />
    <!--
    <meta name="msapplication-task" content="name=Minha Area;action-uri=http://www.clickconsultorio.com/login" />
    <meta name="msapplication-task" content="name=Contato;action-uri=http://www.clickconsultorio.com.br/Contato.aspx" />
    <meta name="msapplication-task-separator" content="Conteúdo" />
    <meta name="msapplication-task" content="name=Dicas de Saude;action-uri=http://saude.consultaclick.com.br/" />
    <meta name="msapplication-task" content="name=Saiba Mais;action-uri=http://www.consultaclick.com.br/SaibaMais.aspx;" />
    <meta name="msapplication-task" content="name=Planos e Preços;action-uri=http://www.consultaclick.com.br/PlanosePre�os.aspx" />
    <meta name="msapplication-task" content="name=Ajuda;action-uri=http://www.consultaclick.com.br/Ajuda.aspx" />
    <meta name="msapplication-task" content="name=Quem Somos;action-uri=http://www.consultaclick.com.br/QuemSomos.aspx" />
    <meta name="msapplication-task" content="name=Termos de Uso;action-uri=http://www.consultaclick.com.br/Termos.aspx" />
    <meta name="msapplication-task" content="name=Privacidade;action-uri=http://www.consultaclick.com.br/Privacidade.aspx" />
    <link rel="SHORTCUT ICON" href="http://www.consultaclick.com.br/favicon_cck.ico" />
    <link rel="apple-touch-icon" href="/Portals/_default/Skins/CCK/images/apple-touch-icon.png" />
    <meta name="msapplication-TileImage" content="http://www.consultaclick.com.br/images/logo-cck-small.png" />
    <meta name="msapplication-TileColor" content="#f05d2a" />


    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>

    -->
    <script type="text/javascript" >
        $(document).ready(function() {
            $(".conta").click(function() {
                var X=$(this).attr('id');

                if(X==1) {
                    $(".submenu").hide();
                    $(this).attr('id', '0');
                }

                else {
                    $(".submenu").show();
                    $(this).attr('id', '1');
                }
            });

            $(".submenu").mouseup(function() {
                return false
            });
            $(".conta").mouseup(function() {
                return false
            });

            $(document).mouseup(function() {
                $(".submenu").hide();
                $(".conta").attr('id', '');
            });

        });

    </script>

</head>
<body>
<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="http://cluster-piwik.locaweb.com.br/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 3732]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Piwik Code -->

<!-- RD Station -->
<script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/2fc9f641-d8af-488d-b56d-33315c4ea00f-loader.js" ></script>
<!-- end RD Station -->

<!-- GoogleAnalytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73890559-1', 'auto');
    ga('send', 'pageview');

</script>
<!-- end GoogleAnalytics -->
<style type="text/css">
    .green {
        #color: white !important;
        #background-color: #EF6616 !important;
        color: #fff;
        font-size: larger;
        background-color: #ed9d24;
        border-color: #ed9d24;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary.focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
        color: #fff;
        font-size: larger;
        background-color: #FFA500;
        border-color: rgba(237, 157, 36, 0.71);
    }
    .dropdown-menu{
        position:absolute;
        top:100%;left:0;
        z-index:1000;
        display:none;
        float:left;
        min-width:160px;
        padding:5px 0;
        margin:2px 0 0;
        font-size:14px;
        text-align:left;
        list-style:none;
        background-color:#fff;
        -webkit-background-clip:padding-box;
        background-clip:padding-box;
        border:1px solid #3c85c3;
        border:1px solid rgba(0,0,0,.15);
        border-radius:4px;
        -webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);
        box-shadow:0 6px 12px rgba(0,0,0,.175)
    }

    .dropdown-menu.pull-right{
        right:0;
        left:auto
    }
    .dropdown-menu .divider{
        height:1px;
        margin:9px 0;
        overflow:hidden;
        background-color:#e5e5e5
    }.dropdown-menu>li>a{
             display:block;
             padding:3px 20px;
             clear:both;
             font-weight:400;
             line-height:1.42857143;
             color:#333;
             white-space:nowrap
     }
    .dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus{
        color:#262626;
        text-decoration:none;
        background-color: #FAF0E6
    }.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus{
             color:#fff;
             text-decoration:none;
             background-color:#337ab7;
             outline:0
    }.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus{
             color:#777
    }
    .dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus{
        text-decoration:none;
        cursor:not-allowed;
        background-color:transparent;
        background-image:none;
        filter:progid:DXImageTransform.Microsoft.gradient(enabled=false)
    }
    .open>.dropdown-menu{display:block}
    .open>a{outline:0}
    .dropdown-menu-right{
        right:0;
        left:auto
    }
    .dropdown-menu-left{
        right:auto;
        left:0
    }
    .dropdown-header{
        display:block;
        padding:3px 20px;
        font-size:12px;
        line-height:1.42857143;
        color:#777;
        white-space:nowrap
    }
    .dropdown-backdrop{
        position:fixed;
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:990
    }
    .pull-right>.dropdown-menu{
        right:0;
        left:auto
    }.dropup .caret,.navbar-fixed-bottom .dropdown .caret{
             content:"";
             border-top:0;
             border-bottom:4px solid
    }
</style>
<!-- ====================================================
header section -->
<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 header-logo">
                <br>
                <a href="<?php echo base_url(); ?>#home">
                    <img src="<?php echo base_url('assets'); ?>/img/logo.png" alt="" class="img-responsive logo" style="width: 50%; height: 35%"></a>
            </div>
            <div class="col-md-9" style="margin-left: -50;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid nav-bar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="menu active" href="<?php echo base_url(); ?>#home" >Inicio</a></li>
                                <li><a class="menu" href="<?php echo base_url(); ?>#about">Sobre Nós</a></li>
                                <li><a class="menu" href="<?php echo base_url(); ?>#vantagens">Vantagens</a></li>
                                <li><a class="menu" href="<?php echo base_url(); ?>#comofunciona">Como Funciona?</a></li>
                                <li><a class="menu" href="<?php echo base_url(); ?>planos">Planos</a></li>
                                <li><a class="menu" href="<?php echo base_url(); ?>#contact">Contato</a></li>
                                <li><a class="menu" href="http://blog.clickconsultorio.com/">Blog</a></li>
                                <!--<li><a class="menu" href="https://clickconsultorio.blogspot.com">Blog</a></li>-->
                                <?php if($this->session->usuario && $this->session->usuario->id_perfil == 2){ ?>
                                    <li><a class="menu" href="<?php echo base_url(); ?>medico/perfil">Meu Perfil</a></li>
                                    <li><a class="menu" href="<?php echo base_url(); ?>login/logout">Sair</a></li>
                                <?php } elseif($this->session->usuario && $this->session->usuario->id_perfil == 1){ ?>
                                    <li><a class="menu" href="<?php echo base_url(); ?>paciente/perfil">Meu Perfil</a></li>
                                    <li><a class="menu" href="<?php echo base_url(); ?>login/logout">Sair</a></li>
                                <?php } else{ ?>
                                    <li><a class="menu" href="<?php echo base_url(); ?>login">Login</a></li>
                                    <li>
                                        <div class="dropdown home" style="position: absolute !important;">
                                            <button class="green btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="padding: 4px 6px;">
                                                CADASTRE-SE
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url(); ?>medico/registro">Médicos</a></li>
                                                <li><a href="<?php echo base_url(); ?>paciente/registro">Pacientes</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div><!-- /navbar-collapse -->
                    </div><!-- / .container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</header> <!-- end of header area -->

<?php
// Identificador de palavaras chaves Piwiki LocaWeb
// This function will call the API to get best keyword for current URL.
// Then it writes the list of best keywords in a HTML list
function DisplayTopKeywords($url = "")
{
// Do not spend more than 1 second fetching the data
@ini_set("default_socket_timeout", $timeout = 1);
// Get the Keywords data
$url = empty($url) ? "http://". $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] : $url;
$api = "https://cluster-piwik.locaweb.com.br/?module=API&method=Referrers.getKeywordsForPageUrl&format=php&filter_limit=10&token_auth=a0cff0b1f9131628a39a2b11f3545938&date=previous1&period=week&idSite=3732&url=" . urlencode($url);
$keywords = @unserialize(file_get_contents($api));
if ($keywords === false || isset($keywords["result"])) {
// DEBUG ONLY: uncomment for troubleshooting an empty output (the URL output reveals the token_auth)
// echo "Error while fetching the <a href='$api'>Top Keywords from Piwik</a>";
return;
}

// Display the list in HTML
$url = htmlspecialchars($url, ENT_QUOTES);
$output = "<h2>Top Keywords for <a href='$url'>$url</a></h2><ul>";
    foreach($keywords as $keyword) {
    $output .= "<li>". $keyword . "</li>";
    }
    if (empty($keywords)) { $output .= "Nothing yet..."; }
    $output .= "</ul>";
echo $output;
}

//DisplayTopKeywords();
 ?>