<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();

$url = plugins_url('..', __FILE__);
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
        <link href="<?php echo $url; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $url; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $url; ?>/css/animate.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
    <body class="registro-webinario">
        <?php
        $headline = get_post_meta($id, 'headline', true);
        $data_webinario = get_post_meta($id, 'data_webinario', true);
        $data_webinario = explode('/', $data_webinario);
        require_once(plugin_dir_path(__FILE__) . '../inc/form.php');
        
        $data_extenso = get_post_meta($id, 'data_extenso_webinario', true);
        $informacoes_webinario = get_post_meta($id, 'informacoes_webinario', true);
        $foto_palestrante = get_post_meta($id, 'foto_palestrante', true);
        $foto_palestrante = wp_get_attachment_image_src($foto_palestrante, 'full');
        $foto_palestrante = $foto_palestrante[0];
        $texto_palestrante = get_post_meta($id, 'texto_palestrante', true);
        
        $informacoes_inscritos = get_post_meta($id, 'informacoes_inscritos', true);
        ?>
        <div id="header">
            <div class="container">
                <h1><?php echo $headline; ?></h1>
            </div>
        </div>
        <div class="data-chamada">
            <div class="container">
                <div>
                    <div class="col-md-2 calendario">
                        <div class="mes">
                            <?php echo $squeeze->retorna_mes($data_webinario[1]); ?>
                        </div>
                        <div class="dia">
                            <?php echo $data_webinario[0]; ?>
                        </div>
                    </div>
                    <div class="col-md-4 data-extenso">
                      <?php echo $data_extenso; ?> 
                    </div>
                    
                    <div class="col-md-6">
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
                    </div>

                </div>

            </div>

        </div>
        
        <div class="assunto-foto">
            <div class="container">
                <div class="col-md-6">
                    <?php echo $informacoes_webinario; ?>
                </div>
                <div class="col-md-6 espaco-palestrante">
                    <img class="palestrante" src="<?php echo $foto_palestrante; ?>" />
                    <?php echo $texto_palestrante; ?>
                    <div class="div-share">
                        <a class="share-popup" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" title="Compartilhar via Facebook" target="_blank">
                        <span><i class="fa fa-facebook-square"></i> Facebook</span>
                    </a>
                    <a class="share-popup twitter" href="http://twitter.com/share?url=<?php echo get_permalink();?>&text=Acabei de me inscrever no Webinário: Como criar uma página de captura..." title="Compartilhar no Twitter" target="_blank">
                        <span><i class="fa fa-twitter"></i>Twitter</span>
                    </a>
                    <a class="share-popup google-plus" href="https://plus.google.com/share?url=<?php echo get_permalink();?>" title="Compartilhar no Google Plus" target="_blank">
                        <span><i class="fa fa-google-plus-square"></i><span>Google Plus</span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="atencao-inscritos">
            <div class="container">
                <?php echo $informacoes_inscritos; ?>
            </div>
        </div>
        <?php $squeeze->criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <script src="<?php echo $url; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>

    </body>

</html>
