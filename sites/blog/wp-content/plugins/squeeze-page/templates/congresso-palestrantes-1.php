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
    <body class="sp-padrao congresso-palestrantes-1">
        <?php
        $back = get_post_meta($id, 'background', true);
        $back = wp_get_attachment_image_src($back, 'full');
        $back = $back[0];

        $logo = get_post_meta($id, 'logo', true);
        $logo = wp_get_attachment_image_src($logo, 'full');
        $logo = $logo[0];

        $headline = get_post_meta($id, 'headline', true);
        $subheadline = get_post_meta($id, 'subheadline', true);
        $posicao = get_post_meta($id, 'posicao_form', true);

        $exibir_entre_datas = get_post_meta($id, 'exibir_entre_datas', true);

        $video_iframe = get_post_meta($id, 'video_iframe', true);

        $dia_1_data = get_post_meta($id, 'dia_1_data', true);
        $dia_1_titulo = get_post_meta($id, 'dia_1_titulo', true);

        $dia_2_data = get_post_meta($id, 'dia_2_data', true);
        $dia_2_titulo = get_post_meta($id, 'dia_2_titulo', true);

        $dia_3_data = get_post_meta($id, 'dia_3_data', true);
        $dia_3_titulo = get_post_meta($id, 'dia_3_titulo', true);

        $dia_4_data = get_post_meta($id, 'dia_4_data', true);
        $dia_4_titulo = get_post_meta($id, 'dia_4_titulo', true);

        $dia_5_data = get_post_meta($id, 'dia_5_data', true);
        $dia_5_titulo = get_post_meta($id, 'dia_5_titulo', true);

        $dia_6_data = get_post_meta($id, 'dia_6_data', true);
        $dia_6_titulo = get_post_meta($id, 'dia_6_titulo', true);

        $dia_7_data = get_post_meta($id, 'dia_7_data', true);
        $dia_7_titulo = get_post_meta($id, 'dia_7_titulo', true);

        $dia_8_data = get_post_meta($id, 'dia_8_data', true);
        $dia_8_titulo = get_post_meta($id, 'dia_8_titulo', true);

        $dia_9_data = get_post_meta($id, 'dia_9_data', true);
        $dia_9_titulo = get_post_meta($id, 'dia_9_titulo', true);

        $dia_10_data = get_post_meta($id, 'dia_10_data', true);
        $dia_10_titulo = get_post_meta($id, 'dia_10_titulo', true);

        $dias = array(
            array($dia_1_data, $dia_1_titulo),
            array($dia_2_data, $dia_2_titulo),
            array($dia_3_data, $dia_3_titulo),
            array($dia_4_data, $dia_4_titulo),
            array($dia_5_data, $dia_5_titulo),
            array($dia_6_data, $dia_6_titulo),
            array($dia_7_data, $dia_7_titulo),
            array($dia_8_data, $dia_8_titulo),
            array($dia_9_data, $dia_9_titulo),
            array($dia_10_data, $dia_10_titulo),
        );

        $destaque_palestrante = get_post_meta($id, 'destaque_palestrante', true);

        $palestrante_1_nome = get_post_meta($id, 'palestrante_1_nome', true); $palestrante_1_bio = get_post_meta($id, 'palestrante_1_bio', true); $palestrante_1_tema = get_post_meta($id, 'palestrante_1_tema', true); $palestrante_1_hora = get_post_meta($id, 'palestrante_1_hora', true); $palestrante_1_foto = get_post_meta($id, 'palestrante_1_foto', true); $palestrante_1_foto = wp_get_attachment_image_src($palestrante_1_foto, 'full'); $palestrante_1_foto = $palestrante_1_foto[0]; $palestrante1 = array($palestrante_1_nome, $palestrante_1_bio, $palestrante_1_tema, $palestrante_1_hora, $palestrante_1_foto); $palestrante_2_nome = get_post_meta($id, 'palestrante_2_nome', true); $palestrante_2_bio = get_post_meta($id, 'palestrante_2_bio', true); $palestrante_2_tema = get_post_meta($id, 'palestrante_2_tema', true); $palestrante_2_hora = get_post_meta($id, 'palestrante_2_hora', true); $palestrante_2_foto = get_post_meta($id, 'palestrante_2_foto', true); $palestrante_2_foto = wp_get_attachment_image_src($palestrante_2_foto, 'full'); $palestrante_2_foto = $palestrante_2_foto[0]; $palestrante2 = array($palestrante_2_nome, $palestrante_2_bio, $palestrante_2_tema, $palestrante_2_hora, $palestrante_2_foto); $palestrante_3_nome = get_post_meta($id, 'palestrante_3_nome', true); $palestrante_3_bio = get_post_meta($id, 'palestrante_3_bio', true); $palestrante_3_tema = get_post_meta($id, 'palestrante_3_tema', true); $palestrante_3_hora = get_post_meta($id, 'palestrante_3_hora', true); $palestrante_3_foto = get_post_meta($id, 'palestrante_3_foto', true); $palestrante_3_foto = wp_get_attachment_image_src($palestrante_3_foto, 'full'); $palestrante_3_foto = $palestrante_3_foto[0]; $palestrante3 = array($palestrante_3_nome, $palestrante_3_bio, $palestrante_3_tema, $palestrante_3_hora, $palestrante_3_foto); $palestrante_4_nome = get_post_meta($id, 'palestrante_4_nome', true); $palestrante_4_bio = get_post_meta($id, 'palestrante_4_bio', true); $palestrante_4_tema = get_post_meta($id, 'palestrante_4_tema', true); $palestrante_4_hora = get_post_meta($id, 'palestrante_4_hora', true); $palestrante_4_foto = get_post_meta($id, 'palestrante_4_foto', true); $palestrante_4_foto = wp_get_attachment_image_src($palestrante_4_foto, 'full'); $palestrante_4_foto = $palestrante_4_foto[0]; $palestrante4 = array($palestrante_4_nome, $palestrante_4_bio, $palestrante_4_tema, $palestrante_4_hora, $palestrante_4_foto); $palestrante_5_nome = get_post_meta($id, 'palestrante_5_nome', true); $palestrante_5_bio = get_post_meta($id, 'palestrante_5_bio', true); $palestrante_5_tema = get_post_meta($id, 'palestrante_5_tema', true); $palestrante_5_hora = get_post_meta($id, 'palestrante_5_hora', true); $palestrante_5_foto = get_post_meta($id, 'palestrante_5_foto', true); $palestrante_5_foto = wp_get_attachment_image_src($palestrante_5_foto, 'full'); $palestrante_5_foto = $palestrante_5_foto[0]; $palestrante5 = array($palestrante_5_nome, $palestrante_5_bio, $palestrante_5_tema, $palestrante_5_hora, $palestrante_5_foto); $palestrante_6_nome = get_post_meta($id, 'palestrante_6_nome', true); $palestrante_6_bio = get_post_meta($id, 'palestrante_6_bio', true); $palestrante_6_tema = get_post_meta($id, 'palestrante_6_tema', true); $palestrante_6_hora = get_post_meta($id, 'palestrante_6_hora', true); $palestrante_6_foto = get_post_meta($id, 'palestrante_6_foto', true); $palestrante_6_foto = wp_get_attachment_image_src($palestrante_6_foto, 'full'); $palestrante_6_foto = $palestrante_6_foto[0]; $palestrante6 = array($palestrante_6_nome, $palestrante_6_bio, $palestrante_6_tema, $palestrante_6_hora, $palestrante_6_foto); $palestrante_7_nome = get_post_meta($id, 'palestrante_7_nome', true); $palestrante_7_bio = get_post_meta($id, 'palestrante_7_bio', true); $palestrante_7_tema = get_post_meta($id, 'palestrante_7_tema', true); $palestrante_7_hora = get_post_meta($id, 'palestrante_7_hora', true); $palestrante_7_foto = get_post_meta($id, 'palestrante_7_foto', true); $palestrante_7_foto = wp_get_attachment_image_src($palestrante_7_foto, 'full'); $palestrante_7_foto = $palestrante_7_foto[0]; $palestrante7 = array($palestrante_7_nome, $palestrante_7_bio, $palestrante_7_tema, $palestrante_7_hora, $palestrante_7_foto); $palestrante_8_nome = get_post_meta($id, 'palestrante_8_nome', true); $palestrante_8_bio = get_post_meta($id, 'palestrante_8_bio', true); $palestrante_8_tema = get_post_meta($id, 'palestrante_8_tema', true); $palestrante_8_hora = get_post_meta($id, 'palestrante_8_hora', true); $palestrante_8_foto = get_post_meta($id, 'palestrante_8_foto', true); $palestrante_8_foto = wp_get_attachment_image_src($palestrante_8_foto, 'full'); $palestrante_8_foto = $palestrante_8_foto[0]; $palestrante8 = array($palestrante_8_nome, $palestrante_8_bio, $palestrante_8_tema, $palestrante_8_hora, $palestrante_8_foto); $palestrante_9_nome = get_post_meta($id, 'palestrante_9_nome', true); $palestrante_9_bio = get_post_meta($id, 'palestrante_9_bio', true); $palestrante_9_tema = get_post_meta($id, 'palestrante_9_tema', true); $palestrante_9_hora = get_post_meta($id, 'palestrante_9_hora', true); $palestrante_9_foto = get_post_meta($id, 'palestrante_9_foto', true); $palestrante_9_foto = wp_get_attachment_image_src($palestrante_9_foto, 'full'); $palestrante_9_foto = $palestrante_9_foto[0]; $palestrante9 = array($palestrante_9_nome, $palestrante_9_bio, $palestrante_9_tema, $palestrante_9_hora, $palestrante_9_foto); $palestrante_10_nome = get_post_meta($id, 'palestrante_10_nome', true); $palestrante_10_bio = get_post_meta($id, 'palestrante_10_bio', true); $palestrante_10_tema = get_post_meta($id, 'palestrante_10_tema', true); $palestrante_10_hora = get_post_meta($id, 'palestrante_10_hora', true); $palestrante_10_foto = get_post_meta($id, 'palestrante_10_foto', true); $palestrante_10_foto = wp_get_attachment_image_src($palestrante_10_foto, 'full'); $palestrante_10_foto = $palestrante_10_foto[0]; $palestrante10 = array($palestrante_10_nome, $palestrante_10_bio, $palestrante_10_tema, $palestrante_10_hora, $palestrante_10_foto); $palestrante_11_nome = get_post_meta($id, 'palestrante_11_nome', true); $palestrante_11_bio = get_post_meta($id, 'palestrante_11_bio', true); $palestrante_11_tema = get_post_meta($id, 'palestrante_11_tema', true); $palestrante_11_hora = get_post_meta($id, 'palestrante_11_hora', true); $palestrante_11_foto = get_post_meta($id, 'palestrante_11_foto', true); $palestrante_11_foto = wp_get_attachment_image_src($palestrante_11_foto, 'full'); $palestrante_11_foto = $palestrante_11_foto[0]; $palestrante11 = array($palestrante_11_nome, $palestrante_11_bio, $palestrante_11_tema, $palestrante_11_hora, $palestrante_11_foto); $palestrante_12_nome = get_post_meta($id, 'palestrante_12_nome', true); $palestrante_12_bio = get_post_meta($id, 'palestrante_12_bio', true); $palestrante_12_tema = get_post_meta($id, 'palestrante_12_tema', true); $palestrante_12_hora = get_post_meta($id, 'palestrante_12_hora', true); $palestrante_12_foto = get_post_meta($id, 'palestrante_12_foto', true); $palestrante_12_foto = wp_get_attachment_image_src($palestrante_12_foto, 'full'); $palestrante_12_foto = $palestrante_12_foto[0]; $palestrante12 = array($palestrante_12_nome, $palestrante_12_bio, $palestrante_12_tema, $palestrante_12_hora, $palestrante_12_foto); $palestrante_13_nome = get_post_meta($id, 'palestrante_13_nome', true); $palestrante_13_bio = get_post_meta($id, 'palestrante_13_bio', true); $palestrante_13_tema = get_post_meta($id, 'palestrante_13_tema', true); $palestrante_13_hora = get_post_meta($id, 'palestrante_13_hora', true); $palestrante_13_foto = get_post_meta($id, 'palestrante_13_foto', true); $palestrante_13_foto = wp_get_attachment_image_src($palestrante_13_foto, 'full'); $palestrante_13_foto = $palestrante_13_foto[0]; $palestrante13 = array($palestrante_13_nome, $palestrante_13_bio, $palestrante_13_tema, $palestrante_13_hora, $palestrante_13_foto); $palestrante_14_nome = get_post_meta($id, 'palestrante_14_nome', true); $palestrante_14_bio = get_post_meta($id, 'palestrante_14_bio', true); $palestrante_14_tema = get_post_meta($id, 'palestrante_14_tema', true); $palestrante_14_hora = get_post_meta($id, 'palestrante_14_hora', true); $palestrante_14_foto = get_post_meta($id, 'palestrante_14_foto', true); $palestrante_14_foto = wp_get_attachment_image_src($palestrante_14_foto, 'full'); $palestrante_14_foto = $palestrante_14_foto[0]; $palestrante14 = array($palestrante_14_nome, $palestrante_14_bio, $palestrante_14_tema, $palestrante_14_hora, $palestrante_14_foto); $palestrante_15_nome = get_post_meta($id, 'palestrante_15_nome', true); $palestrante_15_bio = get_post_meta($id, 'palestrante_15_bio', true); $palestrante_15_tema = get_post_meta($id, 'palestrante_15_tema', true); $palestrante_15_hora = get_post_meta($id, 'palestrante_15_hora', true); $palestrante_15_foto = get_post_meta($id, 'palestrante_15_foto', true); $palestrante_15_foto = wp_get_attachment_image_src($palestrante_15_foto, 'full'); $palestrante_15_foto = $palestrante_15_foto[0]; $palestrante15 = array($palestrante_15_nome, $palestrante_15_bio, $palestrante_15_tema, $palestrante_15_hora, $palestrante_15_foto); $palestrante_16_nome = get_post_meta($id, 'palestrante_16_nome', true); $palestrante_16_bio = get_post_meta($id, 'palestrante_16_bio', true); $palestrante_16_tema = get_post_meta($id, 'palestrante_16_tema', true); $palestrante_16_hora = get_post_meta($id, 'palestrante_16_hora', true); $palestrante_16_foto = get_post_meta($id, 'palestrante_16_foto', true); $palestrante_16_foto = wp_get_attachment_image_src($palestrante_16_foto, 'full'); $palestrante_16_foto = $palestrante_16_foto[0]; $palestrante16 = array($palestrante_16_nome, $palestrante_16_bio, $palestrante_16_tema, $palestrante_16_hora, $palestrante_16_foto); $palestrante_17_nome = get_post_meta($id, 'palestrante_17_nome', true); $palestrante_17_bio = get_post_meta($id, 'palestrante_17_bio', true); $palestrante_17_tema = get_post_meta($id, 'palestrante_17_tema', true); $palestrante_17_hora = get_post_meta($id, 'palestrante_17_hora', true); $palestrante_17_foto = get_post_meta($id, 'palestrante_17_foto', true); $palestrante_17_foto = wp_get_attachment_image_src($palestrante_17_foto, 'full'); $palestrante_17_foto = $palestrante_17_foto[0]; $palestrante17 = array($palestrante_17_nome, $palestrante_17_bio, $palestrante_17_tema, $palestrante_17_hora, $palestrante_17_foto); $palestrante_18_nome = get_post_meta($id, 'palestrante_18_nome', true); $palestrante_18_bio = get_post_meta($id, 'palestrante_18_bio', true); $palestrante_18_tema = get_post_meta($id, 'palestrante_18_tema', true); $palestrante_18_hora = get_post_meta($id, 'palestrante_18_hora', true); $palestrante_18_foto = get_post_meta($id, 'palestrante_18_foto', true); $palestrante_18_foto = wp_get_attachment_image_src($palestrante_18_foto, 'full'); $palestrante_18_foto = $palestrante_18_foto[0]; $palestrante18 = array($palestrante_18_nome, $palestrante_18_bio, $palestrante_18_tema, $palestrante_18_hora, $palestrante_18_foto); $palestrante_19_nome = get_post_meta($id, 'palestrante_19_nome', true); $palestrante_19_bio = get_post_meta($id, 'palestrante_19_bio', true); $palestrante_19_tema = get_post_meta($id, 'palestrante_19_tema', true); $palestrante_19_hora = get_post_meta($id, 'palestrante_19_hora', true); $palestrante_19_foto = get_post_meta($id, 'palestrante_19_foto', true); $palestrante_19_foto = wp_get_attachment_image_src($palestrante_19_foto, 'full'); $palestrante_19_foto = $palestrante_19_foto[0]; $palestrante19 = array($palestrante_19_nome, $palestrante_19_bio, $palestrante_19_tema, $palestrante_19_hora, $palestrante_19_foto); $palestrante_20_nome = get_post_meta($id, 'palestrante_20_nome', true); $palestrante_20_bio = get_post_meta($id, 'palestrante_20_bio', true); $palestrante_20_tema = get_post_meta($id, 'palestrante_20_tema', true); $palestrante_20_hora = get_post_meta($id, 'palestrante_20_hora', true); $palestrante_20_foto = get_post_meta($id, 'palestrante_20_foto', true); $palestrante_20_foto = wp_get_attachment_image_src($palestrante_20_foto, 'full'); $palestrante_20_foto = $palestrante_20_foto[0]; $palestrante20 = array($palestrante_20_nome, $palestrante_20_bio, $palestrante_20_tema, $palestrante_20_hora, $palestrante_20_foto); $palestrante_21_nome = get_post_meta($id, 'palestrante_21_nome', true); $palestrante_21_bio = get_post_meta($id, 'palestrante_21_bio', true); $palestrante_21_tema = get_post_meta($id, 'palestrante_21_tema', true); $palestrante_21_hora = get_post_meta($id, 'palestrante_21_hora', true); $palestrante_21_foto = get_post_meta($id, 'palestrante_21_foto', true); $palestrante_21_foto = wp_get_attachment_image_src($palestrante_21_foto, 'full'); $palestrante_21_foto = $palestrante_21_foto[0]; $palestrante21 = array($palestrante_21_nome, $palestrante_21_bio, $palestrante_21_tema, $palestrante_21_hora, $palestrante_21_foto); $palestrante_22_nome = get_post_meta($id, 'palestrante_22_nome', true); $palestrante_22_bio = get_post_meta($id, 'palestrante_22_bio', true); $palestrante_22_tema = get_post_meta($id, 'palestrante_22_tema', true); $palestrante_22_hora = get_post_meta($id, 'palestrante_22_hora', true); $palestrante_22_foto = get_post_meta($id, 'palestrante_22_foto', true); $palestrante_22_foto = wp_get_attachment_image_src($palestrante_22_foto, 'full'); $palestrante_22_foto = $palestrante_22_foto[0]; $palestrante22 = array($palestrante_22_nome, $palestrante_22_bio, $palestrante_22_tema, $palestrante_22_hora, $palestrante_22_foto); $palestrante_23_nome = get_post_meta($id, 'palestrante_23_nome', true); $palestrante_23_bio = get_post_meta($id, 'palestrante_23_bio', true); $palestrante_23_tema = get_post_meta($id, 'palestrante_23_tema', true); $palestrante_23_hora = get_post_meta($id, 'palestrante_23_hora', true); $palestrante_23_foto = get_post_meta($id, 'palestrante_23_foto', true); $palestrante_23_foto = wp_get_attachment_image_src($palestrante_23_foto, 'full'); $palestrante_23_foto = $palestrante_23_foto[0]; $palestrante23 = array($palestrante_23_nome, $palestrante_23_bio, $palestrante_23_tema, $palestrante_23_hora, $palestrante_23_foto); $palestrante_24_nome = get_post_meta($id, 'palestrante_24_nome', true); $palestrante_24_bio = get_post_meta($id, 'palestrante_24_bio', true); $palestrante_24_tema = get_post_meta($id, 'palestrante_24_tema', true); $palestrante_24_hora = get_post_meta($id, 'palestrante_24_hora', true); $palestrante_24_foto = get_post_meta($id, 'palestrante_24_foto', true); $palestrante_24_foto = wp_get_attachment_image_src($palestrante_24_foto, 'full'); $palestrante_24_foto = $palestrante_24_foto[0]; $palestrante24 = array($palestrante_24_nome, $palestrante_24_bio, $palestrante_24_tema, $palestrante_24_hora, $palestrante_24_foto); $palestrante_25_nome = get_post_meta($id, 'palestrante_25_nome', true); $palestrante_25_bio = get_post_meta($id, 'palestrante_25_bio', true); $palestrante_25_tema = get_post_meta($id, 'palestrante_25_tema', true); $palestrante_25_hora = get_post_meta($id, 'palestrante_25_hora', true); $palestrante_25_foto = get_post_meta($id, 'palestrante_25_foto', true); $palestrante_25_foto = wp_get_attachment_image_src($palestrante_25_foto, 'full'); $palestrante_25_foto = $palestrante_25_foto[0]; $palestrante25 = array($palestrante_25_nome, $palestrante_25_bio, $palestrante_25_tema, $palestrante_25_hora, $palestrante_25_foto); $palestrante_26_nome = get_post_meta($id, 'palestrante_26_nome', true); $palestrante_26_bio = get_post_meta($id, 'palestrante_26_bio', true); $palestrante_26_tema = get_post_meta($id, 'palestrante_26_tema', true); $palestrante_26_hora = get_post_meta($id, 'palestrante_26_hora', true); $palestrante_26_foto = get_post_meta($id, 'palestrante_26_foto', true); $palestrante_26_foto = wp_get_attachment_image_src($palestrante_26_foto, 'full'); $palestrante_26_foto = $palestrante_26_foto[0]; $palestrante26 = array($palestrante_26_nome, $palestrante_26_bio, $palestrante_26_tema, $palestrante_26_hora, $palestrante_26_foto); $palestrante_27_nome = get_post_meta($id, 'palestrante_27_nome', true); $palestrante_27_bio = get_post_meta($id, 'palestrante_27_bio', true); $palestrante_27_tema = get_post_meta($id, 'palestrante_27_tema', true); $palestrante_27_hora = get_post_meta($id, 'palestrante_27_hora', true); $palestrante_27_foto = get_post_meta($id, 'palestrante_27_foto', true); $palestrante_27_foto = wp_get_attachment_image_src($palestrante_27_foto, 'full'); $palestrante_27_foto = $palestrante_27_foto[0]; $palestrante27 = array($palestrante_27_nome, $palestrante_27_bio, $palestrante_27_tema, $palestrante_27_hora, $palestrante_27_foto); $palestrante_28_nome = get_post_meta($id, 'palestrante_28_nome', true); $palestrante_28_bio = get_post_meta($id, 'palestrante_28_bio', true); $palestrante_28_tema = get_post_meta($id, 'palestrante_28_tema', true); $palestrante_28_hora = get_post_meta($id, 'palestrante_28_hora', true); $palestrante_28_foto = get_post_meta($id, 'palestrante_28_foto', true); $palestrante_28_foto = wp_get_attachment_image_src($palestrante_28_foto, 'full'); $palestrante_28_foto = $palestrante_28_foto[0]; $palestrante28 = array($palestrante_28_nome, $palestrante_28_bio, $palestrante_28_tema, $palestrante_28_hora, $palestrante_28_foto); $palestrante_29_nome = get_post_meta($id, 'palestrante_29_nome', true); $palestrante_29_bio = get_post_meta($id, 'palestrante_29_bio', true); $palestrante_29_tema = get_post_meta($id, 'palestrante_29_tema', true); $palestrante_29_hora = get_post_meta($id, 'palestrante_29_hora', true); $palestrante_29_foto = get_post_meta($id, 'palestrante_29_foto', true); $palestrante_29_foto = wp_get_attachment_image_src($palestrante_29_foto, 'full'); $palestrante_29_foto = $palestrante_29_foto[0]; $palestrante29 = array($palestrante_29_nome, $palestrante_29_bio, $palestrante_29_tema, $palestrante_29_hora, $palestrante_29_foto); $palestrante_30_nome = get_post_meta($id, 'palestrante_30_nome', true); $palestrante_30_bio = get_post_meta($id, 'palestrante_30_bio', true); $palestrante_30_tema = get_post_meta($id, 'palestrante_30_tema', true); $palestrante_30_hora = get_post_meta($id, 'palestrante_30_hora', true); $palestrante_30_foto = get_post_meta($id, 'palestrante_30_foto', true); $palestrante_30_foto = wp_get_attachment_image_src($palestrante_30_foto, 'full'); $palestrante_30_foto = $palestrante_30_foto[0]; $palestrante30 = array($palestrante_30_nome, $palestrante_30_bio, $palestrante_30_tema, $palestrante_30_hora, $palestrante_30_foto); $palestrante_31_nome = get_post_meta($id, 'palestrante_31_nome', true); $palestrante_31_bio = get_post_meta($id, 'palestrante_31_bio', true); $palestrante_31_tema = get_post_meta($id, 'palestrante_31_tema', true); $palestrante_31_hora = get_post_meta($id, 'palestrante_31_hora', true); $palestrante_31_foto = get_post_meta($id, 'palestrante_31_foto', true); $palestrante_31_foto = wp_get_attachment_image_src($palestrante_31_foto, 'full'); $palestrante_31_foto = $palestrante_31_foto[0]; $palestrante31 = array($palestrante_31_nome, $palestrante_31_bio, $palestrante_31_tema, $palestrante_31_hora, $palestrante_31_foto); $palestrante_32_nome = get_post_meta($id, 'palestrante_32_nome', true); $palestrante_32_bio = get_post_meta($id, 'palestrante_32_bio', true); $palestrante_32_tema = get_post_meta($id, 'palestrante_32_tema', true); $palestrante_32_hora = get_post_meta($id, 'palestrante_32_hora', true); $palestrante_32_foto = get_post_meta($id, 'palestrante_32_foto', true); $palestrante_32_foto = wp_get_attachment_image_src($palestrante_32_foto, 'full'); $palestrante_32_foto = $palestrante_32_foto[0]; $palestrante32 = array($palestrante_32_nome, $palestrante_32_bio, $palestrante_32_tema, $palestrante_32_hora, $palestrante_32_foto); $palestrante_33_nome = get_post_meta($id, 'palestrante_33_nome', true); $palestrante_33_bio = get_post_meta($id, 'palestrante_33_bio', true); $palestrante_33_tema = get_post_meta($id, 'palestrante_33_tema', true); $palestrante_33_hora = get_post_meta($id, 'palestrante_33_hora', true); $palestrante_33_foto = get_post_meta($id, 'palestrante_33_foto', true); $palestrante_33_foto = wp_get_attachment_image_src($palestrante_33_foto, 'full'); $palestrante_33_foto = $palestrante_33_foto[0]; $palestrante33 = array($palestrante_33_nome, $palestrante_33_bio, $palestrante_33_tema, $palestrante_33_hora, $palestrante_33_foto); $palestrante_34_nome = get_post_meta($id, 'palestrante_34_nome', true); $palestrante_34_bio = get_post_meta($id, 'palestrante_34_bio', true); $palestrante_34_tema = get_post_meta($id, 'palestrante_34_tema', true); $palestrante_34_hora = get_post_meta($id, 'palestrante_34_hora', true); $palestrante_34_foto = get_post_meta($id, 'palestrante_34_foto', true); $palestrante_34_foto = wp_get_attachment_image_src($palestrante_34_foto, 'full'); $palestrante_34_foto = $palestrante_34_foto[0]; $palestrante34 = array($palestrante_34_nome, $palestrante_34_bio, $palestrante_34_tema, $palestrante_34_hora, $palestrante_34_foto); $palestrante_35_nome = get_post_meta($id, 'palestrante_35_nome', true); $palestrante_35_bio = get_post_meta($id, 'palestrante_35_bio', true); $palestrante_35_tema = get_post_meta($id, 'palestrante_35_tema', true); $palestrante_35_hora = get_post_meta($id, 'palestrante_35_hora', true); $palestrante_35_foto = get_post_meta($id, 'palestrante_35_foto', true); $palestrante_35_foto = wp_get_attachment_image_src($palestrante_35_foto, 'full'); $palestrante_35_foto = $palestrante_35_foto[0]; $palestrante35 = array($palestrante_35_nome, $palestrante_35_bio, $palestrante_35_tema, $palestrante_35_hora, $palestrante_35_foto); $palestrante_36_nome = get_post_meta($id, 'palestrante_36_nome', true); $palestrante_36_bio = get_post_meta($id, 'palestrante_36_bio', true); $palestrante_36_tema = get_post_meta($id, 'palestrante_36_tema', true); $palestrante_36_hora = get_post_meta($id, 'palestrante_36_hora', true); $palestrante_36_foto = get_post_meta($id, 'palestrante_36_foto', true); $palestrante_36_foto = wp_get_attachment_image_src($palestrante_36_foto, 'full'); $palestrante_36_foto = $palestrante_36_foto[0]; $palestrante36 = array($palestrante_36_nome, $palestrante_36_bio, $palestrante_36_tema, $palestrante_36_hora, $palestrante_36_foto); $palestrante_37_nome = get_post_meta($id, 'palestrante_37_nome', true); $palestrante_37_bio = get_post_meta($id, 'palestrante_37_bio', true); $palestrante_37_tema = get_post_meta($id, 'palestrante_37_tema', true); $palestrante_37_hora = get_post_meta($id, 'palestrante_37_hora', true); $palestrante_37_foto = get_post_meta($id, 'palestrante_37_foto', true); $palestrante_37_foto = wp_get_attachment_image_src($palestrante_37_foto, 'full'); $palestrante_37_foto = $palestrante_37_foto[0]; $palestrante37 = array($palestrante_37_nome, $palestrante_37_bio, $palestrante_37_tema, $palestrante_37_hora, $palestrante_37_foto); $palestrante_38_nome = get_post_meta($id, 'palestrante_38_nome', true); $palestrante_38_bio = get_post_meta($id, 'palestrante_38_bio', true); $palestrante_38_tema = get_post_meta($id, 'palestrante_38_tema', true); $palestrante_38_hora = get_post_meta($id, 'palestrante_38_hora', true); $palestrante_38_foto = get_post_meta($id, 'palestrante_38_foto', true); $palestrante_38_foto = wp_get_attachment_image_src($palestrante_38_foto, 'full'); $palestrante_38_foto = $palestrante_38_foto[0]; $palestrante38 = array($palestrante_38_nome, $palestrante_38_bio, $palestrante_38_tema, $palestrante_38_hora, $palestrante_38_foto); $palestrante_39_nome = get_post_meta($id, 'palestrante_39_nome', true); $palestrante_39_bio = get_post_meta($id, 'palestrante_39_bio', true); $palestrante_39_tema = get_post_meta($id, 'palestrante_39_tema', true); $palestrante_39_hora = get_post_meta($id, 'palestrante_39_hora', true); $palestrante_39_foto = get_post_meta($id, 'palestrante_39_foto', true); $palestrante_39_foto = wp_get_attachment_image_src($palestrante_39_foto, 'full'); $palestrante_39_foto = $palestrante_39_foto[0]; $palestrante39 = array($palestrante_39_nome, $palestrante_39_bio, $palestrante_39_tema, $palestrante_39_hora, $palestrante_39_foto); $palestrante_40_nome = get_post_meta($id, 'palestrante_40_nome', true); $palestrante_40_bio = get_post_meta($id, 'palestrante_40_bio', true); $palestrante_40_tema = get_post_meta($id, 'palestrante_40_tema', true); $palestrante_40_hora = get_post_meta($id, 'palestrante_40_hora', true); $palestrante_40_foto = get_post_meta($id, 'palestrante_40_foto', true); $palestrante_40_foto = wp_get_attachment_image_src($palestrante_40_foto, 'full'); $palestrante_40_foto = $palestrante_40_foto[0]; $palestrante40 = array($palestrante_40_nome, $palestrante_40_bio, $palestrante_40_tema, $palestrante_40_hora, $palestrante_40_foto);
        $palestrantes = array($palestrante1, $palestrante2, $palestrante3, $palestrante4,
            $palestrante5, $palestrante6, $palestrante7, $palestrante8, $palestrante9, $palestrante10, 
            $palestrante11, $palestrante12, $palestrante13, $palestrante14, $palestrante15, $palestrante16, 
            $palestrante17, $palestrante18, $palestrante19, $palestrante20, $palestrante21, $palestrante22, 
            $palestrante23, $palestrante24, $palestrante25, $palestrante26, $palestrante27, $palestrante28, 
            $palestrante29, $palestrante30, $palestrante31, $palestrante32, $palestrante33, $palestrante34, 
            $palestrante35, $palestrante36, $palestrante37, $palestrante38, $palestrante39, $palestrante40);

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
        <div id="barra-topo-congresso">
            <div class="container">
                <div class="col-md-4">
                    <img src="<?php echo $logo; ?>" />
                </div>
                <div class="col-md-8">
                    <?php require_once(plugin_dir_path(__FILE__) . '../inc/redes-sociais.php'); ?>
                </div>
            </div>
        </div>
        <div id="conteudo-congresso">
            <div class="container">
                <div class="row">
                    <h1>
                        <span><?php echo $headline; ?></span>
                    </h1>
                    <h2>
                        <span class="subtitulo"><?php echo $subheadline; ?></span>
                    </h2>
                    <div class="col-md-6" id="video-iframe">
                        <?php echo $video_iframe; ?>
                    </div>
                    <div id="form-out" class="<?php squeezewp_get_animacao('animated flipInX'); ?> col-md-6 <?php echo $squeeze->get_posicao($posicao); ?> area-form-sp-padrao">
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
                            <?php echo $text_abaixo_form; ?>
                            <?php require_once(plugin_dir_path(__FILE__) . '../inc/contador-inner.php'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <?php $squeeze->criar_form_modal($optin, $botao, $class_botao, $exibir_campos, $rotulos, $text_privacidade, $text_form, $icons, $botao_cta_modal, $codigo_embed); ?>
        <div id="informacoes-palestras">
            <div class="container omega">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            foreach ($dias as $dia) {
                                if ($dia[0] <> ''){
                        ?>
                        <h2 class="titulo-dia"><?php echo $dia[1]; ?></h2>
                        <?php
                                foreach($palestrantes as $palestrante){
                                    if ($palestrante[0] <> ''){
                                        $format = 'd/m/Y';
                                        $dia_evento  = DateTime::createFromFormat($format, $dia[0]);
                                        $format = 'd/m/Y H:i';
                                        $hora  = DateTime::createFromFormat($format, $palestrante[3]);
                                        if ($dia_evento->format('d/m/Y') == $hora->format('d/m/Y')){
                        ?>
                        <div class="palestra">
                            <div class="palestra-inner">
                                <div class="col-md-2">
                                    <div class="foto-palestrante">
                                    <?php
                                        if ($palestrante[4] == '')
                                            $palestrante[4] = $theme_path . '/images/avatar.jpg';
                                    ?>
                                        <img src="<?php echo $palestrante[4]; ?>" />
                                    </div>
                                    <div class="datahora">
                                        <?php 
                                            echo $hora->format('H:i');
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="nome">
                                        <?php 
                                            if ($destaque_palestrante == 1)
                                                echo $palestrante[2];
                                            else
                                                echo $palestrante[0];
                                        ?>
                                    </div>
                                    <div class="biografia"><?php echo $palestrante[1]; ?></div>
                                    <div class="tema">
                                        <?php 
                                            if ($destaque_palestrante == 1)
                                                echo $palestrante[0];
                                            else
                                                echo $palestrante[2];
                                        ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <?php }}}
                            if ($exibir_entre_datas == '1'){ ?>
                                <div class="row">
                                    <div class="col-md-4 head-form head-form-entre-datas"><?php echo $text_form; ?></div>
                                    <div class="col-md-8 form-entre-datas">
                                    <?php echo $squeeze->criar_formulario($optin, $botao, $class_botao, $exibir_campos, $rotulos, 
                                        $text_privacidade, $form_modal, $text_form, $icons, $codigo_embed); ?>
                                    </div>
                                </div>
                            <?php }
                        }} ?>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer-congresso">
            <div class="container omega">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                </div>
            </div>
        </footer>

        <?php require_once(plugin_dir_path(__FILE__) . '../inc/powered.php'); ?>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/scripts.php'); ?>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $theme_path; ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $theme_path; ?>/js/fluidvids.js"></script>
        <script>
            fluidvids.init({
              selector: ['iframe', 'object'], // runs querySelectorAll()
              players: ['www.youtube.com', 'player.vimeo.com'] // players to support
            });
        </script>
        <?php require_once(plugin_dir_path(__FILE__) . '../inc/exit.php'); ?>
    </body>
</html>