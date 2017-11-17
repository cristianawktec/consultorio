<?php

//headlines

$headline = simple_fields_get_post_value(get_the_id(), "Headline", true);
$subheadline = simple_fields_get_post_value(get_the_id(), "Subheadline", true);


//form

$form = simple_fields_get_post_value(get_the_id(), "Form", true);
$placeholder = simple_fields_get_post_value(get_the_id(), "Rótulo do E-mail", true);
$optin = $squeeze->extrair_campos($form, $placeholder);
$exibir_campos = simple_fields_get_post_value(get_the_id(), "Exibir campos além do e-mail?", true);
$rotulos = array();
$rotulos[] = simple_fields_get_post_value(get_the_id(), "Rótulo Campo 1", true);
$rotulos[] = simple_fields_get_post_value(get_the_id(), "Rótulo Campo 2", true);
$rotulos[] = simple_fields_get_post_value(get_the_id(), "Rótulo Campo 3", true);
$text_form = simple_fields_get_post_value(get_the_id(), "Texto Acima do Formulário", true);

$botao = simple_fields_get_post_value(get_the_id(), "Texto do Botão (CTA)", true);
$text_privacidade = simple_fields_get_post_value(get_the_id(), "Texto de privacidade", true);
$cor_botao = simple_fields_get_post_value(get_the_id(), "Cor do botão (CTA)", true);


//video
$urlvideo = simple_fields_get_post_value(get_the_id(), "URL do Vídeo", true);

//posicao_form
$posicao = simple_fields_get_post_value(get_the_id(), "Posição do Formulário", true);

//backs animados
$back = simple_fields_get_post_value(get_the_id(), "Background", true);
$back2 = simple_fields_get_post_value(get_the_id(), "Background 2", true);
$back3 = simple_fields_get_post_value(get_the_id(), "Background 3", true);


//confirmacao
$titulo1 = simple_fields_get_post_value(get_the_id(), "Título - Passo 1", true);
$texto1 = simple_fields_get_post_value(get_the_id(), "Texto - Passo 1", true);

$titulo2 = simple_fields_get_post_value(get_the_id(), "Título - Passo 2", true);
$texto2 = simple_fields_get_post_value(get_the_id(), "Texto - Passo 2", true);

$titulo3 = simple_fields_get_post_value(get_the_id(), "Título - Passo 3", true);
$texto3 = simple_fields_get_post_value(get_the_id(), "Texto - Passo 3", true);

$titulo4 = simple_fields_get_post_value(get_the_id(), "Título - Passo 4", true);
$texto4 = simple_fields_get_post_value(get_the_id(), "Texto - Passo 4", true);






