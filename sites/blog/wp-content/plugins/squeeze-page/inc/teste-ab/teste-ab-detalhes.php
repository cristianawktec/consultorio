<?php
    $bootstrap = plugins_url( '../../bootstrap/css/bootstrap.min.css', __FILE__ );
    wp_enqueue_style('bootstrap', $bootstrap); 
    $css_file = plugins_url( '../../css/css-admin.css', __FILE__ );
    wp_enqueue_style('css_admin', $css_file);
    global $wpdb;
    $t = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "teste_ab" . " WHERE id = " . $_GET['teste']);
    require_once 'teste-ab-funcoes.php';
?>
<style>
    .table{
        background: #fff;
    }
</style>
<div class="row corpo">
    <div class="col-md-12">
        <a href="<?php bloginfo('wpurl') ?>/wp-admin/admin.php?page=squeezewp-teste-ab&action=testeab" class="btn btn-primary">Voltar</a>
        <h1>Detalhes do Teste: <?php echo $t->nome; ?></h1>
	<table class="table table-bordered lista-testes table-striped">
            <tbody>
                <tr>
                    <td>Nome do Teste A/B</td>
                    <td><?php echo $t->nome; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $t->status; ?></td>
                </tr>
                <tr>
                    <td>Criado em</td>
                    <td><?php echo date('d/m/Y H:i', strtotime($t->data_criacao)); ?></td>
                </tr>
                <tr>
                    <td>Página Original</td>
                    <td><?php echo $t->pagina_original_url; ?></td>
                </tr>
                <tr>
                    <td>Variação 1</td>
                    <td><?php echo $t->variacao_1_url; ?></td>
                </tr>
                <tr>
                    <td>Variação 2</td>
                    <td><?php echo $t->variacao_2_url; ?></td>
                </tr>
                <tr>
                    <td>Variação 3</td>
                    <td><?php echo $t->variacao_3_url; ?></td>
                </tr>
                <tr>
                    <td>Variação 4</td>
                    <td><?php echo $t->variacao_4_url; ?></td>
                </tr>
                <tr>
                    <td>Variação 5</td>
                    <td><?php echo $t->variacao_5_url; ?></td>
                </tr>
                <tr>
                    <td>Página de Conversão</td>
                    <td><?php echo $t->pagina_conversao_url; ?></td>
                </tr>
                <tr>
                    <td>Total de Visitantes</td>
                    <td><?php echo $t->trafego_total; ?></td>
                </tr>
                <tr>
                    <td>Total de Visitantes participantes do Teste A/B</td>
                    <td><?php echo $t->total_visitantes; ?></td>
                </tr>
                <tr>
                    <td>Terminar quando?</td>
                    <td><?php echo mostrar_finalizar_teste($t->parar_teste, $t->qtde_testes); ?></td>
                </tr>
                <tr>
                    <td>Porcentagem do Tráfego</td>
                    <td><?php echo mostrar_porcentagem_trafego($t->trafego, $t->porcentagem); ?></td>
                </tr>
            </tbody>
        </table>   
        <h2>Métricas</h2>
        <table class="table table-bordered lista-testes">
            <thead>
                <tr>
                    <th>Métrica</th>
                    <th>Página Original</th>
                    <th>Variação 1</th>
                    <th>Variação 2</th>
                    <th>Variação 3</th>
                    <th>Variação 4</th>
                    <th>Variação 5</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Visitas</td>
                    <td><?php echo $t->pagina_original_visitantes; ?></td>
                    <td><?php echo $t->variacao_1_visitantes; ?></td>
                    <td><?php echo ($t->variacao_2_url != '') ? $t->variacao_2_visitantes : 'Não Utilizada' ?></td>
                    <td><?php echo ($t->variacao_3_url != '') ? $t->variacao_3_visitantes : 'Não Utilizada' ?></td>
                    <td><?php echo ($t->variacao_4_url != '') ? $t->variacao_4_visitantes : 'Não Utilizada' ?></td>
                    <td><?php echo ($t->variacao_5_url != '') ? $t->variacao_5_visitantes : 'Não Utilizada' ?></td>
                </tr>
                <tr>
                    <td>Conversões</td>
                    <td><?php echo $t->conversao_from_original; ?></td>
                    <td><?php echo $t->conversao_from_1 ?></td>
                    <td><?php echo ($t->variacao_2_url != '') ? $t->conversao_from_2 : 'Não Utilizada' ?></td>
                    <td><?php echo ($t->variacao_3_url != '') ? $t->conversao_from_3 : 'Não Utilizada' ?></td>
                    <td><?php echo ($t->variacao_4_url != '') ? $t->conversao_from_4 : 'Não Utilizada' ?></td>
                    <td><?php echo ($t->variacao_5_url != '') ? $t->conversao_from_5 : 'Não Utilizada' ?></td>
                </tr>
                <tr>
                    <td>Conversão em %</td>
                    <td class="<?php if (conversao_original($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_original($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_original($t).'%' ?></td>
                    <td class="<?php if (conversao_variacao_1($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_1($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_variacao_1($t).'%' ?></td>
                    <td class="<?php if (conversao_variacao_2($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_2($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo ($t->variacao_2_url != '') ? conversao_variacao_2($t).'%' : 'Não Utilizada' ?></td>
                    <td class="<?php if (conversao_variacao_3($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_3($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo ($t->variacao_3_url != '') ? conversao_variacao_3($t).'%' : 'Não Utilizada' ?></td>
                    <td class="<?php if (conversao_variacao_4($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_4($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo ($t->variacao_4_url != '') ? conversao_variacao_4($t).'%' : 'Não Utilizada' ?></td>
                    <td class="<?php if (conversao_variacao_5($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_5($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo ($t->variacao_5_url != '') ? conversao_variacao_5($t).'%' : 'Não Utilizada' ?></td>
                </tr>
                <tr>
                    <td>Melhoria em %</td>
                    <td>--</td>
                    <td><?php echo squeezewp_mostrar_melhoria_variacao_1($t) ?></td>
                    <td><?php echo squeezewp_mostrar_melhoria_variacao_2($t) ?></td>
                    <td><?php echo squeezewp_mostrar_melhoria_variacao_3($t) ?></td>
                    <td><?php echo squeezewp_mostrar_melhoria_variacao_4($t) ?></td>
                    <td><?php echo squeezewp_mostrar_melhoria_variacao_5($t) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>