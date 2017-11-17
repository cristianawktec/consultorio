<?php
	ob_start();
        $id_protecao = get_post_meta(get_the_id(), "protecao", true);
        $id_protecao = explode('|', $id_protecao);
        $id_protecao = $id_protecao[0];
        $id_redir = get_post_meta(get_the_id(), "url_redirecionamento", true);
        $id_redir = explode('|', $id_redir);
        $id_redir = $id_redir[0];
        $url_redirecionamento = get_permalink($id_redir);   

	if(!isset($_COOKIE[$id_protecao]) && $id_protecao <> 0)
            echo '<META http-equiv="refresh" content="0;URL=' . $url_redirecionamento .'">';
?>