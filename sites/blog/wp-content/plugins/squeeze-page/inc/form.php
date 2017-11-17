<?php

$form = get_post_meta($id, 'optin', true);
$placeholder = get_post_meta($id, 'placeholder_email', true);
$exibir_campos = get_post_meta($id, 'exibir_campos', true);
$optin = $squeeze->extrair_campos($form, $placeholder);
$rotulos = array();
$rotulos[] = get_post_meta($id, 'rotulo_1', true);
$rotulos[] = get_post_meta($id, 'rotulo_2', true);
$rotulos[] = get_post_meta($id, 'rotulo_3', true);

$icons[] = get_post_meta($id, 'icon_rotulo_1', true);
$icons[] = get_post_meta($id, 'icon_rotulo_2', true);
$icons[] = get_post_meta($id, 'icon_rotulo_3', true);


$text_form = get_post_meta($id, 'texto_form', true);
$text_privacidade = get_post_meta($id, 'texto_privacidade', true);
$botao = get_post_meta($id, 'texto_cta', true);
$cor_botao = get_post_meta($id, 'cor_cta', true);
$class_botao = $squeeze->get_classbotao($cor_botao);
$form_modal = get_post_meta($id, 'form_modal', true);
$texto_modal = get_post_meta($id, 'texto_modal', true);
$botao_cta_modal = get_post_meta($id, 'botao_cta_modal', true);
$text_abaixo_form = get_post_meta($id, 'text_abaixo_form', true);
$codigo_embed = get_post_meta($id, 'codigo_embed', true);

?>