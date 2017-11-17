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
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">
            <h4>Sugerir nova data de Consulta</h4>
            <form method="post" action="/consulta/mudar_data/<?php echo $consulta[0]->id_consulta; ?>">
                <input type="hidden" name="id_paciente" value="<?php echo $consulta[0]->id_paciente; ?>">
                <div class="col-md-4">
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
                    <button type="submit" class="btn btn-default loginAjax">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</section>
