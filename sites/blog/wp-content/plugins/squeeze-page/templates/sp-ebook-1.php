<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();

$theme_path = plugins_url('..', __FILE__);
if (have_posts())
    the_post();
$descricao = get_post_meta($id, 'descricao', true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php'); ?>
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
    </head>

    <body class="sp-ebook-1">

        <?php
        $ebook = get_post_meta($id, 'ebook', true);
        $ebook = wp_get_attachment_image_src($ebook, 'full');
        $ebook = $ebook[0];
        
        $headline = get_post_meta($id, 'headline', true);
        $subheadline = get_post_meta($id, 'subheadline', true);
        
        $titulo_descritivo = get_post_meta($id, 'titulo_descritivo', true);
        $texto_descritivo = get_post_meta($id, 'texto_descritivo', true);
        $lista_beneficios = get_post_meta($id, 'lista_beneficios', true);
        
        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        require_once(plugin_dir_path(__FILE__) . '../inc/cabecalho.php');
        
        ?>
        <div class="area-form-sp-video">
            <div class="container">
                <div class="row">
                    <h1><?php echo $headline; ?></h1>
                    <h2><?php echo $subheadline; ?></h2>
                    <div class="<?php squeezewp_get_animacao('animated zoomIn'); ?> col-md-4" id="ebook">
                        <img src="<?php echo $ebook; ?>" />
                    </div>
                    <div class="col-md-3 <?php squeezewp_get_animacao('animated bounceInLeft'); ?>" id="seta-form">
                        <img class="img-seta" src="<?php echo $theme_path ?>/images/seta-verde-direita.png" />
                    </div>
                    <div class="col-md-5 <?php squeezewp_get_animacao('animated bounceInRight'); ?>" id="form-out-ebook">
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
                            <?php echo $squeeze->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $form_modal, $text_form, $icons); ?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                        </div>
                        <div class="clearfix"></div>
                    <div class="text_abaixo_form black"><?php echo $text_abaixo_form; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="descritivo <?php squeezewp_get_animacao('animated zoomIn'); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3><?php echo $titulo_descritivo; ?></h3>
                        <h4><?php echo $texto_descritivo; ?></h4>
                    </div>
                    <div class="col-md-6">
                        <?php echo $lista_beneficios; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $squeeze->criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/texto-explicativo.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/depoimentos.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/rodape.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
        <script src="<?php echo $theme_path; ?>/js/scroll.js"></script>
    </body>
</html>
