<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

$squeeze = SqueezeWP::get_instance();
$locale = $squeeze->get_locale();

$theme_path = plugins_url('..', __FILE__);
?>
<!DOCTYPE html>
<html lang="en">
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
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/animate.php'); ?>	
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/css.php'); ?>
    </head>
    <body class="confirme-inscricao-1">
        <?php
        if (have_posts())
            the_post();
        $headline = get_post_meta($id, 'headline', true);

        $titulo1 = get_post_meta($id, 'titulo_1', true);
        $texto1 = get_post_meta($id, 'passo_1', true);

        $titulo2 = get_post_meta($id, 'titulo_2', true);
        $texto2 = get_post_meta($id, 'passo_2', true);

        $titulo3 = get_post_meta($id, 'titulo_3', true);
        $texto3 = get_post_meta($id, 'passo_3', true);

        $titulo4 = get_post_meta($id, 'titulo_4', true);
        $texto4 = get_post_meta($id, 'passo_4', true);

        ?>
        <div id="header">
            <div class="container">
                <h1><?php echo $headline; ?></h1>
            </div>
        </div>
        <div class="">
            <div class="container inside">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php if ($titulo1 <> ''){ ?>
                        <div class="step <?php squeezewp_get_animacao('animated bounceInLeft'); ?>" id="step1">
                            <div class="step-1">1</div>
                            <div class="title-step"><?php echo $titulo1; ?></div>
                            <div class="subtitle-step"><?php echo $texto1; ?></div>

                            <div class="clearfix"></div>

                            <div class="provedores">
                                <div class="col-md-3 link-mail">
                                    <a href="http://gmail.com" target="_blank">
                                        <img src="<?php echo $theme_path; ?>/images/gmail.png" />
                                        <div class="link-mail">GMail</div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-md-offset-1 link-mail">
                                    <a href="http://outlook.com" target="_blank">
                                        <img src="<?php echo $theme_path; ?>/images/outlook.png" />
                                        <div class="link-mail">Outlook / Hotmail</div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-md-offset-1 link-mail">
                                    <a href="http://yahoo.com.br" target="_blank">
                                        <img src="<?php echo $theme_path; ?>/images/yahoo.png" />
                                        <div class="link-mail">Yahoo</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php }?>
                        <?php if ($titulo2 <> ''){ ?>
                        <div class="step margin-20 <?php squeezewp_get_animacao('animated bounceInLeft'); ?>" id="step2">
                            <div class="step-1">2</div>
                            <div class="title-step"><?php echo $titulo2; ?></div>
                            <div class="subtitle-step"><?php echo $texto2; ?></div>
                        </div>
                        <?php }?>
                        <?php if ($titulo3 <> ''){ ?>
                        <div class="step margin-20 <?php squeezewp_get_animacao('animated bounceInLeft'); ?>" id="step3">
                            <div class="step-1">3</div>
                            <div class="title-step"><?php echo $titulo3; ?></div>
                            <div class="subtitle-step"><?php echo $texto3; ?></div>
                        </div>
                        <?php } ?>
                        <?php if ($titulo4 <> ''){ ?>
                        <div class="step margin-20 <?php squeezewp_get_animacao('animated bounceInLeft'); ?>" id="step4">
                            <div class="step-1">4</div>
                            <div class="title-step"><?php echo $titulo4; ?></div>
                            <div class="subtitle-step"><?php echo $texto4; ?></div>
                        </div>
                        <?php } ?>
                    </div>

                </div>

            </div>

        </div>

        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>

    </body>

</html>
