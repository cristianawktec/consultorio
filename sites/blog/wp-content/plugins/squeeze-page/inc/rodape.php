<?php 
    if($usar_rodape == '1') {
        $cor_rodape = get_post_meta($id, 'cor_rodape', true);
        $texto_rodape = get_post_meta($id, 'texto_rodape', true);
?>
        <style>
            #footer{
                background-color: <?php echo $cor_rodape; ?>;
            }
        </style>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $texto_rodape; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php } ?>