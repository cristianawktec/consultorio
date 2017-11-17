<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 20px;padding-top: 116px;">
            <h4>Marcar Consulta</h4>
            <?php

            if(!$_GET){
                $visita = "false";
            } else {
                $visita = $_GET['visita'];
            }
            if($visita != "true") { $consulta = $consulta[0]; ?>
            <form method="post" action="/consulta/atualiza_dia">
                <input type="hidden" name="id_consulta" value="<?php echo $consulta->id; ?>">
                <input id="descricao" name="descricao" type="text" value="<?php echo $consulta->descricao; ?>" style="width: 29% !important;" /> <br><br>
                <input id="data_inicio" name="data_inicio" type="text" value="<?php echo $consulta->data_inicio; ?>" /> <br><br>
                <input id="data_final" name="data_final" type="text" value="<?php echo $consulta->data_final; ?>" /><br>
                <input type="radio" <?php if($consulta->feito == 1) { ?> checked <?php } ?> name="feito" value="1"> Feito
                <input type="radio" <?php if($consulta->feito == 0) { ?> checked <?php } ?> name="feito" value="0"> Não Feito<br>
                <p>
                    <textarea style="width: 29%" name="obs"></textarea>
                </p>
                <input class="submit-btn" type="submit" value="Salvar">
            </form>
            <?php }  ?>

        </div>
        <div class="row">
            <h3>Historico de Consulta</h3>
            <?php foreach($historicos as $historico){ ?>
                <p style="background-color: #cdc;padding: 6px;">
                    <?php echo date('d/m/Y H:i:s', strtotime($historico->dt_cadastro)); ?> - <?php echo $historico->observacao; ?>
                </p>
            <?php } ?>
        </div>
    </div>

</section>