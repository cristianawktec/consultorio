<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">
            <h4>Resultado de pesquisa</h4>
            <?php foreach($pacientes as $paciente) { ?>
                <p>>> <? echo $paciente->nm_paciente; ?> - <? echo $paciente->nr_cpf; ?> - <? echo date('d/m/Y', strtotime($paciente->nm_paciente)); ?> <span class="glyphicon glyphicon-list-alt"
                                                                                                                                 style="cursor: pointer"
                                                                                                                                 data-toggle="tooltip"
                                                                                                                                 data-placement="top"
                                                                                                                                 onclick="histConsulta('<?php echo $paciente->id_usuario ?>');"
                                                                                                                                 title="Historico de Consultas"
                                                                                                                                 aria-hidden="true"></span></p>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    function histConsulta(id){
        window.location.href = "<?php echo site_url('/consulta/paciente') ?>/"+id
    }
</script>
