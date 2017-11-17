<?php
require('../../../../wp-blog-header.php');

if (get_post_meta($_GET['post_id'], 'enviou_email', true) <> '1') {

    $data = get_post_meta($_GET['post_id'], 'data_contador', true);
    $data_sistema = date('d/m/Y H:i');

    $format = "d/m/Y H:i";
    $data = DateTime::createFromFormat($format, $data);
    $data_sistema = DateTime::createFromFormat($format, $data_sistema);
    
    if ($data >= $data_sistema) {
        $to = get_option('admin_email');
        $subject = "Oferta Finalizada - Contador Zerado";
        $content = "Este e-mail é apenas um informe de que a sua oferta criada no SqueezeWP, acaba de ser zerada!"
                . " Providencie a mudança da página.";
        $status = wp_mail($to, $subject, $content);
        update_post_meta($_GET['post_id'], 'enviou_email', 1);
    }
}
?>