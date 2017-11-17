<?php

require_once('teste-ab-funcoes.php');

function init_teste_ab() {
    $url = squeezewp_get_url();
    if ((!strpos($url, 'wp-admin')) && (!strpos($url, 'wp-login'))) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'teste_ab';
        $cookie_name_prefix = 'teste_ab_';

        $teste = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $table_name . " WHERE pagina_original_url = %s AND status = 'ativo'", $url));
        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET trafego_total = %d WHERE id = %d", $teste->trafego_total + 1, $teste->id));
        if (!empty($teste)) {
            if ($teste->trafego <> 1)
                $teste->porcentagem = 100;
            $rand = mt_rand(1, 100);
            if ($rand > $teste->porcentagem) {
                return;
            } else {
                if (verificar_qtde_testes($teste)) {
                    return;
                }
                $cookie_name = $cookie_name_prefix . $teste->id;
                $cookie_value = $_COOKIE[$cookie_name];

                if (isset($cookie_value)) {
                    squeezewp_atualizar_metricas_redirecionamento($cookie_value, $teste);
                } else {
                    $cookie_value = squeezewp_get_cookie_valor($teste);
                    $cookie_expires = time() + (60 * 60 * 24 * 30); // 30 days from now
                    $cookie_path = '/';

                    $success = setcookie($cookie_name, $cookie_value, $cookie_expires, $cookie_path);
                    if ($success) {
                        squeezewp_atualizar_metricas_redirecionamento($cookie_value, $teste);
                    }
                }
            }
        }
        $testes = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $table_name . " WHERE pagina_conversao_url = %s AND status = 'ativo'", $url));
        foreach ($testes as $t) {
            $cookie_name = $cookie_name_prefix . $t->id;
            $cookie_value = $_COOKIE[$cookie_name];
            if (isset($cookie_value)) {
                switch ($cookie_value) {
                    case 0: // Original page
                        $conversao_from_original = $t->conversao_from_original + 1;
                        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET conversao_from_original = %d WHERE id = %d", $conversao_from_original, $t->id));
                        break;
                    case 1: // Variation page 1
                        $conversao_from_1 = $t->conversao_from_1 + 1;
                        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET conversao_from_1 = %d WHERE id = %d", $conversao_from_1, $t->id));
                        break;
                    case 2: // Variation page 2
                        $conversao_from_2 = $t->conversao_from_2 + 1;
                        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET conversao_from_2 = %d WHERE id = %d", $conversao_from_2, $t->id));
                        break;
                    case 3: // Variation page 3
                        $conversao_from_3 = $t->conversao_from_3 + 1;
                        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET conversao_from_3 = %d WHERE id = %d", $conversao_from_3, $t->id));
                        break;
                    case 4: // Variation page 4
                        $conversao_from_4 = $t->conversao_from_4 + 1;
                        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET conversao_from_4 = %d WHERE id = %d", $conversao_from_4, $t->id));
                        break;
                    case 5: // Variation page 5
                        $conversao_from_5 = $t->conversao_from_5 + 1;
                        $wpdb->query($wpdb->prepare("UPDATE " . $table_name . " SET conversao_from_5 = %d WHERE id = %d", $conversao_from_5, $t->id));
                        break;
                }
                setcookie($cookie_name, '', time() - (60 * 60 * 24 * 30), '/');
            }
        }
    }
}

if (!is_user_logged_in()) {
    init_teste_ab();
}

