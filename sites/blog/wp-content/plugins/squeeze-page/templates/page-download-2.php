<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php the_title(); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo $theme_path; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/style-sp.css" rel="stylesheet">
        <link href="<?php echo $theme_path; ?>/css/animate.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/fontes.php'); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>
    </head>
    <body class="confirme-inscricao-2 page-download-2">
        <div class="overlay"></div>
        <?php
        if (have_posts())
            the_post();

        $back = get_post_meta($id, 'background', true);
        $back = wp_get_attachment_image_src($back, 'full');
        $back = $back[0];


        $link = get_post_meta($id, 'link_ebook', true);
        $headline = get_post_meta($id, 'headline', true);
        $subheadline = get_post_meta($id, 'subheadline', true);
        $botao = get_post_meta($id, 'texto_cta', true);
        $cor_botao = get_post_meta($id, 'cor_cta', true);
        $titulo = get_post_meta($id, 'titulo_descritivo', true);
        $texto_descritivo = get_post_meta($id, 'texto_descritivo', true);
        $url_confirmacao = get_post_meta($id, 'protecao', true);

        $url_redirecionamento = get_post_meta($id, 'url_redirecionamento', true);

        if ($url_confirmacao <> '')
            require_once(plugin_dir_path(__FILE__) . '../le-cookie.php');
        ?>
        <style>
            .confirme-inscricao-2{
                <?php if ($back <> null) { ?>
                    background-image: url(<?php echo $back; ?>);
                <?php } ?>
            }
        </style>
        <div id="header" class="row">
            <div class="container">
                <h1><?php echo $headline; ?></h1>
                <h2><?php echo $subheadline; ?></h2>
            </div>
        </div>
        <div class="">
            <div class="container inside">
                <div class="row">
                    <div class="col-md-4 mail <?php squeezewp_get_animacao('animated zoomIn'); ?>">
                        <img src="<?php echo $theme_path; ?>/images/download-icon.png" />
                    </div>
                    <div id="form-out-ebook" class="col-md-8 <?php squeezewp_get_animacao('animated bounceInRight'); ?>">
                        <h3><?php echo $texto_descritivo; ?></h3>
                        <a class="<?php squeezewp_get_animacao('animated pulse'); ?> btn <?php echo $squeeze->get_classbotao($cor_botao); ?>" href="<?php echo $link; ?>"><?php echo $botao; ?></a>
                        <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>

                    </div>



                </div>

            </div>

        </div>



        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->



        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>

    </body>

</html>
