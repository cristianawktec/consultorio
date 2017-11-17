<?php
    require_once('option.php');
    $key = get_option('key_squeeze_wp');
    $css = get_option('css_squeeze_wp');
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);

    if (($option && $funcao)){

        function squeezewp_gera_link_fonte($fonte) {
            echo "<link href='http://fonts.googleapis.com/css?family=" .
            str_replace("-", " ", $fonte) . "' rel='stylesheet' type='text/css'> ";
        }

        if (get_option('fonte_titulo_1_squeeze_wp') <> '')
            squeezewp_gera_link_fonte(get_option('fonte_titulo_1_squeeze_wp'));

        if (get_option('fonte_titulo_2_squeeze_wp') <> '')
            squeezewp_gera_link_fonte(get_option('fonte_titulo_2_squeeze_wp'));

        if (get_option('fonte_texto_squeeze_wp') <> '')
            squeezewp_gera_link_fonte(get_option('fonte_texto_squeeze_wp'));

        if (get_option('fonte_cta_squeeze_wp') <> '')
            squeezewp_gera_link_fonte(get_option('fonte_cta_squeeze_wp'));
    
?>
<style>
    <?php if (get_option('fonte_titulo_1_squeeze_wp') <> '') { ?>
    h1, .calendario{
        font-family: '<?php echo str_replace("-", " ", get_option('fonte_titulo_1_squeeze_wp')); ?>' !important;
    }
    <?php } ?>
    <?php if (get_option('fonte_titulo_2_squeeze_wp') <> '') { ?>
    h2{
        font-family: '<?php echo str_replace("-", " ", get_option('fonte_titulo_2_squeeze_wp')); ?>' !important;
    }
    <?php } ?>
    <?php if (get_option('fonte_texto_squeeze_wp') <> '') { ?>
    .head-form{
        font-family: '<?php echo str_replace("-", " ", get_option('fonte_texto_squeeze_wp')); ?>' !important;
    }
    <?php } ?>
    <?php if (get_option('fonte_cta_squeeze_wp') <> '') { ?>
    .btn .text{
        font-family: '<?php echo str_replace("-", " ", get_option('fonte_cta_squeeze_wp')); ?>' !important;
    }
    <?php } ?>
</style>
<?php 
    }
?>

