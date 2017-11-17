<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>


<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Consultas do Paciente: </h4>
            <table class="table table-striped">

                <!-- Menu -->
                <div class="row" STYLE="    MARGIN-BOTTOM: 17PX;">
                    <span class="menuProfile">
                        <a href="<?php echo base_url('medico/perfil'); ?>?profile=i">INICIO</a>
                    </span>
                    <span class="menuProfile">
                        <a href="<?php echo base_url('medico/perfil'); ?>?profile=h">MEU PERFIL MÉDICO</a>
                    </span>
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=p">DADOS DO CONSULTÓRIO</a></span>
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=m" >CALENDÁRIO</a></span>
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=s" >RESERVA DE CONSULTA</a></span>
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=r">RELATÓRIOS</a></span>
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=a">AVALIAÇÕES</a></span>
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=c" >MINHA AGENDA</a></span>
                </div>
                <!-- fim menu -->

                <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Data da Consulta</th>
                    <th>Data de Confirmação</th>
                    <th>Médico Responsavel</th>
                    <!--<th>Ações</th>-->
                </tr>
                </thead>
                <tbody>
                <?php foreach($consultas as $consulta) { ?>
                <tr>
                    <td><?php echo $consulta->nm_consulta; ?></td>
                    <td><?php echo $consulta->dt_consulta; ?> <?php echo $consulta->hr_inicio; ?></td>
                    <td><?php echo $consulta->dt_confirmacao; ?></td>
                    <td><?php echo $consulta->nm_medico; ?></td>
                    <!--<td><a href="<?php echo site_url('/consulta/editar/'.$consulta->id_consulta)?>?visita=true">Visualizar</a> </td>-->
                </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</section>