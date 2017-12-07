<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 05/12/2017
 * Time: 20:34
 */
$medico_id= $this->uri->segment(3, 0);//echo "medico: ".$medico_id;exit;
?>
<style>
    .contact-caption {
    margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">
            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Atualizar Foto</h3>

                        <form method="post" action="/medico/atualiza_foto" enctype="multipart/form-data">
                            <input type="hidden" name="id_usuario" value="<?=$medico_id; ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Nova Imagem:</label>
                                    <input type="file" class="form-control" name="image"  id="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input style="float: none !important;" type="button" name="cancel" value="CANCELAR" onClick="history.back()" class="submit-btn" />&nbsp;&nbsp;
                                <input class="submit-btn" type="submit" value="ENVIAR">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-6"></div>
        </div>
    </div>
</section><!-- end of about section -->
