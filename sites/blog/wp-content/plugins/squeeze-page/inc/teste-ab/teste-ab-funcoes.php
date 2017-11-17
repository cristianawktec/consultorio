<?php

function calcular_conversao($visitas_pagina, $visitas_total) {
    if ($visitas_total == 0) {
        return 0;
    }
    return round(($visitas_pagina / $visitas_total) * 100, 2);
}

function conversao_original($teste) {
    return calcular_conversao($teste->conversao_from_original, $teste->pagina_original_visitantes);
}

function conversao_variacao_1($teste) {
    return calcular_conversao($teste->conversao_from_1, $teste->variacao_1_visitantes);
}

function conversao_variacao_2($teste) {
    return calcular_conversao($teste->conversao_from_2, $teste->variacao_2_visitantes);
}

function conversao_variacao_3($teste) {
    return calcular_conversao($teste->conversao_from_3, $teste->variacao_3_visitantes);
}

function conversao_variacao_4($teste) {
    return calcular_conversao($teste->conversao_from_4, $teste->variacao_4_visitantes);
}

function conversao_variacao_5($teste) {
    return calcular_conversao($teste->conversao_from_5, $teste->variacao_5_visitantes);
}

function squeezewp_calcular_melhoria($conversao_original, $conversao_variacao) {
    if ($conversao_original == 0) {
        return 0;
    }
    return (($conversao_variacao / $conversao_original) - 1);
}

function squeezewp_calcular_melhoria_valiacao_1($teste) {
    $convesao_original = conversao_original($teste);
    $conversao_variacao_1 = conversao_variacao_1($teste);
    return squeezewp_calcular_melhoria($convesao_original, $conversao_variacao_1);
}

function squeezewp_calcular_melhoria_valiacao_2($teste) {
    $convesao_original = conversao_original($teste);
    $conversao_variacao_2 = conversao_variacao_2($teste);
    return squeezewp_calcular_melhoria($convesao_original, $conversao_variacao_2);
}

function squeezewp_calcular_melhoria_valiacao_3($teste) {
    $convesao_original = conversao_original($teste);
    $conversao_variacao_3 = conversao_variacao_3($teste);
    return squeezewp_calcular_melhoria($convesao_original, $conversao_variacao_3);
}

function squeezewp_calcular_melhoria_valiacao_4($teste) {
    $convesao_original = conversao_original($teste);
    $conversao_variacao_4 = conversao_variacao_4($teste);
    return squeezewp_calcular_melhoria($convesao_original, $conversao_variacao_4);
}

function squeezewp_calcular_melhoria_valiacao_5($teste) {
    $convesao_original = conversao_original($teste);
    $conversao_variacao_5 = conversao_variacao_5($teste);
    return squeezewp_calcular_melhoria($convesao_original, $conversao_variacao_5);
}

function squeezewp_mostrar_melhoria_variacao_1($teste) {
    if (($teste->variacao_1_id != 0) && ($teste->variacao_1_url != '')) {
        $melhoria = squeezewp_calcular_melhoria_valiacao_1($teste) * 100;
        return round($melhoria, 2) . '%';
    }
    return 'Não Utilizada';
}

function squeezewp_mostrar_melhoria_variacao_2($teste) {
    if (($teste->variacao_2_id != 0) && ($teste->variacao_2_url != '')) {
        $melhoria = squeezewp_calcular_melhoria_valiacao_2($teste) * 100;
        return round($melhoria, 2) . '%';
    }
    return 'Não Utilizada';
}

function squeezewp_mostrar_melhoria_variacao_3($teste) {
    if (($teste->variacao_3_id != 0) && ($teste->variacao_3_url != '')) {
        $melhoria = squeezewp_calcular_melhoria_valiacao_3($teste) * 100;
        return round($melhoria, 2) . '%';
    }
    return 'Não Utilizada';
}

function squeezewp_mostrar_melhoria_variacao_4($teste) {
    if (($teste->variacao_4_id != 0) && ($teste->variacao_4_url != '')) {
        $melhoria = squeezewp_calcular_melhoria_valiacao_4($teste) * 100;
        return round($melhoria, 2) . '%';
    }
    return 'Não Utilizada';
}

function squeezewp_mostrar_melhoria_variacao_5($teste) {
    if (($teste->variacao_5_id != 0) && ($teste->variacao_5_url != '')) {
        $melhoria = squeezewp_calcular_melhoria_valiacao_5($teste) * 100;
        return round($melhoria, 2) . '%';
    }
    return 'Não Utilizada';
}

function squeezewp_e_maior($teste){
    $maior = conversao_original($teste);
    if(conversao_variacao_1($teste) > $maior)
        $maior = conversao_variacao_1($teste);
    if(conversao_variacao_2($teste) > $maior)
        $maior = conversao_variacao_2($teste);
    if(conversao_variacao_3($teste) > $maior)
        $maior = conversao_variacao_3($teste);
    if(conversao_variacao_4($teste) > $maior)
        $maior = conversao_variacao_4($teste);
    if(conversao_variacao_5($teste) > $maior)
        $maior = conversao_variacao_5($teste);
    return $maior;
}

