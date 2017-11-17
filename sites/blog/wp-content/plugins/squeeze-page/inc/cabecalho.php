<?php 
    $usar_cabecalho = get_post_meta($id, 'usar_cabecalho', true);
    if($usar_cabecalho == '1') {
        $cor_cabecalho = get_post_meta($id, 'cor_cabecalho', true);
        $logo = get_post_meta($id, 'logo', true);
        $logo = wp_get_attachment_image_src($logo, 'full');
        $logo = $logo[0];
        $usar_menu = get_post_meta($id, 'usar_menu', true);
        $usar_explicativo = get_post_meta($id, 'usar_explicativo', true);
        $titulo_texto_explicativo = get_post_meta($id, 'titulo_texto_explicativo', true);
        $usar_depoimentos = get_post_meta($id, 'usar_depoimentos', true);
        $titulo_depoimentos = get_post_meta($id, 'titulo_depoimentos', true);
        $usar_rodape = get_post_meta($id, 'usar_rodape', true);
        $titulo_rodape = get_post_meta($id, 'titulo_rodape', true);
?>
        <style>
            #cabecalho{
                background-color: <?php echo $cor_cabecalho; ?>;
            }
        </style>
        <div id="cabecalho">
            <div class="container">
                <div class="row">
                    <div class="col-md-4" id="logo">
                        <img src="<?php echo $logo; ?>" />
                    </div>
                    <div class="col-md-8" id="menu-superior">
                    <ul>
                        <li><a href="#">Início</a></li>
                        <?php if ($usar_explicativo == '1' && $titulo_texto_explicativo <> ''){ ?>
                            <li><a href="#texto_explicativo"><?php echo $titulo_texto_explicativo; ?></a></li>
                        <?php } ?>
                        <?php if ($usar_depoimentos == '1' && $titulo_depoimentos <> ''){ ?>
                            <li><a href="#depoimentos"><?php echo $titulo_depoimentos; ?></a></li>
                        <?php } ?>
                        <?php if ($usar_rodape == '1' && $titulo_rodape <> ''){ ?>
                        <li><a href="#footer"><?php echo $titulo_rodape; ?></a></li>
                        <?php } ?>
                    </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php } ?>