<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 04/12/2017
 * Time: 19:08
 */

$medico_id= $this->uri->segment(3, 0);//echo "medico: ".$medico_id;exit;
//echo"<pre>";print_r($GLOBALS);echo"</pre>";exit;
?>

<!-- about section -->

<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Nova Especialidade</h4>

            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Selecione uma Nova Especialidade</h3>

                        <form name="myForm" class="form" method="post" action="/medico/nova_especialidade">
                            <input class="text" type="hidden" name="id_usuario" value="<?=$medico_id ?>">
                            <select name="id_especializacao" class="email" style="float: left;"  required>
                                <option value="">Selecione sua Especialização</option>
                                <?php
                                foreach($especializacoes as $esp){
                                    ?>
                                    <option value="<?php echo $esp->id_especializacao; ?>"><?php echo $esp->nm_especializacao; ?></option>
                                <?php } ?>
                            </select>
                            <br />
                            <br />

                            <input style="float: none !important;" type="button" name="cancel" value="CANCELAR" onClick="history.back()" class="submit-btn" />&nbsp;&nbsp;
                            <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-6"></div>

        </div>
    </div>
</section><!-- end of about section -->


<script>

    $("#backToShop").click(function(){
        document.getElementById("myForm").submit();
    });
</script>
