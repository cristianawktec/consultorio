<?php
    require_once('option.php');
    $key = get_option('key_squeeze_wp');
    
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);
    
    $exibir = get_post_meta($id, 'exibir_contador', true);
    $titulo_contador = get_post_meta($id, 'titulo_contador', true);
    $data_oferta = get_post_meta($id, 'data_contador', true);
    $data_oferta = str_replace('/', '-', $data_oferta);
    $date = new DateTime($data_oferta);
    $data_oferta = $date->format('Y/m/d H:i');
    if (($option && $funcao && $exibir)){
?>   


<div id="barra-contador-inner"> 
    <div id="DateCountdown" data-date="<?php echo $data_oferta; ?>"></div>
    
</div>
<script src="<?php echo $theme_path; ?>/js/TimeCircles.js"></script>
<link href="<?php echo $theme_path; ?>/css/TimeCircles.css" rel="stylesheet">
<script type="text/javascript">
    var j = jQuery.noConflict();
    j("#DateCountdown").TimeCircles({
        "animation": "smooth",
        "bg_width": 0.5,
        "fg_width": 0.06,
        "circle_bg_color": "#FFFFFF",
        count_past_zero: false,
        "time": {
            "Days": {
                "text": "Dias",
                "color": "#FFCC66",
                "show": true
            },
            "Hours": {
                "text": "Horas",
                "color": "#99CCFF",
                "show": true
            },
            "Minutes": {
                "text": "Minutos",
                "color": "#BBFFBB",
                "show": true
            },
            "Seconds": {
                "text": "Segundos",
                "color": "#FF9999",
                "show": true
            }
        }
    });
    var enviou = false;
    var recursiva = function () {
        if (jQuery("#DateCountdown").TimeCircles().getTime() <= 0){
            if (enviou === false){
                
                jQuery("#titulo-contador").text("Oferta Finalizada!");
                jQuery("#titulo-contador").css("color", "red");
                jQuery.get("<?php bloginfo('url');?>/wp-content/plugins/squeeze-page/inc/email-contador.php?post_id=<?php echo $id; ?>");
                enviou = true;
            }
        }
        setTimeout(recursiva,3000);
    };
    recursiva();
</script>
<?php
    }
?>

