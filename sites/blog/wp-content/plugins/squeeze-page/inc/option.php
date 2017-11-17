<?php
function squeezewp_le_key($key){
    for($i=0; $i<5; $i++){
        $key = base64_decode($key);
    }
    $key = strrev($key);
    return $key;
}
function squeezewp_verifica_dominio() {
    $dominio = get_bloginfo('url');
    $key = get_option('key_squeeze_wp');
    $resp = squeezewp_le_key($key);
    if (strpos($resp, '|') > 0){
        $resp = explode('|', $resp);
    }
    else {
        $resp[0] = '------------';
    }

    if (strpos($dominio, $resp[0]) > 0){
        return 1;
    }
    else{
        update_option('key_squeeze_wp', 'Licença Grátis Ativada');
        return 0;
    }

}
function squeezewp_verifica_funcao($funcao) {
    $dominio = $_SERVER['SERVER_NAME'];
    $key = get_option('key_squeeze_wp');
    $resp = squeezewp_le_key($key);
    if (strpos($resp, '|') > 0){
        $resp = explode('|', $resp);
        $resp[1] = '-' . $resp[1];
    }
    else {
        $resp[1] = '------------';
    }
    if(strpos($resp[1],(string)$funcao) > 0)
        return 1;
    else
        return 0;
}