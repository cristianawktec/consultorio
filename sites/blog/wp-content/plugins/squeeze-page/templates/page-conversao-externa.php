<?php
require_once(plugin_dir_path(__FILE__) . '../inc/teste-ab/teste-ab-site.php');
require_once(plugin_dir_path(__FILE__) . '../salva-cookie.php');

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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <style>
        .page-conversao-externa{
            margin-top: 100px;
            text-align: center;
            font-size: 120px;
        }
    </style>
    <body>
        
        <?php
        if (have_posts())
            the_post();

        $url = get_post_meta($id, 'url_redirecionamento', true);
        ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>
        <meta http-equiv="refresh" content="0;url=<?php echo $url; ?>">
        <div class="col-md-4 col-md-offset-4 page-conversao-externa">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
    </body>

</html>
