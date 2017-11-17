<?php
if ($_POST) {
    $nome = $_POST['nome'];
    $qtde_testes = $_POST['qtde_testes'];
    $parar_teste = $_POST['parar_teste'];

    $original = explode('|', $_POST['pagina_original']);
    $original_id = $original[0];
    $original_url = $original[1];

    $variacao_1 = explode('|', $_POST['variacao_1']);
    $variacao_1_id = $variacao_1[0];
    $variacao_1_url = $variacao_1[1];

    $variacao_2 = explode('|', $_POST['variacao_2']);
    $variacao_2_id = $variacao_2[0];
    $variacao_2_url = $variacao_2[1];
    
    $variacao_3 = explode('|', $_POST['variacao_3']);
    $variacao_3_id = $variacao_3[0];
    $variacao_3_url = $variacao_3[1];
    
    $variacao_4 = explode('|', $_POST['variacao_4']);
    $variacao_4_id = $variacao_4[0];
    $variacao_4_url = $variacao_4[1];
    
    $variacao_5 = explode('|', $_POST['variacao_5']);
    $variacao_5_id = $variacao_5[0];
    $variacao_5_url = $variacao_5[1];

    $pagina_conversao = explode('|', $_POST['pagina_conversao']);
    $pagina_conversao_id = $pagina_conversao[0];
    $pagina_conversao_url = $pagina_conversao[1];
    
    $trafego = $_POST['trafego'];
    $porcentagem = $_POST['porcentagem'];
    

    if (empty($variacao_2_id)) {
        $variacao_2_id = 0;
    }
    
    if (empty($variacao_3_id)) {
        $variacao_3_id = 0;
    }
    
    if (empty($variacao_4_id)) {
        $variacao_4_id = 0;
    }
    
    if (empty($variacao_5_id)) {
        $variacao_5_id = 0;
    }


    global $wpdb;
    $rows_affected = $wpdb->insert($wpdb->prefix . 'teste_ab', array(
        'nome' => $nome,
        'status' => 'ativo',
        'parar_teste' => $parar_teste,
        'qtde_testes' => $qtde_testes,
        'pagina_original_id' => $original_id,
        'pagina_original_url' => $original_url,
        'variacao_1_id' => $variacao_1_id,
        'variacao_1_url' => $variacao_1_url,
        'variacao_2_id' => $variacao_2_id,
        'variacao_2_url' => $variacao_2_url,
        'variacao_3_id' => $variacao_3_id,
        'variacao_3_url' => $variacao_3_url,
        'variacao_4_id' => $variacao_4_id,
        'variacao_4_url' => $variacao_4_url,
        'variacao_5_id' => $variacao_5_id,
        'variacao_5_url' => $variacao_5_url,
        'pagina_conversao_id' => $pagina_conversao_id,
        'pagina_conversao_url' => $pagina_conversao_url,
        'data_criacao' => date('Y-m-d H:i:s'),
        'trafego' => $trafego,
        'porcentagem' => $porcentagem,
    ));
}


$bootstrap = plugins_url('../../bootstrap/css/bootstrap.min.css', __FILE__);
wp_enqueue_style('bootstrap', $bootstrap);

$js_file = plugins_url('../../js/jquery.validate.min.js', __FILE__);
wp_enqueue_script('validate', $js_file, array('jquery'));

$pages = get_pages();


