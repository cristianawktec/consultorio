<?php
$squeeze = SqueezeWP::get_instance();
$bootstrap = plugins_url('../bootstrap/css/bootstrap.min.css', __FILE__);
wp_enqueue_style('bootstrap', $bootstrap);



$css_file = plugins_url('../css/css-admin.css', __FILE__);
wp_enqueue_style('css_admin', $css_file);

$paginas = $squeeze->get_pages_sp('sp');

if (isset($_GET['action']))
    if ($_GET['action'] == 'del'){ 
        update_post_meta($_GET['post'], 'conversoes', 0);
        update_post_meta($_GET['post'], 'acessos', 0);
        echo '<script type="text/javascript">
    window.location = "' . get_bloginfo('url') . '/wp-admin/admin.php?page=squeezewp-estatisticas";
</script>';
    }
    

?>
<style>
    .table{
        background: #fff;
    }
</style>
<h1>Estatísticas das Páginas de Captura</h1>
<div class="row corpo">
	<div class="col-md-12">
		<table class="table table-bordered lista-testes">
		      <thead>
		        <tr>
		          <th>Título</th>
		          <th>Link da Página</th>
		          <th>Acessos</th>
		          <th>Conversões</th>
                          <th>Conversões (%)</th>
                          <th>Ações</th>
		        </tr>
		      </thead>
		      <tbody>
                          <?php
                            foreach($paginas as $p){ 
                                $p = explode('|', $p);
                                $query = new WP_Query('page_id=' . $p[0]);?>
                          <tr>
                              <?php
                                if ( $query->have_posts()){ $query->the_post();
                                if (get_post_meta(get_the_ID(), 'acessos') <> false)
                                    $acessos = get_post_meta(get_the_ID(), 'acessos', true);
                                else
                                    $acessos = 0;
                                if (get_post_meta(get_the_ID(), 'conversoes') <> false)
                                    $conversoes = get_post_meta(get_the_ID(), 'conversoes', true);
                                else
                                    $conversoes = 0;
                                if ($conversoes <> 0 && $acessos <> 0)
                                    $porc  = round($conversoes/$acessos * 100, 2);
                                else
                                    $porc = 0;
                          ?>
                        
                            <td><?php the_title(); ?></td>
                            <td><?php the_permalink(); ?></td>
                            <td><?php echo $acessos; ?></td>
                            <td><?php echo $conversoes; ?></td>
                            <td><?php echo $porc; ?>%</td>
                            <td><a href="<?php bloginfo('url') ?>/wp-admin/admin.php?page=squeezewp-estatisticas&action=del&post=<?php the_ID(); ?>">Zerar Estatísticas </a></td>
		        </tr>
                                <?php }} ?>
		      </tbody>
		    </table>
	</div>
</div>

