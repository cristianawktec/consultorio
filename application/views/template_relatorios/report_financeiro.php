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
                    <th>Data Pagamento</th>
                    <th>Proximo Pagamento</th>
                    <th>Status Pagamento</th>
                </tr>
                <?php foreach($pagamentos as $pagamento) { ?>
                <tr>
                    <td>
                        <?php
                            echo  $data = date('d/m/Y', strtotime($pagamento->dt_pagamento));
                        ?>
                    </td>
                    <td>
                        <?php
                        $data = date('Y-m-d', time());
                        $data = date('Y-m', strtotime("+1 month", strtotime($pagamento->dt_pagamento)));
                        echo "10/" . date('m/Y', strtotime($data));
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($pagamento->statusTransacao == ''){
                            echo "Cancelado";
                        } elseif ($pagamento->statusTransacao == 1) {
                            echo "Autorizado";
                        } elseif ($pagamento->statusTransacao == 2) {
                            echo "Iniciado";
                        } elseif ($pagamento->statusTransacao == 3) {
                            echo "Boleto impresso";
                        } elseif ($pagamento->statusTransacao == 4) {
                            echo "Concluido";
                        } elseif ($pagamento->statusTransacao == 5) {
                            echo "Cancelado";
                        } elseif ($pagamento->statusTransacao == 6) {
                            echo "Em análise";
                        } elseif ($pagamento->statusTransacao == 7) {
                            echo "Estornado";
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>