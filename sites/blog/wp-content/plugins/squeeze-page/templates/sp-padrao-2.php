<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
if (have_posts())
    the_post();
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
        $id = get_the_ID();

        $back = get_post_meta($id, 'background', true);
        $back = wp_get_attachment_image_src($back, 'full');
        $back = $back[0];
        $headline = get_post_meta($id, 'headline', true);
        
        $posicao = get_post_meta($id, 'posicao_form', true);
        $botao = get_post_meta($id, 'texto_cta', true);
        $cor_botao = get_post_meta($id, 'cor_cta', true);
        $class_botao = $squeeze->get_classbotao($cor_botao);
        $link = get_post_meta($id, 'link_pagamento', true);
        $link = get_post_meta($id, 'link_pagamento', true);
        
        $form_modal = get_post_meta($id, 'form_modal', true);
        $texto_modal = get_post_meta($id, 'texto_modal', true);     
        $text_form = get_post_meta($id, 'texto_form', true);
        $text_abaixo_form = get_post_meta($id, 'text_abaixo_form', true);
        $codigo_embed = get_post_meta($id, 'codigo_embed', true);
        ?>
        <style>
            .sp-padrao{
                background-image: url(<?php echo $back; ?>);
            }
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
                                
                                else{
                                ?>
                                    <div class="col-md-12 codigo_embed">
                                        <?php echo $codigo_embed; ?>
                                    </div>
                                <?php
                                    echo $text_form;
                                }
                                ?>
                            </div>
                            <?php if($botao <> ''){ ?>
                            <a href="<?php echo $link; ?>" class="btn <?php echo $squeeze->get_classbotao($cor_botao); ?>"><?php echo $botao; ?> <i class="fa fa-mail-forward"></i></a>
                        <?php }?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                    <div class="text_abaixo_form col-md-6 <?php echo $squeeze->get_posicao($posicao); ?>"><?php echo $text_abaixo_form; ?></div>
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
