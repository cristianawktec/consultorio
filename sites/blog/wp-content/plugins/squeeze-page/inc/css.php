<?php
    require_once('option.php');
    $key = get_option('key_squeeze_wp');
    $css = get_option('css_squeeze_wp');
    $option = squeezewp_verifica_dominio();
    $funcao = squeezewp_verifica_funcao(2);
    
    
    if (($option && $funcao)){
?>
<style>
    <?php echo $css; ?>
</style>
    <?php } ?>
  
