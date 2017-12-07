<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<script>
    function mydate()
    {
        //alert("");
        document.getElementById("dt").hidden=false;
        document.getElementById("dt_consulta").hidden=true;
    }
    function mydate1()
    {
        d=new Date(document.getElementById("dt").value);
        dt=d.getDate();
        mn=d.getMonth();
        mn++;
        yy=d.getFullYear();
        document.getElementById("dt_consulta").value=dt+"/"+mn+"/"+yy
        document.getElementById("dt_consulta").hidden=false;
        document.getElementById("dt").hidden=true;
    }
</script>


<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4 style="margin-top: 20px;">Sugerir nova data de Consulta</h4>

            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Informe um novo horário de atendimento!</h3>

                        <form id="myForm" name="myForm" class="form" method="post" action="/consulta/mudar_data/<?php echo $consulta[0]->id_consulta; ?>">
                            <input type="hidden" name="id_paciente" value="<?php echo $consulta[0]->id_paciente; ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data Atual</label>
                                <input type="text" placeholder="Data atual" value="<?php  echo date('d/m/Y', strtotime($consulta[0]->dt_consulta)); ?>">
                                <!--<input type="text" class="form-control"  value="<?php  echo $consulta[0]->dt_consulta; ?>" placeholder="Data atual">-->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nova Data</label>
                                <input type="hidden" name="horario" value="<?php echo $consulta[0]->dt_consulta; ?>">
                                <input type="date" id="dt" onchange="mydate1();" hidden/>
                                <input type="text" id="dt_consulta" name="dt_consulta"  onclick="mydate();" placeholder="Informe nova data" <?php if($this->session->usuario){ ?> required="required" <?php } ?>>
                                <!--<input type="text" name="dt_consulta" class="form-control" id="dt_consulta" placeholder="Informe nova data">-->
                            </div>
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