function squeezewp_e_menor($teste){
    $menor = conversao_original($teste);
    if(conversao_variacao_1($teste) < $menor)
        $menor = conversao_variacao_1($teste);
    if((conversao_variacao_2($teste) < $menor) && $teste->variacao_2_url != '')
        $menor = conversao_variacao_2($teste);
    if((conversao_variacao_3($teste) < $menor) && $teste->variacao_3_url != '')
        $menor = conversao_variacao_3($teste);
    if((conversao_variacao_4($teste) < $menor) && $teste->variacao_4_url != '')
        $menor = conversao_variacao_4($teste);
    if((conversao_variacao_5($teste) < $menor) && $teste->variacao_5_url != '')
        $menor = conversao_variacao_5($teste);
    return $menor;
}

function verificar_qtde_testes($teste) {
    if ($teste->parar_teste == 1) {
        if ($teste->total_visitantes >= $teste->qtde_testes)
            return true;
        else
            return false;
    } else
        return false;
}

function squeezewp_atualizar_metricas_redirecionamento($cookie_value, $teste) {
    check_situacao_teste($teste);
    global $wpdb;
    $table_name = $wpdb->prefix . 'teste_ab';
    $total_visitantes = $teste->total_visitantes + 1;

    switch ($cookie_value) {
        case 0: // Original page, no redirect
            $pagina_original_visitantes = $teste->pagina_original_visitantes + 1;
            $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET pagina_original_visitantes = %d, total_visitantes = %d WHERE id = %d", $pagina_original_visitantes, $total_visitantes, $teste->id));
            break;
        case 1: // Variation page 1
            $variacao_1_visitantes = $teste->variacao_1_visitantes + 1;
            $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET variacao_1_visitantes = %d, total_visitantes = %d WHERE id = %d", $variacao_1_visitantes, $total_visitantes, $teste->id));
            squeezewp_redirecionamento($teste->variacao_1_url);
            break;
        case 2: // Variation page 2
            $variacao_2_visitantes = $teste->variacao_2_visitantes + 1;
            $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET variacao_2_visitantes = %d, total_visitantes = %d WHERE id = %d", $variacao_2_visitantes, $total_visitantes, $teste->id));
            squeezewp_redirecionamento($teste->variacao_2_url);
            break;
        case 3: // Variation page 3
            $variacao_3_visitantes = $teste->variacao_3_visitantes + 1;
            $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET variacao_3_visitantes = %d, total_visitantes = %d WHERE id = %d", $variacao_3_visitantes, $total_visitantes, $teste->id));
            squeezewp_redirecionamento($teste->variacao_3_url);
            break;
        case 4: // Variation page 4
            $variacao_4_visitantes = $teste->variacao_4_visitantes + 1;
            $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET variacao_4_visitantes = %d, total_visitantes = %d WHERE id = %d", $variacao_4_visitantes, $total_visitantes, $teste->id));
            squeezewp_redirecionamento($teste->variacao_4_url);
            break;
        case 5: // Variation page 5
            $variacao_5_visitantes = $teste->variacao_5_visitantes + 1;
            $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET variacao_5_visitantes = %d, total_visitantes = %d WHERE id = %d", $variacao_5_visitantes, $total_visitantes, $teste->id));
            squeezewp_redirecionamento($teste->variacao_5_url);
            break;
    }
}

function check_situacao_teste($teste) {
    if ($teste->parar_teste == 1) {
        if ($teste->total_visitantes + 1 >= $teste->qtde_testes) {
            parar_teste($teste->id);
        }
    }
}

function parar_teste($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'teste_ab';
    $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET status = 'parado' WHERE id = %d", $id));
}

function squeezewp_redirecionamento($url) {
    header('Location: ' . $url);
    exit();
}

function squeezewp_get_cookie_valor($teste) {
    $valor = 0;

    $numero_variacoes = squeezewp_numero_variacoes($teste);
    switch ($numero_variacoes) {
        case 1:
            $valor = mt_rand(0, 1);
            break;
        case 2:
            $valor = mt_rand(0, 2);
            break;
        case 3:
            $valor = mt_rand(0, 3);
            break;
        case 4:
            $valor = mt_rand(0, 4);
            break;
        case 5:
            $valor = mt_rand(0, 5);
            break;
    }
    return $valor;
}

function squeezewp_numero_variacoes($teste) {
    $numero_variacoes = 1;

    if ($teste->variacao_2_id > 0) {
        $numero_variacoes++;
    }
    
    if ($teste->variacao_3_id > 0) {
        $numero_variacoes++;
    }
    
    if ($teste->variacao_4_id > 0) {
        $numero_variacoes++;
    }
    
    if ($teste->variacao_5_id > 0) {
        $numero_variacoes++;
    }

    return $numero_variacoes;
}

function squeezewp_get_url() {
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
    $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    return $url;
}

function mostrar_finalizar_teste($parar_teste, $qtde_testes) {
    switch ($parar_teste) {
        case 0:
            return 'O teste será finalizado manualmente';
            break;
        case 1:
            return 'O teste será finalizado quando alcançar ' . $qtde_testes . ' visitantes';
            break;
    }
}

function mostrar_porcentagem_trafego($trafego, $porcentagem) {
    switch ($trafego) {
        case 0:
            return 'O teste está usando todo o tráfego';
            break;
        case 1:
            return 'O teste está usando ' . $porcentagem . '% do tráfego';
            break;
    }
}

