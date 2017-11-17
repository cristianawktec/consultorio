<?php
    $bootstrap = plugins_url( '../../bootstrap/css/bootstrap.min.css', __FILE__ );
    wp_enqueue_style('bootstrap', $bootstrap); 
    $css_file = plugins_url( '../../css/css-admin.css', __FILE__ );
    wp_enqueue_style('css_admin', $css_file);
    global $wpdb;
    $testes = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . 'teste_ab');
    require_once 'teste-ab-funcoes.php';
?>
<style>
    .table{
        background: #fff;
    }
</style>
<div class="row corpo">
	<div class="col-md-12">
		<div class="buttons">
                    <a href="admin.php?page=squeezewp-teste-ab&action=testeab-upgrade" class="btn btn-danger upgrade">Apagar Testes e Atualizar tabelas</a>
                    <a href="admin.php?page=squeezewp-teste-ab&action=testeab-new" class="btn btn-primary">Adicionar Novo</a>
                    
                </div>
		<table class="table table-bordered lista-testes">
		      <thead>
		        <tr>
		          <th>Nome</th>
		          <th>Conversão da Página Original</th>
		          <th>Conversão da Variação I</th>
		          <th>Conversão da Variação II</th>
                          <th>Conversão da Variação III</th>
		          <th>Conversão da Variação IV</th>
                          <th>Conversão da Variação V</th>
                          <th>Status</th>
                          <th>Ação</th>
		        </tr>
		      </thead>
		      <tbody>
                        <?php
                            foreach($testes as $t){
                                if ($t->status == 'ativo'){
                                    $status = 'parado';
                                    $label = 'parar';
                                }
                                else{
                                    $status = 'ativo';
                                    $label = 'ativar';
                                }
                        ?>
                        <tr>
		          <td><?php echo $t->nome; ?></td>
		          <td class="<?php if (conversao_original($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_original($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_original($t); ?>%</td>
		          <td class="<?php if (conversao_variacao_1($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_1($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_variacao_1($t); ?>%</td>
		          <td class="<?php if (conversao_variacao_2($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_2($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_variacao_2($t); ?>%</td>
                          <td class="<?php if (conversao_variacao_3($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_3($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_variacao_3($t); ?>%</td>
                          <td class="<?php if (conversao_variacao_4($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_4($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_variacao_4($t); ?>%</td>
                          <td class="<?php if (conversao_variacao_5($t) == squeezewp_e_maior($t)) echo "bg-success"; if (conversao_variacao_5($t) == squeezewp_e_menor($t)) echo "bg-danger";?>"><?php echo conversao_variacao_5($t); ?>%</td>
                          <td><?php echo $t->status ?></td>
                          <td><a class="delete" href="admin.php?page=squeezewp-teste-ab&action=testeab-del&teste=<?php echo $t->id; ?>">deletar</a> | 
                              <a class="parar" href="admin.php?page=squeezewp-teste-ab&action=testeab-parar&status=<?php echo $status; ?>&teste=<?php echo $t->id; ?>"><?php echo $label; ?></a> | 
                              <a href="admin.php?page=squeezewp-teste-ab&action=testeab-detalhes&teste=<?php echo $t->id; ?>">detalhes</a></td>
		        </tr>
                        <?php
                            }
		        ?>
		      </tbody>
		    </table>
	</div>
</div>
<script type="text/javascript">
    jQuery('.delete').on('click', function () {
        return confirm('Quer realmente deletar esse Teste A/B?');
    });
    
     jQuery('.upgrade').on('click', function () {
        return confirm('Quer realmente deletar Testes A/B e atualizar tabelas?');
    });
    jQuery('.parar').on('click', function () {
        return confirm('Quer realmente <?php echo $label; ?> esse Teste A/B?');
    });
</script>