<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/27/15
 * Time: 10:38 PM
 */
//echo"<pre>";print_r($GLOBALS);echo"</pre>";exit;
?>


<style>
    .contact-caption {
        margin-top: 0px !important;
    }

    .ondestar {
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 68px;
    }

    .twostar {
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 55px;;
    }

    .threestar {
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 41px;;
    }

    .fourstar {
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 27px;;
    }

    .fivestar {
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 14px;;
    }

    .label-info-red {
        background-color: #CE575C;
    }
</style>

<?php

//echo"<pre>view";print_r($agenda);echo"</pre>";exit;
//echo"agenda ".$agenda->0;exit;
//echo"agenda ".$agenda[0]->horario;exit;

    if (@$agenda[0]->horario == "") {
        ?>
        <div class="container">
            <div class="row">
                <div class="team-heading text-center" style="margin-top: 200px">
                    <font size="30" color="#42b3e5">Você precisa preencher os horários de sua Agenda!</font>
                </div>
                <!--Modal Alerts-->
                <div class="be-content">
                    <div class="main-content container-fluid">
                        <div class="row">
                            <!--Nifty Modals Effects-->
                            <div class="col-sm-6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true" style="margin-left: 150px;">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h4>Acesse sua Agenda e preencha seus horários de Atendimento!</h4>
                                        <div class="xs-mt-30 xs-mb-20 text-center">
                                            <a href="/agenda/novo" class="btn btn-space btn-success md-trigger" role="button" aria-pressed="true">Preencher!</a>
                                        </div>

                                        <div class="modal-overlay"></div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php
    } else { ?>

<!-- about section -->
<section class="about " id="about">

    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4 style="margin-top: 20px;"><?php echo $medico[0]->nm_medico; ?>
                <!--<a href="/login/logout"><span class="btn btn-primary btnSession">Fechar Sessão</span></a>--> </h4>

            <div class="col-md-12 col-sm-6 dados">
                <div class="tab-container" STYLE="    MARGIN-BOTTOM: 17PX;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home"" data-toggle="tab"><span class="icon mdi mdi-home"></span>INICIO</a>
                        </li>
                        <li><a href="#meuperfil" data-toggle="tab"><span class="icon mdi mdi-face"></span>MEU PERFIL</a>
                        </li>
                        <li><a href="#dadosconsultorio" data-toggle="tab"><span class="icon mdi mdi-city"></span>DADOS
                                DO CONSULTÓRIO</a></li>
                        <li><a href="#calendario" data-toggle="tab"><span class="icon mdi mdi-calendar"></span>CALENDÁRIO</a>
                        </li>
                        <li><a href="#reserva" data-toggle="tab"><span class="icon mdi mdi-calendar-check"></span>RESERVA
                                DE CONSULTA</a></li>
                        <li><a href="#relatorio" data-toggle="tab"><span class="icon mdi mdi-collection-text"></span>RELATÓRIOS</a>
                        </li>
                        <li><a href="#avaliacoes" data-toggle="tab"><span
                                    class="icon mdi mdi-book"></span>AVALIAÇÕES</a></li>
                        <li><a href="#agenda" data-toggle="tab"><span class="icon mdi mdi-assignment"></span>AGENDA</a>
                        </li>
                        <li><a href="#mensalidade" data-toggle="tab"><span class="icon mdi mdi-card"></span>MENSALIDADES</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <?php if ($this->session->flashdata('mesage')) { ?>
                        <div class="alert alert-success"
                             role="alert"><?php echo $this->session->flashdata('mesage'); ?></div>
                    <?php } ?>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="tab-pane active cont">
                            <!-- tab home -->
                            <div class="be-wrapper be-fixed-sidebar" style="padding-top: 0px;">
                                <div class="be-content" style="margin-left: 0px;">
                                    <div class="main-content container-fluid">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="tools"><span
                                                                class="icon mdi mdi-download"></span><span
                                                                class="icon mdi mdi-more-vert"></span></div>
                                                        <div class="title">Agenda do Dia</div>
                                                    </div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-striped table-borderless">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:40%;">Paciente</th>
                                                                <th style="width:20%;">Data</th>
                                                                <th style="width:5%;" class="actions"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="no-border-x">
                                                            <tr>
                                                                <?php if (count($agendaDia) > 0) {
                                                                foreach ($agendaDia as $agenda) { ?>
                                                                <tr>
                                                                    <td><?php echo $agenda->descricao ?></td>
                                                                    <td><?php echo date('d/m/Y H:i:s', strtotime($agenda->data_inicio)) ?></td>
                                                                <?php }
                                                                    } else {
                                                                        echo "Não há atendimentos agendados para hoje.";
                                                                    }
                                                                ?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="tools"><span
                                                                class="icon mdi mdi-download"></span><span
                                                                class="icon mdi mdi-more-vert"></span></div>
                                                        <div class="title">Financeiro</div>
                                                    </div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <tr>
                                                                <?php
                                                                //echo"pgto: <pre>";print_r($pagamentos2);echo"</pre>";
                                                                if (count($pagamentos) == 0) { ?>
                                                                    Mensalidade em aberto <a
                                                                        href='/pagamento/medico/<?= $this->session->usuario->id_usuario; ?>'>clique
                                                                        aqui</a>
                                                                    <?php
                                                                } else {
                                                                    echo "Nenhuma pendencia! <br />";
                                                                    $atual = date('Y-m');
                                                                    $data = $pagamentos[0]->dt_pagamento;
                                                                    $data = date('Y-m', strtotime("+1 month", strtotime($data)));
                                                                    echo "Proxima Mensalidade: 10/" . date('m/Y', strtotime($data));
                                                                    if (count($pagamentos) == 1) {
                                                                        if ($atual == $data) {
                                                                            foreach ($pagamentos as $pagamento) { ?>
                                                                                <a href='/pagamento/medico/<?= $this->session->usuario->id_usuario; ?>'>
                                                                                    [ Pagar ] </a>
                                                                            <? }
                                                                        }
                                                                    } else {
                                                                        echo "  [ Esta Mensalidade já esta Paga! ]";
                                                                    }
                                                                } ?>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="widget widget-fullwidth be-loading">
                                                    <div class="widget-head">
                                                        <div class="tools">
                                                            <div class="dropdown"><span data-toggle="dropdown"
                                                                                        class="icon mdi mdi-more-vert visible-xs-inline-block dropdown-toggle"></span>
                                                                <ul role="menu" class="dropdown-menu">
                                                                    <li><a href="#">Week</a></li>
                                                                    <li><a href="#">Month</a></li>
                                                                    <li><a href="#">Year</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#">Today</a></li>
                                                                </ul>
                                                            </div>
                                                            <span class="icon mdi mdi-chevron-down"></span><span
                                                                class="icon toggle-loading mdi mdi-refresh-sync"></span><span
                                                                class="icon mdi mdi-close"></span>
                                                        </div>
                                                        <div class="button-toolbar hidden-xs">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default">Semana
                                                                </button>
                                                                <button type="button" class="btn btn-default active">
                                                                    Mês
                                                                </button>
                                                                <button type="button" class="btn btn-default">Ano
                                                                </button>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default">Hoje
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span class="title">Movimentações Recentes</span>
                                                    </div>
                                                    <div class="widget-chart-container">
                                                        <div class="widget-chart-info">
                                                            <ul class="chart-legend-horizontal">
                                                                <li><span data-color="main-chart-color1"></span>
                                                                    Consultas Confirmadas
                                                                </li>
                                                                <li><span data-color="main-chart-color2"></span>
                                                                    Canceladas
                                                                </li>
                                                                <li><span data-color="main-chart-color3"></span>
                                                                    Reagendadas
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="widget-counter-group widget-counter-group-right">
                                                            <div class="counter counter-big">
                                                                <div class="value"><?php echo $confirmadas; ?></div>
                                                                <div class="desc">Consultas Confirmadas</div>
                                                            </div>
                                                            <div class="counter counter-big">
                                                                <div class="value"><?php echo $canceladas; ?></div>
                                                                <div class="desc">Canceladas</div>
                                                            </div>
                                                            <div class="counter counter-big">
                                                                <div class="value"><?php echo $reagendadas; ?></div>
                                                                <div class="desc">Reagendadas</div>
                                                            </div>
                                                        </div>

                                                        <!-- GRAFICOS -->
                                                        <script src="../../../assets/Highcharts/code/highcharts.js"></script>
                                                        <script src="../../../assets/Highcharts/code/highcharts-3d.js"></script>
                                                        <script src="../../../assets/Highcharts/code/modules/exporting.js"></script>

                                                        <div id="container" class="span3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                                                        <script type="text/javascript">
                                                            // Radialize the colors
                                                            Highcharts.setOptions({
                                                                colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                                                    return {
                                                                        radialGradient: {
                                                                            cx: 0.5,
                                                                            cy: 0.3,
                                                                            r: 0.7
                                                                        },
                                                                        stops: [
                                                                            [0, color],
                                                                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                                                        ]
                                                                    };
                                                                })
                                                            });

                                                            // Build the chart
                                                            Highcharts.chart('container', {
                                                                chart: {
                                                                    plotBackgroundColor: null,
                                                                    plotBorderWidth: null,
                                                                    plotShadow: false,
                                                                    type: 'pie'
                                                                },
                                                                title: {
                                                                    text: 'Movimentação de Consultas'
                                                                },
                                                                tooltip: {
                                                                    pointFormat: '{point.y}: <b>{point.percentage:.1f}%</b>'
                                                                },
                                                                plotOptions: {
                                                                    pie: {
                                                                        allowPointSelect: false,
                                                                        cursor: 'pointer',
                                                                        dataLabels: {
                                                                            enabled: true,
                                                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                                            style: {
                                                                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                                            },
                                                                            connectorColor: 'silver'
                                                                        }
                                                                    }
                                                                },
                                                                series: [{
                                                                    name: 'Brands',
                                                                    data: [
                                                                        { name: 'Confirmadas', y: <?php echo $confirmadas; ?> },
                                                                        {
                                                                            name: 'Canceladas',
                                                                            y: <?php echo $canceladas; ?>,
                                                                            sliced: true,
                                                                            selected: true
                                                                        },
                                                                        { name: 'Reagendadas', y: <?php echo $reagendadas; ?> }
                                                                    ]
                                                                }]
                                                            });
                                                        </script>
                                                        <!-- FIM GRAFICOS -->

                                                    </div>
                                                    <div class="be-spinner">
                                                        <svg width="40px" height="40px" viewBox="0 0 22 22"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <circle fill="none" stroke-width="4" stroke-linecap="round"
                                                                    cx="22" cy="22" r="20" class="circle"></circle>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="tools"><span
                                                                class="icon mdi mdi-download"></span><span
                                                                class="icon mdi mdi-more-vert"></span></div>
                                                        <div class="title">Últimas Consultas</div>
                                                    </div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-striped table-borderless">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:40%;">Paciente</th>
                                                                <th style="width:20%;">Data</th>
                                                                <th style="width:20%;">Estado</th>
                                                                <th style="width:5%;" class="actions"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="no-border-x">
                                                            <?php foreach ($consultas as $consulta) { ?>
                                                            <tr>
                                                                <td><?php echo $consulta->nm_paciente ?></td>
                                                                <td><?php echo date("d/m/Y", strtotime($consulta->dt_consulta)) . " " . $consulta->hr_inicio ?></td>
                                                                <td><?php echo $consulta->nm_consulta ?></td>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="tools"><span
                                                                class="icon mdi mdi-download"></span><span
                                                                class="icon mdi mdi-more-vert"></span></div>
                                                        <div class="title">Pacientes</div>
                                                    </div>
                                                    <div class="panel-body table-responsive">
                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:37%;">Paciente</th>
                                                                <th>Cadastrado</th>
                                                                <th>Contato</th>
                                                                <th class="actions"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($pacientes as $paciente) { ?>
                                                            <tr>
                                                                <td><?php echo $paciente->nm_paciente ?></td>
                                                                <td><?php echo $paciente->data_cadastro ?></td>
                                                                <td><?php echo $paciente->nr_celular ?></td>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4">

                                            </div>
                                            <div class="col-xs-12 col-md-4">

                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <div class="widget widget-calendar">
                                                    <div id="calendar-widget"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <script src="../../../sites/beagle/dist/html/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
                            <script src="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
                            <script src="../../../sites/beagle/dist/html/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>


                            <!-- fim tab home -->
                        </div>

                        <!-- meu perfil-->
                        <div id="meuperfil" class="tab-pane cont">
                            <div class="col-md-12 ">
                                <div class=""
                                     style="float: left !important; text-align: center;/* position: absolute; */left: 76%;">
                                    <?php if (!$medico[0]->imagem) { ?>
                                        <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                             alt="140x140"
                                            <?php if ($medico[0]->ch_sexo == "M") { ?>
                                                src="<?php echo base_url('assets'); ?>/img/medico_default.jpg" data-holder-rendered="true"
                                            <? } else { ?>
                                                src="<?php echo base_url('assets'); ?>/img/medica_default.jpg" data-holder-rendered="true"
                                            <? } ?>
                                             style="width: 279px;">
                                    <? } else { ?>
                                        <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                             alt="140x140"
                                             src="<?php echo base_url('assets'); ?>/img/archive/doctor/img/<?php echo $medico[0]->id_usuario ?>/<?php echo $medico[0]->imagem ?>"
                                             data-holder-rendered="true"
                                             style="width: 279px;">
                                    <? } ?>
                                    <br/>
                                    <!--<a href="" data-toggle="modal" data-target="#exampleModal">Editar Foto</a>-->
                                    <a href="/medico/atualiza_foto/<?= $medico[0]->id_usuario; ?>">Editar Foto</a>
                                </div>
                                <div class="form-group col-md-8 perfilMedico">
                                    <ul>
                                        <li>
                                            <label for="exampleInputName2">Name</label>
                                            <?php echo $medico[0]->nm_medico; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">Sexo</label>
                                            <?php echo $medico[0]->ch_sexo; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">E-mail</label>
                                            <?php echo $medico[0]->email; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">CPF</label>
                                            <?php echo $medico[0]->nr_cpf; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">RG</label>
                                            <?php echo $medico[0]->nr_rg; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">Coselho</label>
                                            <?php echo $medico[0]->nm_conselho; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">Número do Conselho</label>
                                            <?php echo $medico[0]->nr_conselho; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">Número do CNES:</label>
                                            <?php echo $medico[0]->nr_cnes; ?>
                                        </li>
                                        <li>
                                            <label for="exampleInputName2">LOGIN</label>
                                            <?php echo $medico[0]->nm_login; ?>
                                            <a href="/medico/atualiza_senha/<?= $medico[0]->id_usuario; ?>">Editar
                                                Senha</a>
                                        </li>
                                        <li>
                                            <label><strong>Página Web: </strong></label>
                                            <?php if ($medico[0]->pagina_web == "") {
                                                echo "Site não informado!";
                                            } else { ?>
                                                <a
                                                href="<? echo $medico[0]->pagina_web; ?>" ><? echo $medico[0]->pagina_web; ?></a><?
                                            } ?>
                                        </li>
                                        <li></li>
                                    </ul>
                                    <a class="btn btn-primary"
                                       href="/medico/atualiza_dados/<?= $medico[0]->id_usuario; ?>">Atualizar dados</a>


                                </div>

                                <div class="form-group col-md-12 perfilMedico">
                                    <label for="exampleInputName2">Especialidades</label>

                                    <ul class="list-inline especializacao">
                                        <li style="background-color: #fff !important;">
                                            <a class="btn btn-primary"
                                               href="/medico/atualiza_especialidade/<?= $medico[0]->id_usuario; ?>">Nova
                                                Especialidade</a>
                                        </li>
                                        <?php foreach ($especialidades as $especialidade) { ?>
                                            <li><?php echo $especialidade->nm_especializacao; ?>
                                                <button style="padding: 1px 7px !important; "
                                                        onclick="removeSpecialty('<?php echo $especialidade->id_especializacao; ?>', '<?php echo $medico[0]->id_usuario ?>')"
                                                        title="Remover Especialidade" class="btn btn-danger">X
                                                </button>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- planos -->
                            <div class="col-md-12 col-sm-6 dados">
                                <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Meu Plano</h2>
                                <table class="tableConsulta">
                                    <tr>
                                        <th>Médico</th>
                                        <th>Plano</th>
                                        <th>Ações</th>
                                    </tr>
                                    <?php foreach ($plano as $plan) { ?>
                                        <tr>
                                            <td><?php echo $plan->nm_login; ?></td>
                                            <td><?php echo $plan->nm_plano; ?></td>
                                            <td align="left" style="    width: 97px;">
                                                <a title="Editar plano"
                                                   href="/medico/plano-editar/<?= $plan->id_usuario; ?>">
                                                    <img class="bone img-responsive"
                                                         src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                         style="float: left !important;width: 37%;"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- fim planos -->

                            <!-- endereco -->
                            <div class="col-md-12 col-sm-6 dados">
                                <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Meu endereço</h2>
                                <table class="tableConsulta">
                                    <tr>
                                        <th>#CEP</th>
                                        <th>Rua</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th>Ações</th>

                                    </tr>
                                    <?php foreach ($endereços as $endereco) { ?>
                                        <tr>
                                            <td><?php echo $endereco->nr_cep; ?></td>
                                            <td><?php echo $endereco->nm_endereco; ?></td>
                                            <td><?php echo $endereco->nm_bairro; ?></td>
                                            <td><?php echo $endereco->nm_cidade; ?></td>
                                            <td><?php echo $endereco->nm_estado; ?></td>
                                            <td align="left" style="    width: 97px;">
                                                <a title="Editar endereço"
                                                   href="/medico/endereco-editar/<?= $endereco->id_endereco; ?>">
                                                    <img class="bone img-responsive"
                                                         src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                         style="float: left !important;width: 37%;"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                            <!-- fim endereco -->
                        </div>
                        <!-- fim meu perfil-->

                        <!-- dados consultorio-->
                        <div id="dadosconsultorio" class="tab-pane cont">
                            <div class="col-md-12 col-sm-6 dados">
                                <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Dados do
                                    Consultório</h2>
                                <table class="tableConsulta">
                                    <tr>
                                        <th>Endereço</th>
                                        <th>CEP</th>
                                        <th>Localização</th>
                                        <th>Telefone</th>
                                        <th>Ações</th>

                                    </tr>
                                    <?php foreach ($endereços as $endereco) { ?>
                                        <tr>
                                            <td>
                                                <?php echo " " . $endereços[0]->nm_endereco ?>
                                                , <?php echo $endereços[0]->nm_bairro ?>
                                                - <?php echo $endereços[0]->nm_cidade ?>
                                            </td>
                                            <td><?php echo " " . $endereços[0]->nr_cep ?></td>
                                            <td><?php echo $endereços[0]->nm_estado ?></td>
                                            <td><?php echo $medico[0]->telefone; ?></td>
                                            <td align="left" style="    width: 97px;">
                                                <a title="Editar endereço"
                                                   href="/medico/endereco-editar/<?= $endereco->id_endereco; ?>">
                                                    <img class="bone img-responsive"
                                                         src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                         style="float: left !important;width: 37%;"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <br>
                            <!-- valor da consulta-->
                            <div class="col-md-12 col-sm-6 dados">
                                <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Valor da Consutla</h2>
                                <table class="tableConsulta">
                                    <tr>
                                        <th>Consulta</th>
                                        <th>Valor</th>
                                        <th>Ações</th>
                                    </tr>
                                    <?php foreach ($endereços as $endereco) { ?>
                                        <tr>
                                            <td>Primeira Consulta</td>
                                            <td><?php echo $medico[0]->vr_consulta1; ?></td>
                                            <td align="left" style="    width: 97px;">
                                                <a title="Editar Valor da Primeira Consulta"
                                                   href="/medico/valorConsutla1-editar/<?= $medico[0]->id_usuario; ?>">
                                                    <img class="bone img-responsive"
                                                         src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                         style="float: left !important;width: 37%;"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <br>
                                    <table class="tableConsulta">
                                        <tr>
                                            <th>Consulta</th>
                                            <th>Valor</th>
                                            <th>Ações</th>
                                        </tr>
                                        <?php foreach ($endereços as $endereco) { ?>
                                            <tr>
                                                <td>Demais Consultas</td>
                                                <td><?php echo $medico[0]->vr_consulta2; ?></td>
                                                <td align="left" style="    width: 97px;">
                                                    <a title="Editar Valor da Consulta"
                                                       href="/medico/valorConsutla2-editar/<?= $medico[0]->id_usuario; ?>">
                                                        <img class="bone img-responsive"
                                                             src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                             style="float: left !important;width: 37%;"></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </table>
                            </div>
                            <!-- fim valor da consutla-->
                        </div>
                        <!-- fim dados consultorio-->

                        <!-- calendario-->
                        <div id="calendario" class="tab-pane cont">
                            <div class="form-group col-md-12 filter">
                                <strong>Clinica ou Consulta</strong><br>
                                <select>
                                    <option>Opção</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 filter">
                                <strong>Regras para distribuição de nomes</strong><br>
                                <select>
                                    <option>regras</option>
                                </select>
                            </div>
                            <div id='calendar'></div>
                        </div>
                        <!-- fim calendario-->

                        <!-- reserva de consulta-->
                        <div id="reserva" class="tab-pane cont">
                            <div class="col-sm-12">
                                <div class="panel panel-default panel-table">
                                    <div class="panel-heading"><h2
                                            style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Reserva de
                                            Consulta</h2>
                                        <div class="tools"><span class="icon mdi mdi-download"></span><span
                                                class="icon mdi mdi-more-vert"></span></div>
                                    </div>
                                    <div class="panel-body">
                                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                                            <thead>
                                            <tr>
                                                <th>Registrador por</th>
                                                <th>Data da Consulta</th>
                                                <th>Confirmada</th>
                                                <th>Paciente</th>
                                                <th>Estado</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($consultas as $consulta) { ?>
                                                <tr>
                                                    <td><?php echo $consulta->nm_paciente ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($consulta->dt_consulta)) . " " . $consulta->hr_inicio ?></td>
                                                    <td>
                                                        <?php
                                                        if ($consulta->ch_confirmacao == 1) {
                                                            echo date('d/m/Y H:i:s', strtotime($consulta->dt_confirmacao));
                                                        } elseif ($consulta->ch_confirmacao == 2) {
                                                            echo "Cancelado";
                                                        } elseif ($consulta->ch_confirmacao == 4) {
                                                            echo date('d/m/Y H:i:s', strtotime($consulta->dt_confirmacao));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $consulta->nm_paciente ?></td>
                                                    <td>
                                                        <?php
                                                        if ($consulta->ch_confirmacao == 1) {
                                                            echo "Confirmado";
                                                        } elseif ($consulta->ch_confirmacao == 2) {
                                                            echo "Cancelado";
                                                        } elseif ($consulta->ch_confirmacao == 3) {
                                                            echo "Nova Consulta";
                                                        } elseif ($consulta->ch_confirmacao == 4) {
                                                            echo "Consulta Remarcada";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="width: 14% !important;">
                                        <span style="cursor: pointer"
                                              data-toggle="tooltip"
                                              onclick="confirmConsult('<?php echo $consulta->id_consulta ?>','<?php echo $consulta->id_usuario; ?>')"
                                              data-placement="top"
                                              title="Confirmar Consulta"
                                              aria-hidden="true">
                                            <img class="bone img-responsive"
                                                 src="<?php echo base_url('assets'); ?>/img/icon/confirmar.png"
                                                 style="float: left !important;width: 15%;"></a>
                                        </span>
                                        <span style="cursor: pointer" data-toggle="tooltip"
                                              data-placement="top"
                                              onclick="chageDate('<?php echo $consulta->id_consulta ?>')"
                                              title="Informar outra data"
                                              aria-hidden="true">
                                            <img class="bone img-responsive"
                                                 src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                 style="float: left !important;width: 15%;"></a>
                                        </span>
                                        <span style="cursor: pointer" data-toggle="tooltip"
                                              data-placement="top"
                                              onclick="cancelConsult('<?php echo $consulta->id_consulta ?>','<?= $consulta->id_paciente; ?>')"
                                              title="Cancelar Consulta"
                                              aria-hidden="true">
                                            <img class="bone img-responsive"
                                                 src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png"
                                                 style="float: left !important;width: 15%;"></a>
                                        </span>
                                                        <!--<a href="#historico" data-toggle="tab">-->
                                            <span style="cursor: pointer"
                                                  data-toggle="tooltip"
                                                  data-placement="top"
                                                  onclick="histConsulta('<?php echo $consulta->id_paciente ?>');"
                                                  title="Historico de Consultas"
                                                  aria-hidden="true">
                                                <img class="bone img-responsive"
                                                     src="<?php echo base_url('assets'); ?>/img/icon/relatorio.png"
                                                     style="float: left !important;width: 15%;"></a>
                                            </span>
                                                        <!--</a>-->
                                                    </td>
                                                </tr>
                                            <? } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- fim reserva de consulta-->
                        <!-- historico consulta / esse historico esta sendo feito em /template_consulta/paciente-->
                        <div id="historico" class="tab-pane cont">
                            <div class="col-sm-12">
                                <div class="panel panel-default panel-table">
                                    <div class="panel-heading"><h2
                                            style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Histórico de
                                            Consulta</h2>
                                        <div class="tools"><span class="icon mdi mdi-download"></span><span
                                                class="icon mdi mdi-more-vert"></span></div>
                                    </div>
                                    <div class="panel-body">
                                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                                            <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Data da Consulta</th>
                                                <th>Data de Confirmação</th>
                                                <th>Médico Responsavel</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($consultas as $consulta) { ?>
                                                <tr>
                                                    <td><?php echo $consulta->nm_consulta; ?></td>
                                                    <td><?php echo $consulta->dt_consulta; ?><?php echo $consulta->hr_inicio; ?></td>
                                                    <td><?php echo $consulta->dt_confirmacao; ?></td>
                                                    <td><?php echo @$consulta->nm_paciente; ?></td>
                                                    <!--<td><a href="<?php echo site_url('/consulta/editar/' . $consulta->id_consulta) ?>?visita=true">Visualizar</a> </td>-->
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim historico consuta -->

                        <!-- relatorios-->
                        <div id="relatorio" class="tab-pane cont">
                            <div class="row">
                                <a href="/relatorio/pacientes">
                                    <div class="col-md-1 iconReport">
                                        <img class="bone img-responsive"
                                             src="<?php echo base_url('assets'); ?>/img/icon/paciente.png"
                                             style="float: left !important;width: 95%;">Pacientes
                                </a>
                            </div>
                            </a>
                            <a href="/relatorio/consultas_confirmadas">
                                <div class="col-md-1 iconReport">
                                    <img class="bone img-responsive"
                                         src="<?php echo base_url('assets'); ?>/img/icon/confirmar.png"
                                         style="float: left !important;width: 75%;">Consultas Confirmadas
                            </a>
                        </div>
                        </a>
                        <a href="/relatorio/consultas_canceladas">
                            <div class="col-md-1 iconReport">
                                <img class="bone img-responsive"
                                     src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png"
                                     style="float: left !important;width: 75%;">Consultas Canceladas
                        </a>
                    </div>
                    </a>
                    <a href="/relatorio/financeiro">
                        <div class="col-md-1 iconReport">
                            <img class="bone img-responsive"
                                 src="<?php echo base_url('assets'); ?>/img/icon/financeiro.png"
                                 style="float: left !important;width: 95%;">Financeiro
                    </a>
                </div>
                </a>
            </div>
        </div>
        <!-- fim relatorios-->

        <!-- avaliacoes-->
        <div id="avaliacoes" class="tab-pane cont">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">
                            Avaliações realizadas pelos Pacientes
                        </h2>
                        <div class="tools">
                            <span class="icon mdi mdi-download"></span>
                            <span class="icon mdi mdi-more-vert"></span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Paciente</th>
                                <th>Nota</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($notas as $nota) { ?>
                                <tr>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($nota->data_cadastro)); ?></td>
                                    <td><?php echo $nota->nm_paciente; ?></td>
                                    <td>
                                        <?php
                                        if ($nota->nota == 5) {
                                            echo '<div class="fivestar"></div>';
                                        } elseif ($nota->nota == 1) {
                                            echo '<div class="ondestar"></div>';
                                        } elseif ($nota->nota == 2) {
                                            echo '<div class="twostar"></div>';
                                        } elseif ($nota->nota == 3) {
                                            echo '<div class="threestar"></div>';
                                        } elseif ($nota->nota == 4) {
                                            echo '<div class="fourstar"></div>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim avaliacoes-->

        <!-- agenda-->
        <div id="agenda" class="tab-pane cont">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">
                            Minha Agenda de Atendimento
                        </h2>
                        <div class="tools">
                            <span class="icon mdi mdi-download"></span>
                            <span class="icon mdi mdi-more-vert"></span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-primary" href="/agenda/novo">Novo Horário</a>
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>HORARIO</th>
                                <th>Ações</th>
                            </tr>
                            <tbody>
                            <?php foreach ($agenda as $age) { ?>
                                <tr>
                                    <td><?php echo $age->id_agenda; ?></td>
                                    <td><?php echo $age->horario; ?></td>
                                    <td style="width: 14% !important;">
                                        <a href="/agenda/editar/<?= $age->id_agenda; ?>" title="Editar">
                                            <img class="bone img-responsive"
                                                 src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                 style="float: left !important;width: 15%;">
                                        </a>

                                        <a href="/agenda/remover/<?= $age->id_agenda ?>" title="Excluir">
                                            <img class="bone img-responsive"
                                                 src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png"
                                                 style="float: left !important;width: 15%;">
                                        </a>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim agenda-->

        <!-- mensalidade-->
        <div id="mensalidade" class="tab-pane cont">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">
                            Mensalidades
                        </h2>
                        <div class="tools">
                            <span class="icon mdi mdi-download"></span>
                            <span class="icon mdi mdi-more-vert"></span>
                        </div>
                    </div>
                    <div class="">
                        <ul class="list-group">
                            <?php
                            $atual = date('Y-m');
                            $data = date('Y-m', strtotime("+0 month", strtotime($atual)));
                            if (count($pagamentos) == 0) { ?>
                                <li class="list-group-item">
                                    <span class="label label-info-red">PAGAR</span>
                                    <a href='/pagamento/medico/<?= $this->session->usuario->id_usuario; ?>'>
                                        Proxima Mensalidade: 10/<?= date('m/Y', strtotime($data)); ?> [
                                        Pagar ] </a>
                                </li>
                                <?
                            }
                            foreach ($pagamentos2 as $pag) {
                                ?>
                                <li class="list-group-item">
                                    <span class="label label-info">PAGO</span>
                                    <?= date('d/m/Y', strtotime($pag->dt_pagamento)); ?> - Valor de:
                                    R$ <?= $pag->vl_pagamento; ?>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim mensalidade-->
    </div>

    </div>

    </div>
    </div>
    </div>
</section>
<?php } ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Aplicar Nova Foto</h4>
            </div>
            <form method="post" action="/medico/atualiza_foto" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario" value="<?php echo $medico[0]->id_usuario; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nova Imagem:</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add especialidade -->
<!-- Nifty Modal-->
<div id="" class="modal-container modal-effect-6" style="perspective: none;padding-top: 56px;" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content" style="padding-top: 0px;">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span
                    class="mdi mdi-close"></span></button>
        </div>
        <div class="modal-body2">
            <div class="text-center">
                <div class="text-primary" style="height: 20px;">
                    <span class="modal-main-icon mdi mdi-check"></span></div>
                <h3>Adicionar Nova Especialidade</h3>
                <form method="post" action="/medico/nova_especialidade" enctype="multipart/form-data">
                    <input type="hidden" name="id_usuario" value="<?php echo $medico[0]->id_usuario; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nova Especialidade:</label>
                            <select name="id_especializacao" class="email" required>
                                <option value="">Selecione sua Especialização</option>
                                <?php
                                foreach ($especializacoes as $esp) {
                                    ?>
                                    <option
                                        value="<?php echo $esp->id_especializacao; ?>"><?php echo $esp->nm_especializacao; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input style="float: none !important;" type="button" name="cancel" value="CANCELAR"
                               onClick="history.back()" class="submit-btn"/>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<!-- Nifty Modal-->
<!-- fim add especialidade -->


<!-- calendario-->
<link href='<?php echo base_url('assets') ?>/js/fullcalendar/fullcalendar.css' rel='stylesheet'/>
<link href='<?php echo base_url('assets') ?>/js/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print'/>
<script src='<?php echo base_url('assets') ?>/js/fullcalendar/lib/moment.min.js'></script>

<script src='<?php echo base_url('assets') ?>/js/fullcalendar/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '<?php echo date("Y-m-d", time()); ?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php foreach($agendaConsultas as $agenda){
                $data_inicio = explode(' ', $agenda->data_inicio);
                $data_inicio = $data_inicio[0] . "T" . $data_inicio[1];

                $data_final = explode(' ', $agenda->data_final);
                $data_final = $data_final[0] . "T" . $data_final[1];
                ?>
                {
                    id: <?php echo $agenda->id; ?>,
                    title: '<?php echo $agenda->descricao; ?>',
                    start: '<?php echo $data_inicio; ?>',
                    end: '<?php echo $data_final; ?>'
                },
                <?php } ?>
            ],
            eventDrop: function (event, delta, revertFunc) {
                var dateFirstEvent = event.start.format();
                console.log(event.end.format());
                var dateEndEvent = event.end.format();

                var id = event.id;
                changeDate(dateFirstEvent, dateEndEvent, id);
            },
            eventClick: function (calEvent, jsEvent, view) {
                $('#calendar').fullCalendar('removeEvents', function (event) {
                    var id = calEvent.id;
                    var url = window.location.href;

                    window.location.href = "<?php echo site_url('/consulta/editar/')?>/" + id;
                });
            },

        });

    });

    function changeDate(dateFirstEvent, dateEndEvent, id) {
        $.ajax({
            url: "<?php echo site_url('/consulta/mudar_dia_consulta')?>",
            type: "POST",
            data: "data=" + dateFirstEvent + "&data2=" + dateEndEvent + "&id=" + id + "",
            //dataType: "html",
            success: function (data) {
                alert("Data atualizada com sucesso!");
            },
        });
    }
</script>
<script>
    function GetQueryString(a) {
        a = a || window.location.search.substr(1).split('&').concat(window.location.hash.substr(1).split("&"));
        if (typeof a === "string")
            a = a.split("#").join("&").split("&");

        // se não há valores, retorna um objeto vazio
        if (!a) return {};

        var b = {};
        for (var i = 0; i < a.length; ++i) {
            // obtem array com chave/valor
            var p = a[i].split('=');

            // se não houver valor, ignora o parametro
            if (p.length != 2) continue;

            // adiciona a propriedade chave ao objeto de retorno
            // com o valor decodificado, substituindo `+` por ` `
            // para aceitar URLs codificadas com `+` ao invés de `%20`
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        // retorna o objeto criado
        return b;
    }

    function confirmConsult(id, id_paciente) {
        $.ajax({
            'url': "<?php echo site_url('/consulta/confirmar')?>",
            'type': 'POST',
            'data': 'id_consulta=' + id + "&id_paciente=" + id_paciente,
            'success': function (data) {
                alert("Consulta confirmada com sucesso!");
                window.location.reload();
            }
        });
    }

    function chageDate(id) {
        window.location.href = "<?php echo site_url('/consulta/mudarData') ?>/" + id;
    }

    function histConsulta(id) {
        window.location.href = "<?php echo site_url('/consulta/paciente') ?>/" + id
    }

    function cancelConsult(id, id_paciente) {
        window.location.href = "<?php echo site_url('/consulta/cancelar') ?>/" + id + "/" + id_paciente;
    }

    function removeSpecialty(id_especializacao, id_medico) {
        $.ajax({
            'url': "<?php echo site_url('/medico/removeSpecialty')?>",
            'type': 'POST',
            'data': 'id_especializacao=' + id_especializacao + "&id_medico=" + id_medico,
            'success': function (data) {
                alert("Removido especialização com sucesso!");
                window.location.reload();
            }
        });
    }
</script>

</script>

<script src="../../../sites/beagle/dist/html/assets/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //initialize the javascript
        App.init();
    });
</script>
<script type="text/javascript">
    $.fn.niftyModal('setDefaults', {
        overlaySelector: '.modal-overlay',
        closeSelector: '.modal-close',
        classAddAfterOpen: 'modal-show',
    });

    $(document).ready(function () {
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="../../../sites/beagle/dist/html/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/app-dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //initialize the javascript
        App.init();
        App.dataTables();
        App.dashboard();
    });
</script>