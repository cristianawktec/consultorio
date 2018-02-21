<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 21/02/2018
 * Time: 15:15
 */
?>
<style>
    .contact-caption {
    margin-top: 30px !important;
    }
</style>
<?php //echo"<pre>view: ";print_r($valor);echo"</pre>";exit; ?>
<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 170px;">


            <div class="col-md-2 col-sm-7"></div>
            <div class="col-md-9 col-sm-7">
                <div class="contact-caption clearfix" style="width: 75%">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Atualizar Valor da Primeira Consulta</h3>

                        <form class="form" method="post" action="/medico/atualizar_valor1/<?=$valor[0]->id_usuario;?>">
                            <div class="input-group xs-mb-15"><span class="input-group-addon">R$</span>
                                <input class="form-control" type="text" name="vr_consulta1" id="vr_consulta1" placeholder="Informe o Valor da Primeira Consulta" style="width: 45%" value="<?php echo $valor[0]->vr_consulta1;?>">
                            </div>
                            <div class="input-group xs-mb-15" style="width: 85%">
                                <input style="float: none !important;" type="button" name="cancel" value="CANCELAR" onClick="history.back()" class="submit-btn" />&nbsp;&nbsp;
                                <input class="submit-btn" type="submit" value="ENVIAR">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-7"></div>

        </div>
    </div>
</section><!-- end of about section -->
