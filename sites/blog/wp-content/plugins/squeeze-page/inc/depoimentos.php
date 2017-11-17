<?php 
    if($usar_depoimentos == '1') {
        $cor_depoimentos = get_post_meta($id, 'cor_depoimentos', true);
        $qtde_colunas = get_post_meta($id, 'qtde_colunas', true);
        $qtde_depoimentos = get_post_meta($id, 'qtde_depoimentos', true);
        $depoimentos = array();

        $nome_depoimento_1 = get_post_meta($id, 'nome_depoimento_1', true);
        $empresa_depoimento_1 = get_post_meta($id, 'empresa_depoimento_1', true);
        $foto_depoimento_1 = get_post_meta($id, 'foto_depoimento_1', true);
        $foto_depoimento_1 = wp_get_attachment_image_src($foto_depoimento_1, 'full');
        $foto_depoimento_1 = $foto_depoimento_1[0];
        $texto_depoimento_1 = get_post_meta($id, 'texto_depoimento_1', true);
        $depoimento1 = array($nome_depoimento_1, $empresa_depoimento_1, $foto_depoimento_1, $texto_depoimento_1);
        $depoimentos[] = $depoimento1;

        if ($qtde_depoimentos >= 2){
            $nome_depoimento_2 = get_post_meta($id, 'nome_depoimento_2', true);
            $empresa_depoimento_2 = get_post_meta($id, 'empresa_depoimento_2', true);
            $foto_depoimento_2 = get_post_meta($id, 'foto_depoimento_2', true);
            $foto_depoimento_2 = wp_get_attachment_image_src($foto_depoimento_2, 'full');
            $foto_depoimento_2 = $foto_depoimento_2[0];
            $texto_depoimento_2 = get_post_meta($id, 'texto_depoimento_2', true);
            $depoimento2 = array($nome_depoimento_2, $empresa_depoimento_2, $foto_depoimento_2, $texto_depoimento_2);
            $depoimentos[] = $depoimento2;
        }
        if ($qtde_depoimentos >= 3){
            $nome_depoimento_3 = get_post_meta($id, 'nome_depoimento_3', true);
            $empresa_depoimento_3 = get_post_meta($id, 'empresa_depoimento_3', true);
            $foto_depoimento_3 = get_post_meta($id, 'foto_depoimento_3', true);
            $foto_depoimento_3 = wp_get_attachment_image_src($foto_depoimento_3, 'full');
            $foto_depoimento_3 = $foto_depoimento_3[0];
            $texto_depoimento_3 = get_post_meta($id, 'texto_depoimento_3', true);
            $depoimento3 = array($nome_depoimento_3, $empresa_depoimento_3, $foto_depoimento_3, $texto_depoimento_3);
            $depoimentos[] = $depoimento3;
        }

        if ($qtde_depoimentos >= 4){
            $nome_depoimento_4 = get_post_meta($id, 'nome_depoimento_4', true);
            $empresa_depoimento_4 = get_post_meta($id, 'empresa_depoimento_4', true);
            $foto_depoimento_4 = get_post_meta($id, 'foto_depoimento_4', true);
            $foto_depoimento_4 = wp_get_attachment_image_src($foto_depoimento_4, 'full');
            $foto_depoimento_4 = $foto_depoimento_4[0];
            $texto_depoimento_4 = get_post_meta($id, 'texto_depoimento_4', true);
            $depoimento4 = array($nome_depoimento_4, $empresa_depoimento_4, $foto_depoimento_4, $texto_depoimento_4);
            $depoimentos[] = $depoimento4;
        }
?>
        <style>
            #depoimentos{
                background-color: <?php echo $cor_depoimentos; ?>;
            }
        </style>
        <div id="depoimentos">
            <div class="container">
                <div class="row">
                    <?php if($qtde_colunas == '2') $class = 'col-md-6'; else $class = 'col-md-10 col-md-offset-1'; ?>
                    <?php foreach($depoimentos as $depoimento){ ?>
                    <div class="<?php echo $class; ?>">
                        <div class="depoimento row">
                            <div class="col-md-4"><img class="foto" src="<?php echo $depoimento[2]; ?>" /></div>
                            <div class="col-md-8">
                                <div class="nome"><?php echo $depoimento[0]; ?></div>
                                <div class="empresa"><?php echo $depoimento[1]; ?></div>
                                <div class="texto"><?php echo $depoimento[3]; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
<?php } ?>