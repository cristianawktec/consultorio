<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<?php $endereco = $endereco[0]; ?>
<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">


            <div class="col-md-2 col-sm-7"></div>
            <div class="col-md-9 col-sm-7">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Atualizar Endereço Médico</h3>

                        <form class="form" method="post" action="/medico/atualizar_endereco/<?=$endereco->id_endereco;?>">
                            <input class="text" type="text" name="nr_cep" id="cep" placeholder="Informe seu Cep" value="<?php echo $endereco->nr_cep;?>">
                            <input class="text" type="text" name="nm_endereco" id="nm_endereco" placeholder="Rua" value="<?php echo $endereco->nm_endereco;?>">
                            <input class="text" type="text" name="nr_endereco" id="nr_endereco" placeholder="Sala" value="<?php echo $endereco->nr_endereco;?>">
                            <input class="text" type="text" name="nm_bairro" id="nm_bairro" placeholder="Seu Bairro" value="<?php echo $endereco->nm_bairro;?>">
                            <input class="text" type="text" name="nm_cidade" id="nm_cidade" placeholder="Sua Cidade" value="<?php echo $endereco->nm_cidade;?>">
                            <input class="text" type="text" name="nm_estado" id="nm_estado" placeholder="Estado" value="<?php echo $endereco->nm_estado;?>">
                            <input class="text" type="text" name="ds_observacao" id="ds_observacao" placeholder="Complemento" value="<?php echo $endereco->ds_observacao;?>">


                            <input style="float: none !important;" type="button" name="cancel" value="CANCELAR" onClick="history.back()" class="submit-btn" />&nbsp;&nbsp;
                            <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-7"></div>

        </div>
    </div>
</section><!-- end of about section -->
