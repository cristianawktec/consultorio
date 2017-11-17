<?php
$bootstrap = plugins_url('../../bootstrap/css/bootstrap.min.css', __FILE__);
wp_enqueue_style('bootstrap', $bootstrap);

wp_enqueue_script('bootstrap-js', plugins_url('../../bootstrap/js/bootstrap.min.js', __FILE__), array('jquery'), null, true);
$squeeze = SqueezeWP::get_instance();
?>
<div class="inner-page">
    <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'gratis') {
    ?>
    <div id="alerta" class="alert alert-danger" role="alert">A licença GRÁTIS não contempla essa página de captura</div>
    <?php }?>
    <h1>Modelos disponíveis</h1>
    <h3>Páginas de Captura</h3>
    <?php 
        $cont = count($squeeze->pages_captura_only);
        for($i=0;$i<$cont;$i++){
    ?>        
    
    
    <div class="col-md-4 criar-pagina">
        <div class="inner">
            <img src="<?php echo plugins_url('images/' . str_replace('php', 'jpg', $squeeze->pages_captura_only[$i]), __FILE__); ?>" />
            <div class="commands">
                <div class="col-md-7 legend"><?php echo $squeeze->pages_captura_only_names[$i]; ?></div>
                <div class="col-md-5 button-criar"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary botao-criar" href="#" id="<?php echo $squeeze->pages_captura_only[$i]; ?>">Criar Página</a></div>
            </div>
        </div>
    </div>
        <?php } ?>
    
    <div class="clearfix"></div>
    <h3>Páginas de Confirmação</h3>
    <?php 
        $cont = count($squeeze->pages_confirmacao);
        for($i=0;$i<$cont;$i++){
    ?>        
    
    
    <div class="col-md-4 criar-pagina">
        <div class="inner">
            <img src="<?php echo plugins_url('images/' . str_replace('php', 'jpg', $squeeze->pages_confirmacao[$i]), __FILE__); ?>" />
            <div class="commands">
                <div class="col-md-7 legend"><?php echo $squeeze->pages_confirmacao_names[$i]; ?></div>
                <div class="col-md-5 button-criar"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary botao-criar" href="#" id="<?php echo $squeeze->pages_confirmacao[$i]; ?>">Criar Página</a></div>
            </div>
        </div>
    </div>
        <?php } ?>
    
    
    <div class="clearfix"></div>
    <h3>Páginas de Download de Recompensa</h3>
    <?php 
        $cont = count($squeeze->pages_download);
        for($i=0;$i<$cont;$i++){
    ?>        
    
    
    <div class="col-md-4 criar-pagina">
        <div class="inner">
            <img src="<?php echo plugins_url('images/' . str_replace('php', 'jpg', $squeeze->pages_download[$i]), __FILE__); ?>" />
            <div class="commands">
                <div class="col-md-7 legend"><?php echo $squeeze->pages_download_names[$i]; ?></div>
                <div class="col-md-5 button-criar"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary botao-criar" href="#" id="<?php echo $squeeze->pages_download[$i]; ?>">Criar Página</a></div>
            </div>
        </div>
    </div>
        <?php } ?>
    
    <div class="clearfix"></div>
    <h3>Páginas de Webinário</h3>
    <?php 
        $cont = count($squeeze->pages_webinario);
        for($i=0;$i<$cont;$i++){
    ?>        
    
    
    <div class="col-md-4 criar-pagina">
        <div class="inner">
            <img src="<?php echo plugins_url('images/' . str_replace('php', 'jpg', $squeeze->pages_webinario[$i]), __FILE__); ?>" />
            <div class="commands">
                <div class="col-md-7 legend"><?php echo $squeeze->pages_webinario_names[$i]; ?></div>
                <div class="col-md-5 button-criar"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary botao-criar" href="#" id="<?php echo $squeeze->pages_webinario[$i]; ?>">Criar Página</a></div>
            </div>
        </div>
    </div>
        <?php } ?>
    <div class="clearfix"></div>
    <h3>Funil de Lançamento</h3>
    <div class="col-md-4 criar-pagina">
        <div class="inner">
            <img src="<?php echo plugins_url('images/' . str_replace('php', 'jpg', 'funil-1.php'), __FILE__); ?>" />
            <div class="commands">
                <div class="col-md-7 legend">Funil de Lançamento</div>
                <div class="col-md-5 button-criar"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary botao-criar" href="#" id="funil-1.php">Criar Página</a></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <h3>Outras Páginas</h3>
    <?php 
        $cont = count($squeeze->pages_outras_paginas);
        for($i=0;$i<$cont;$i++){
    ?>        
    
    
    <div class="col-md-4 criar-pagina">
        <div class="inner">
            <img src="<?php echo plugins_url('images/' . str_replace('php', 'jpg', $squeeze->pages_outras_paginas[$i]), __FILE__); ?>" />
            <div class="commands">
                <div class="col-md-7 legend"><?php echo $squeeze->pages_outras_paginas_names[$i]; ?></div>
                <div class="col-md-5 button-criar"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary botao-criar" href="#" id="<?php echo $squeeze->pages_outras_paginas[$i]; ?>">Criar Página</a></div>
            </div>
        </div>
    </div>
        <?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Criar Nova Página</h4>
            </div>
            <form method="POST" action="edit.php?post_type=page&page=criar-squeeze">
                <div class="modal-body">
                    <input name="tipo-pagina" id="tipo-pagina" type="hidden" />
                    Nome da Página: <input name="nome-pagina" type="text" id="nome-pagina" />
                </div>
                <div class="modal-footer">
                    <input type="submit" type="button" class="btn btn-primary" value="Criar Página" />
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    #nome-pagina{
        width: 100%;
    }
</style>
<script>
    var j = jQuery.noConflict();
    j(document).ready(function() {
        j('.botao-criar').click(function() {
            j("#tipo-pagina").val(j(this).attr('id'));
        });
    });
    
</script>