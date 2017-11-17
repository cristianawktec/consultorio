<?php 
    //$template_name = get_post_meta(get_the_id(), '_wp_page_template', true );
    require_once('option.php');
    //$key = get_option('key_squeeze_wp');
    
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);
    
    $animar = get_post_meta($id, 'exibir_animacoes', true);
	function squeezewp_get_animacao($classe, $print = true){
		global $option;
		global $funcao;
		global $animar;
		
		if ($option && $funcao && $animar){
			if ($print)
				echo $classe;
			else
				return $classe;
}
}
       
?>
<script type="text/javascript">
    var j = jQuery.noConflict();
    j('button').addClass('animated pulse');
    j('a.btn').addClass('animated pulse');
    j('.redes-sociais').addClass('animated zoomIn');
    <?php
        switch($template_name){
            case 'sp-padrao-1.php':
                echo "jQuery('#form-out').addClass('animated flipInX');";
                break;
            
            case 'sp-back-animado-1.php':
                echo "jQuery('#form-out').addClass('animated flipInX');";
                break;
            case 'sp-back-animado-2.php':
                echo "jQuery('#form-out').addClass('animated flipInX');jQuery('.modal-dialog').addClass('animated flipInX');";
                break;
            case 'sp-video-background-1.php':
                echo "jQuery('#form-out').addClass('animated flipInX');";
                break;
            case 'sp-video-1.php':
                echo "jQuery('#form-out-video').addClass('animated bounceInRight');"
                . "jQuery('#video').addClass('animated fadeInDown');";
                break;
            case 'sp-ebook-1.php':
                echo "jQuery('#form-out-ebook').addClass('animated bounceInRight');"
                . "jQuery('#ebook').addClass('animated zoomIn');"
                    . "jQuery('#seta-form').addClass('animated bounceInLeft');"
                    . "jQuery('.descritivo').addClass('animated zoomIn');";
                break;
            case 'confirme-inscricao-1.php':
                echo "jQuery('.step').addClass('animated bounceInLeft');";
                break;
            case 'confirme-inscricao-2.php':
                echo "jQuery('.step').addClass('animated bounceInLeft');";
                break;
            case 'page-download-1.php':
                echo "jQuery('#form-out-ebook').addClass('animated bounceInRight');"
                . "jQuery('#ebook').addClass('animated zoomIn');";
                break;
            case 'page-download-2.php':
                echo "jQuery('#form-out-ebook').addClass('animated bounceInRight');"
                . "jQuery('#ebook').addClass('animated zoomIn');";
                break;
        }
    ?>
</script>
