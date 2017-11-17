<?php 
    if($usar_explicativo == '1') {
        $texto_explicativo = get_post_meta($id, 'texto_explicativo', true);
        $cor_explicativo = get_post_meta($id, 'cor_explicativo', true); 
?>
        <style>
            #texto_explicativo{
                background-color: <?php echo $cor_explicativo; ?>;
            }
        </style>
        <div id="texto_explicativo">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $texto_explicativo; ?>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>