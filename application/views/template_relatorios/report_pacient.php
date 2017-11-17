<style>
    .contact-caption {
        margin-top: 0px !important;
    }
    .thTitle{
        background: cadetblue;
        color: #fff;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">
            <h4>Relatório de Meus Pacientes Atendidos</h4>
            <table class="table table-hover" style="    border: 1px solid !important;">
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
                    <span class="menuProfile"><a href="<?php echo base_url('medico/perfil'); ?>?profile=f" >MINHAS MENSALIDADES</a></span>
                </div>
                <!-- fim menu -->
                <tr class="thTitle">
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Data de Nascimento</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
                <?php foreach($pacientes as $paciente) { ?>
                <tr>
                    <th><?php echo $paciente->nm_paciente; ?></th>
                    <th><?php echo $paciente->email; ?></th>
                    <th><?php echo date('d/m/Y', strtotime($paciente->dt_nascimento)); ?></th>
                    <th><?php echo $paciente->nm_cidade; ?></th>
                    <th><?php echo $paciente->nm_estado; ?></th>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>