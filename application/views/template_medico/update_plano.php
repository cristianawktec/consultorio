<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 26/12/2017
 * Time: 15:27
 */

$medico_id= $this->uri->segment(3, 0);//echo "medico: ".$medico_id;exit;
//echo"<pre>";print_r($GLOBALS);echo"</pre>";exit;
?>

<!-- about section -->

<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Novo Plano</h4>

            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Selecione um Novo Plano</h3>

                        <form name="myForm" class="form" method="post" action="/medico/mudar_plano/<?=$medico_id ?>">
                            <input class="text" type="hidden" name="id_usuario" value="<?=$medico_id ?>">
                            <select name="id_plano" class="email" style="float: left;"  required>
                                <option value="">Selecione um Plano</option>
                                <?php
                                foreach($plano as $plan){
                                    //echo"<pre>plano: ";print_r($plano);echo"</pre>";exit;
                                    ?>
                                    <!--<option value="<?php echo $plan->id_plano; ?>"><?php echo $plan->nm_plano; ?></option>-->
                                <?php } ?>
                                <option value="1">Free</option>
                                <option value="2">Básico</option>
                                <option value="3">Premium</option>
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
