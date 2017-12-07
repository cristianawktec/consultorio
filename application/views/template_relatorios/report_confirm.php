<style>
    .contact-caption {
        margin-top: 0px !important;
    }
    .thTitle{
        background: cadetblue;
        color: #fff;
    }
</style>

<!-- menu -->
<div class="col-md-12 col-sm-6 dados">
    <div class="tab-container" style="MARGIN-BOTTOM: 17PX;margin-top: 150px;">
        <ul class="nav nav-tabs">
            <li class="active"><a href="<?php echo base_url(); ?>medico/perfil/#home" ><span class="icon mdi mdi-home"></span>INICIO</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil" ><span class="icon mdi mdi-face"></span>MEU PERFIL</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#dadosconsultorio" ><span class="icon mdi mdi-city"></span>DADOS DO CONSULTÓRIO</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#calendario" ><span class="icon mdi mdi-calendar"></span>CALENDÁRIO</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#reserva" ><span class="icon mdi mdi-calendar-check"></span>RESERVA DE CONSULTA</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#relatorio" ><span class="icon mdi mdi-collection-text"></span>RELATÓRIOS</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#avaliacoes" ><span class="icon mdi mdi-book"></span>AVALIAÇÕES</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#agenda" ><span class="icon mdi mdi-assignment"></span>AGENDA</a></li>
            <li><a href="<?php echo base_url(); ?>medico/perfil/#mensalidade" ><span class="icon mdi mdi-card"></span>MENSALIDADES</a></li>
        </ul>
    </div>
    <div>
        <!-- fim menu -->

<!-- about section -->
<section class="about " id="about">
    <div class="container">

        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading"><h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Relatório de Consultas Confirmadas</h2>
                    <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                </div>
                <div class="panel-body">
                    <table id="table1" class="table table-striped table-hover table-fw-widget">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data Consulta</th>
                            <th>Data de Confirmação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pacientes as $paciente) { ?>
                            <tr>
                                <th><?php echo $paciente->nm_paciente; ?></th>
                                <th><?php echo $paciente->email; ?></th>
                                <th><?php echo date('d/m/Y', strtotime($paciente->dt_consulta)); ?></th>
                                <th><?php echo date('d/m/Y', strtotime($paciente->dt_confirmacao)); ?></th>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>



<script src="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
</script>
<script type="text/javascript">
    $.fn.niftyModal('setDefaults',{
        overlaySelector: '.modal-overlay',
        closeSelector: '.modal-close',
        classAddAfterOpen: 'modal-show',
    });

    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
</script>

<script src="../../../sites/beagle/dist/html/assets/js/main.js" type="text/javascript"></script>

<!-- datatables-->

<script src="../../../sites/beagle/dist/html/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/app-tables-datatables.js" type="text/javascript"></script>

<!-- graficos -->
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- fim graficos -->

<script src="../../../sites/beagle/dist/html/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/app-dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
        App.dashboard();

    });
</script>