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
    <body class="politicas">
        <?php
        if (have_posts())
            the_post();
        $headline = get_post_meta($id, 'headline', true);
        $texto_politicas = get_post_meta($id, 'texto_politicas', true);

        
        ?>
        <div class="container">
            <div class="border blue"></div>
            <div class="border red"></div>
            <div class="border green"></div>
            <div class="border yellow"></div>

            <h1 class=""><?php echo $headline; ?></h1>
            <div class="texto <?php squeezewp_get_animacao('animated bounceIn'); ?>"><?php echo $texto_politicas; ?></div>
        </div>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
