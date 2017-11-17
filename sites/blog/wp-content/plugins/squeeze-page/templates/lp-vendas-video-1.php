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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php the_title(); ?></title>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/facebook.php');?>
        <!-- Bootstrap -->
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
    <body class="lp-vendas-video-1">
        <?php
        if (have_posts())
            the_post();
        $urlvideo = get_post_meta($id, 'video', true);
        $urlvideo = explode('watch?v=', $urlvideo);
        $urlvideo = explode('&', $urlvideo[1]);
        $urlvideo = '//www.youtube.com/embed/' . $urlvideo[0];

        $headline = get_post_meta($id, 'headline', true);
        $texto_lp_vendas = get_post_meta($id, 'texto_lp_vendas', true);

        
        $tipo_cta = get_post_meta($id, 'tipo_cta', true);
        $botao = get_post_meta($id, 'texto_cta', true);
        $cor_botao = get_post_meta($id, 'cor_cta', true);
        $class_botao = $squeeze->get_classbotao($cor_botao);
        $tempo = get_post_meta($id, 'tempo_botao', true);
        $link = get_post_meta($id, 'link_pagamento', true);
        $cta_embed = get_post_meta($id, 'cta_embed', true);
        
        $largura = get_post_meta($id, 'largura_video', true);
        $altura = get_post_meta($id, 'altura_video', true);
        $tipo_video = get_post_meta($id, 'tipo_video', true);
        $embed_video = get_post_meta($id, 'embed_video', true);

        if ($tipo_video == 'embed'){
            $video = $embed_video;
        }
        else{
            $video = '<iframe width="' . $largura . '" height="' . $altura . '" src="' . $urlvideo . '?wmode=opaque&amp;showinfo=0&amp;autoplay=1&amp;controls=0&amp;modestbranding=1&amp;rel=0" frameborder="0" allowfullscreen=""></iframe>';
        }

        ?>
        <style>
            #botao-compra{
                animation-duration: 2s;
                animation-delay: <?php echo $tempo; ?>s;
                animation-iteration-count: 1;
                -webkit-animation-duration: 2s;
                -webkit-animation-delay: <?php echo $tempo; ?>s;
                -webkit-animation-iteration-count: 1;
                -moz-animation-duration: 2s;
                -moz-animation-delay: <?php echo $tempo; ?>s;
                -moz-animation-iteration-count: 1;
            }
        </style>
        <div class="container">
            <h1><?php echo $headline; ?></h1>
            <div class="video-vendas">
                <?php echo $video; ?>
            </div>
            <div class="row">
                <div class="col-md-12 texto_lp_vendas"><?php echo $texto_lp_vendas; ?></div>
                <div class="<?php squeezewp_get_animacao('animated zoomIn'); ?> col-md-6 col-md-offset-3" id="botao-compra">
                    <?php
                        if ($tipo_cta == 'codigo')
                            echo '<div class="cta-embed">' . $cta_embed . '</div>';
                        else  { ?> 
                            <a href="<?php echo $link; ?>" class="btn <?php echo $squeeze->get_classbotao($cor_botao); ?>"><?php echo $botao; ?></a>
                        <?php } ?>
                </div>
            </div>
        </div>
        
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
</html>