function get_options_pages($pages) {
    $squeeze = SqueezeWP::get_instance();
    foreach ($pages as $p) {
        $template_name = get_post_meta( $p->ID, '_wp_page_template', true );
        $templates = $squeeze->template_pages;
        if (in_array($template_name, $templates)){
            echo '<option value="' . $p->ID . '|' . get_page_link($p->ID) . '">' . $p->post_title . '</option>';
        }
    }
}
?>
<div class="row corpo">
    <div class="col-md-11">
        <div id="alerta" class="alert alert-danger" role="alert" style="display:none">...</div>
        <form class="form-horizontal" role="form" id="form" method="POST">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome do Teste A/B</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do Teste A/B" />
                </div>
            </div>
            <div class="form-group">
                <label for="pagina_original" class="col-sm-2 control-label">Página Original</label>
                <div class="col-sm-10">
                    <select class="form-control" name="pagina_original" id="pagina_original">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="variacao_1" class="col-sm-2 control-label">Variação 1</label>
                <div class="col-sm-10">
                    <select class="form-control" name="variacao_1" id="variacao_1">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="variacao_2" class="col-sm-2 control-label">Variação 2</label>
                <div class="col-sm-10">
                    <select class="form-control" name="variacao_2" id="variacao_2">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="variacao_3" class="col-sm-2 control-label">Variação 3</label>
                <div class="col-sm-10">
                    <select class="form-control" name="variacao_3" id="variacao_3">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="variacao_4" class="col-sm-2 control-label">Variação 4</label>
                <div class="col-sm-10">
                    <select class="form-control" name="variacao_4" id="variacao_4">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="variacao_5" class="col-sm-2 control-label">Variação 5</label>
                <div class="col-sm-10">
                    <select class="form-control" name="variacao_5" id="variacao_5">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group has-success">
                <label for="pagina_conversao" class="col-sm-2 control-label">Página de Conversão</label>
                <div class="col-sm-10">
                    <select class="form-control" name="pagina_conversao" id="pagina_conversao">
                        <option value="">Selecione --></option>
                        <?php echo get_options_pages($pages); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="parar_teste" class="col-sm-2 control-label">Parar o teste quando?</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="parar_teste" value="0" checked>
                            Parar teste manualmente
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="parar_teste" value="1">
                            Parar teste quando atingir esta quantidade de testes:
                            <input type="number" name="qtde_testes" class="form-control" id="qtde_testes" placeholder="Quantidade de Testes">
                        </label>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="trafego" class="col-sm-2 control-label">Qual a porcentagem de trágego para o teste A/B?</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="trafego" value="0" checked>
                            Todo o tráfego
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="trafego" value="1">
                            Porcentagem:
                            <input type="number" name="porcentagem" class="form-control" id="porcentagem" placeholder="Quantidade em (%)">
                        </label>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 buttons">
                    <button id="submit" type="submit" class="btn btn-primary">Salvar e Ativar Teste</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    <?php if ($rows_affected == 1) { ?>
	window.location = "<?php bloginfo('wpurl') ?>/wp-admin/admin.php?page=squeezewp-teste-ab&action=testeab";
    <?php } ?>
    jQuery("#form").validate({
        rules: {
            // simple rule, converted to {required:true}
            nome: {
                required: true
            },
            pagina_original: "required",
            variacao_1: "required",
            pagina_conversao: "required",
            qtde_testes: {
                required: function() {
                    return jQuery("#form input[type='radio']:checked").val() == 1;
                },
                number: function() {
                    return jQuery("#form input[type='radio']:checked").val() == 1;
                }
            }
        },
        messages:{
            nome: "O nome é obrigatório",
            pagina_original: "A página original é obrigatória",
            variacao_1: "A variação 1 é obrigatória",
            pagina_conversao: "A página de conversão é obrigatória",
            qtde_testes: {
                required: "A quantidade de testes é obrigatório e precisa ser inteiro",
                number: "A quantidade de testes é obrigatório e precisa ser inteiro"
            }
        }
    });
    
    jQuery("#submit").click(function() {
        jQuery("#alerta").css("display", "none");
        if (jQuery("#form").valid()) {
            if (isUnique()) {
                jQuery("#form").submit();
            }
            else {
                erros = "As páginas Original, Variação 1, Variação 2 e Página de Conversão precisam ser únicas";
            }
            if (erros !== ""){
                jQuery("#alerta").text(erros);
                jQuery("#alerta").css("display", "block");
            }
        }
        return false;
    });


    function isUnique() {
        var pagina_original = jQuery("#pagina_original").val();
        var variacao_1 = jQuery("#variacao_1").val();
        var variacao_2 = jQuery("#variacao_2").val();
        var pagina_conversao = jQuery("#pagina_conversao").val();

        if ((variacao_2 == "")) {
            if ((pagina_original != variacao_1) && (pagina_original != pagina_conversao) && (variacao_1 != pagina_conversao)) {
                return true;
            }
            else {
                return false;
            }
        }

        if ((variacao_2 != '')) {
            if ((pagina_original != variacao_1) && (pagina_original != variacao_2) && (pagina_original != pagina_conversao) && (variacao_1 != variacao_2) && (variacao_1 != pagina_conversao) && (variacao_2 != pagina_conversao)) {
                return true;
            }
            else {
                return false;
            }
        }
    }
</script>