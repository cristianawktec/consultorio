<?php
    require_once('option.php');
    $key = get_option('key_squeeze_wp');
    
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(1);
    if (!($option && $funcao)){
?>        
<div class="powered">
	<a href="http://squeezewp.com/download/">
		<img src="<?php echo $theme_path; ?>/images/poweredby.png">
	</a>
</div>
<?php
    }
?>