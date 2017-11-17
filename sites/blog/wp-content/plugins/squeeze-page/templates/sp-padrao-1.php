<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);

if (have_posts())
            the_post();
$id = get_the_ID();
$descricao = get_post_meta($id, 'descricao', true);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php'); ?>
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>       
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>

    
    </head>
    <body class="sp-padrao">
        <?php
        $back = get_post_meta($id, 'background', true);
        $back = wp_get_attachment_image_src($back, 'full');
        $back = $back[0];
        $headline = get_post_meta($id, 'headline', true);
        $posicao = get_post_meta($id, 'posicao_form', true);
        
        // Configurações de cor e transparência
        $cor_box = get_post_meta($id, 'cor_box', true);
        if ($cor_box == '')
            $cor_box = '#000000';
        $trans_box = get_post_meta($id, 'trans_box', true);
        if($trans_box == '')
            $trans_box = 80;
        $trans_box = $trans_box / 100;
        $rgb = $squeeze->hex2rgb($cor_box);
        $rgba = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $trans_box . ')';

        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        ?>
        <style>
            .sp-padrao{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
            }
            <?php if ($cor_box <> '') { ?>
                .area-form-sp-padrao{
                    background: linear-gradient(to bottom, <?php echo $rgba; ?> 0%, <?php echo $rgba; ?> 100%);
                    background: -moz-linear-gradient(top, <?php echo $rgba; ?> 0%, <?php echo $rgba; ?> 100%);
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $rgba; ?>), color-stop(100%,<?php echo $rgba; ?>));
                    background: -webkit-linear-gradient(top, <?php echo $rgba; ?> 0%,<?php echo $rgba; ?> 100%);
                    background: -o-linear-gradient(top, <?php echo $rgba; ?> 0%,<?php echo $rgba; ?> 100%);
                    background: -ms-linear-gradient(top, <?php echo $rgba; ?> 0%,<?php echo $rgba; ?> 100%);
                }
            <?php } ?>
        </style>

        <div class="">
            <div class="container">
                <div class="row">
                    <div id="form-out" class="<?php squeezewp_get_animacao('animated flipInX'); ?> col-md-6 <?php echo $squeeze->get_posicao($posicao); ?> area-form-sp-padrao">
                        <h1><?php echo $headline; ?></h1>
                        <div class="form">
                            <div class="head-form">
                                <?php
                                if ($form_modal)
                                    echo $texto_modal;
                                else
                                    echo $text_form;
                                ?>
                            </div>
                            <?php echo $squeeze->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $form_modal, $text_form, $icons); ?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text_abaixo_form col-md-6 <?php echo $squeeze->get_posicao($posicao); ?>"><?php echo $text_abaixo_form; ?></div>
                </div>
            </div>
        </div>
        <?php $squeeze->criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
</html>