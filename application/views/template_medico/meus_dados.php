<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/27/15
 * Time: 10:38 PM
 */
//echo"<pre>";print_r($GLOBALS);echo"</pre>";
?>


<style>
    .contact-caption {
        margin-top: 0px !important;
    }
    .ondestar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png")  ;
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 68px;
    }
    .twostar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 55px;;
    }
    .threestar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 41px;;
    }
    .fourstar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 27px;;
    }
    .fivestar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 14px;;
    }
    .label-info-red {
        background-color: #CE575C;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4><?php echo $medico[0]->nm_medico; ?> <!--<a href="/login/logout"><span class="btn btn-primary btnSession">Fechar Sessão</span></a>--> </h4>

            <div class="col-md-12 col-sm-6 dados">
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
                <div>
                    <?php if($this->session->flashdata('mesage')) { ?>
                        <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('mesage'); ?></div>
                    <?php } ?>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="begin">
                            <div class="col-md-12 col-sm-6">
                            </div>

                            <div class="col-md-4" style="margin-bottom: 5px;">
                            <div class="boxTitle"><img style="width: 8%;" src="<?php echo base_url('assets')?>/img/icon/financeiro.png" />Pendencias</div>
                                <div class="boxContent">

                                    <?php
                                    //echo"pgto: <pre>";print_r($pagamentos2);echo"</pre>";
                                    if(count($pagamentos) == 0) { ?>
                                            Mensalidade em aberto <a href='/pagamento/medico/<?=$this->session->usuario->id_usuario;?>'>clique aqui</a>
                                    <?php
                                    } else {
                                        echo "Nenhuma pendencia! <br />";
                                        $atual = date('Y-m');
                                        $data = $pagamentos[0]->dt_pagamento;
                                        $data = date('Y-m', strtotime("+1 month", strtotime($data)));
                                        echo "Proxima Mensalidade: 10/" . date('m/Y', strtotime($data));
                                        if(count($pagamentos) == 1) {
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
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 5px;">
                                <div class="boxTitle"><img style="width: 6%;" src="<?php echo base_url('assets')?>/img/icon/agenda.png" />Agenda do Dia</div>
                                <div class="boxContent">
                                    <?php
                                    if(count($agendaDia) > 0){
                                        foreach($agendaDia as $agenda){
                                            echo date('d/m/Y H:i:s', strtotime($agenda->data_inicio)) . " : " . $agenda->descricao . "<br />";
                                        }
                                    } else {
                                        echo "Não há atendimentos agendados para hoje.";
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 5px;">
                                <div class="boxTitle"><img style="width: 8%;" src="<?php echo base_url('assets')?>/img/icon/busca.png" />Buscar Paciente</div>
                                <div class="boxContent">
                                    <form method="post" action="/pesquisar">
                                        <label>Nome do Paciente</label><br>
                                        <input type="text" name="nm_paciente" placeholder="Nome do Paciente"><br>
                                        <label>CPF do Paciente</label><br>
                                        <input type="text" name="nr_cpf" placeholder="Cpf do Paciente"><br>
                                        <button type="submit">Buscar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 5px;">
                                <div class="boxTitle"><img style="width: 8%;" src="<?php echo base_url('assets')?>/img/icon/ajuda.png" />Ajuda</div>
                                <div class="boxContent">
                                    <ul style="margin-left: -42px !important;">
                                        <li>>> Como começar</li>
                                        <li>>> Agendamento pela clínica</li>
                                        <li>>> Comparação de imagens</li>
                                        <li>>> Configuração de Horários</li>
                                        <li>>> Planos de contas</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-bottom: 5px;">
                                <div class="boxTitle"><img style="width: 10%;" src="<?php echo base_url('assets')?>/img/icon/news.png" />Noticias</div>
                                <div class="">
                                    <ul class="list-group">
                                        <?php foreach($noticias as $noticia){ ?>
                                            <li class="list-group-item"><span class="label label-info">NOVO</span> <?= date('d/m/Y H:i:s', strtotime($noticia->data)); ?> <?= $noticia->titulo; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div  id="mensalidade">
                            <div class="col-md-12" style="margin-bottom: 5px;">
                                <div class="boxTitle"><img style="width: 5%;" src="<?php echo base_url('assets')?>/img/icon/financeiro.png" />
                                    <span style="font-size: 24px;">Mensalidades</span>
                                </div>
                                <div class="">
                                    <ul class="list-group">
                                        <?php
                                        $atual = date('Y-m');
                                        $data = date('Y-m', strtotime("+0 month", strtotime($atual)));
                                        if(count($pagamentos) == 0) { ?>
                                            <li class="list-group-item">
                                                <span class="label label-info-red">PAGAR</span>
                                                <a href='/pagamento/medico/<?= $this->session->usuario->id_usuario; ?>'>
                                                    Proxima Mensalidade: 10/<?= date('m/Y', strtotime($data)); ?> [
                                                    Pagar ] </a>
                                            </li>
                                            <?
                                        }
                                        foreach($pagamentos2 as $pag){
                                            ?>
                                            <li class="list-group-item">
                                                <span class="label label-info">PAGO</span>
                                                <?= date('d/m/Y', strtotime($pag->dt_pagamento)); ?> - Valor de: R$ <?= $pag->vl_pagamento; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div  id="home">
                            <div class="col-md-12 ">
                                <div class="" style="float: left !important; text-align: center;/* position: absolute; */left: 76%;">
                                    <?php if(!$medico[0]->imagem) { ?>
                                    <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                         alt="140x140"
                                         <?php if ($medico[0]->ch_sexo == "M"){ ?>
                                            src="<?php echo base_url('assets'); ?>/img/medico_default.jpg" data-holder-rendered="true"
                                         <? } else { ?>
                                             src="<?php echo base_url('assets'); ?>/img/medica_default.jpg" data-holder-rendered="true"
                                         <? } ?>
                                         style="width: 279px;">
                                    <? } else { ?>
                                        <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                             alt="140x140"
                                             src="<?php echo base_url('assets'); ?>/img/archive/doctor/img/<?php echo $medico[0]->id_usuario ?>/<?php echo $medico[0]->imagem ?>" data-holder-rendered="true"
                                             style="width: 279px;">
                                    <? } ?>
                                    <br />
                                    <a href="" data-toggle="modal" data-target="#exampleModal">Editar Foto</a>
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
                                            <a href="/medico/atualiza_senha/<?=$medico[0]->id_usuario; ?>">Editar Senha</a>
                                        </li>
                                        <li>
                                            <label><strong>Página Web: </strong></label>
                                            <?php if($medico[0]->pagina_web == ""){
                                                echo "Site não informado!";
                                            } else { ?>
                                                <a  href="<?echo $medico[0]->pagina_web;?>" ><?echo $medico[0]->pagina_web;?></a><?
                                            }?>
                                        </li>
                                        <li></li>
                                    </ul>
                                    <a class="btn btn-primary" href="/medico/atualiza_dados/<?=$medico[0]->id_usuario; ?>" >Atualizar dados</a>


                                </div>

                                <div class="form-group col-md-12 perfilMedico">
                                    <label for="exampleInputName2">Especialidades</label>
                                    <ul class="list-inline especializacao">
                                        <li style="background-color: #fff !important;">
                                            <button  data-toggle="modal" data-target="#exampleModal2" type="button" class="btn btn-primary">
                                                Nova Especialidade
                                            </button>
                                        </li>
                                        <?php foreach($especialidades as $especialidade){ ?>
                                            <li><?php echo $especialidade->nm_especializacao; ?>
                                                <button style="padding: 1px 7px !important; "
                                                        onclick="removeSpecialty('<?php echo $especialidade->id_especializacao; ?>', '<?php echo $medico[0]->id_usuario?>')"
                                                        title="Remover Especialidade" class="btn btn-danger">X</button>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6 dados">
                                <h4>Meu Endereço</h4>
                                <table class="tableConsulta">
                                    <tr>
                                        <th>#CEP</th>
                                        <th>Rua</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th>Ações</th>

                                    </tr>
                                    <?php foreach($endereços as $endereco) { ?>
                                        <tr>
                                            <td><?php echo $endereco->nr_cep; ?></td>
                                            <td><?php echo $endereco->nm_endereco; ?></td>
                                            <td><?php echo $endereco->nm_bairro; ?></td>
                                            <td><?php echo $endereco->nm_cidade; ?></td>
                                            <td><?php echo $endereco->nm_estado; ?></td>
                                            <td align="left" style="    width: 97px;">
                                                <a title="Editar endereço" href="/medico/endereco-editar/<?= $endereco->id_endereco; ?>">
                                                    <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png"
                                                          style="float: left !important;width: 37%;"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div id="profile">
                            <div class="col-md-12 col-sm-6">
                                <h4>Dados do Consultório</h4>
                                <div class="form-group col-md-4">
                                  <label><strong>Endereço: </strong></label>
                                   <?php echo " ".$endereços[0]->nm_endereco ?>, <?php echo $endereços[0]->nm_bairro ?>
                                     - <?php echo $endereços[0]->nm_cidade ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group col-md-4" >
                                    <label><strong>CEP: </strong></label>
                                    <?php echo " ".$endereços[0]->nr_cep ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group col-md-4">
                                    <label><strong>Localização: </strong></label>
                                    <?php echo $endereços[0]->nm_estado ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6" >
                                <div class="form-group col-md-4">
                                    <label><strong>Telefone: </strong></label>
                                    <?php echo $medico[0]->telefone; ?>
                                </div>
                            </div>
                            <? //echo"<pre>";print_r($medico);echo"</pre>";?>

                            <a class="btn btn-primary" href="/medico/endereco-editar/<?= $endereco->id_endereco; ?>" >Atualizar dados</a>

                        </div>
                        <div  id="messages">
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
                        <div  id="acaliation">
                            <div class="form-group col-md-12 filter">
                                <h4>Avaliações realizadas pelos Pacientes</h4><br>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Data</th>
                                        <th>Paciente</th>
                                        <th>Nota</th>
                                    </tr>
                                    <?php foreach($notas as $nota){ ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y H:i:s', strtotime($nota->data_cadastro));?></td>
                                            <td><?php echo $nota->nm_paciente;?></td>
                                            <td>
                                                <?php
                                                if ($nota->nota == 5){
                                                    echo '<div class="fivestar"></div>';
                                                } elseif ($nota->nota == 1){
                                                    echo '<div class="ondestar"></div>';
                                                } elseif ($nota->nota == 2){
                                                    echo '<div class="twostar"></div>';
                                                } elseif ($nota->nota == 3){
                                                    echo '<div class="threestar"></div>';
                                                } elseif ($nota->nota == 4){
                                                    echo '<div class="fourstar"></div>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div id="reports">
                            <div class="row">
                                <a href="/relatorio/pacientes">
                                    <div class="col-md-1 iconReport">
                                        <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/paciente.png" style="float: left !important;width: 95%;">Pacientes</a>
                                    </div>
                                </a>
                                <a href="/relatorio/consultas_confirmadas">
                                    <div class="col-md-1 iconReport">
                                        <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/confirmar.png" style="float: left !important;width: 75%;">Consultas Confirmadas</a>
                                    </div>
                                </a>
                                <a href="/relatorio/consultas_canceladas">
                                    <div class="col-md-1 iconReport">
                                        <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png" style="float: left !important;width: 75%;">Consultas Canceladas</a>
                                    </div>
                                </a>
                                <a href="/relatorio/financeiro">
                                    <div class="col-md-1 iconReport">
                                        <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/financeiro.png" style="float: left !important;width: 95%;">Financeiro</a>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div id="settings">
                            <table class="table table-hover">
                                <tr>
                                    <th>Registrador por</th>
                                    <th>Data da Consulta</th>
                                    <th>Confirmada</th>
                                    <th>Paciente</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                                <?php foreach($consultas as $consulta) { ?>
                                <tr>
                                    <td><?php echo $consulta->nm_paciente ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($consulta->dt_consulta)) . " " . $consulta->hr_inicio ?></td>
                                    <td>
                                        <?php
                                        if($consulta->ch_confirmacao == 1){
                                            echo date('d/m/Y H:i:s', strtotime($consulta->dt_confirmacao));
                                        } elseif($consulta->ch_confirmacao == 2){
                                            echo "Cancelado";
                                        } elseif($consulta->ch_confirmacao == 4){
                                            echo date('d/m/Y H:i:s', strtotime($consulta->dt_confirmacao));
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $consulta->nm_paciente ?></td>
                                    <td>
                                        <?php
                                        if($consulta->ch_confirmacao == 1){
                                            echo "Confirmado";
                                        } elseif($consulta->ch_confirmacao == 2){
                                            echo "Cancelado";
                                        } elseif($consulta->ch_confirmacao == 3){
                                            echo "Nova Consulta";
                                        } elseif($consulta->ch_confirmacao == 4){
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
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/confirmar.png" style="float: left !important;width: 15%;"></a>
                                        </span>
                                        <span style="cursor: pointer" data-toggle="tooltip"
                                              data-placement="top"
                                              onclick="chageDate('<?php echo $consulta->id_consulta ?>')"
                                              title="Informar outra data"
                                              aria-hidden="true">
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png" style="float: left !important;width: 15%;"></a>
                                        </span>
                                        <span style="cursor: pointer" data-toggle="tooltip"
                                              data-placement="top"
                                              onclick="cancelConsult('<?php echo $consulta->id_consulta ?>','<?=$consulta->id_paciente;?>')"
                                              title="Cancelar Consulta"
                                              aria-hidden="true">
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png" style="float: left !important;width: 15%;"></a>
                                        </span>
                                        <span style="cursor: pointer"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              onclick="histConsulta('<?php echo $consulta->id_paciente ?>');"
                                              title="Historico de Consultas"
                                              aria-hidden="true">
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/relatorio.png" style="float: left !important;width: 15%;"></a>
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div id="callendar">
                            <h4>Minha Agenda de Atendimento</h4>
                            <p><a href="/agenda/novo">Novo Horário</a></p>
                            <table class="table table-hover">
                                <tr>
                                    <th>#ID</th>
                                    <th>HORARIO</th>
                                    <th>Ações</th>
                                </tr>
                                <?php foreach($agenda as $age) { ?>
                                <tr>
                                    <td><?php echo $age->id_agenda;?></td>
                                    <td><?php echo $age->horario;?></td>
                                    <td style="width: 14% !important;">
                                        <a href="/agenda/editar/<?=$age->id_agenda;?>"  title="Editar">
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png" style="float: left !important;width: 15%;">
                                        </a>

                                        <a href="/agenda/remover/<?=$age->id_agenda?>"  title="Excluir">
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png" style="float: left !important;width: 15%;">
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Aplicar Nova Foto</h4>
            </div>
            <form method="post" action="/medico/atualiza_foto" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario" value="<?php echo $medico[0]->id_usuario; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Nova Imagem:</label>
                    <input type="file" class="form-control" name="image"  id="image">
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

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModal2Label">Adicionar Novas Especialidade</h4>
            </div>
            <form method="post" action="/medico/nova_especialidade" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario" value="<?php echo $medico[0]->id_usuario; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nova Especialidade:</label>
                        <select name="id_especializacao" class="email" required>
                            <option value="">Selecione sua Especialização</option>
                            <?php
                            foreach($especializacoes as $esp){
                                ?>
                                <option value="<?php echo $esp->id_especializacao; ?>"><?php echo $esp->nm_especializacao; ?></option>
                            <?php } ?>
                        </select>
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

<link href='<?php echo base_url('assets')?>/js/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url('assets')?>/js/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url('assets')?>/js/fullcalendar/lib/moment.min.js'></script>

<script src='<?php echo base_url('assets')?>/js/fullcalendar/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {

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
            eventDrop: function(event, delta, revertFunc) {
                var dateFirstEvent = event.start.format();
                console.log( event.end.format());
                var dateEndEvent   = event.end.format();

                var id = event.id;
                changeDate(dateFirstEvent,dateEndEvent,id);
            },
            eventClick: function(calEvent, jsEvent, view) {
                $('#calendar').fullCalendar('removeEvents', function (event) {
                    var id = calEvent.id;
                    var url = window.location.href;

                    window.location.href = "<?php echo site_url('/consulta/editar/')?>/" + id;
                });
            },

        });

    });

    function changeDate(dateFirstEvent,dateEndEvent,id){
        $.ajax({
            url: "<?php echo site_url('/consulta/mudar_dia_consulta')?>",
            type: "POST",
            data: "data="+dateFirstEvent+"&data2="+dateEndEvent+"&id="+id+"",
            //dataType: "html",
            success: function(data){
                alert("Data atualizada com sucesso!");
            },
        });
    }



</script>
<script>
    function GetQueryString(a)
    {
        a = a || window.location.search.substr(1).split('&').concat(window.location.hash.substr(1).split("&"));

        if (typeof a === "string")
            a = a.split("#").join("&").split("&");

        // se não há valores, retorna um objeto vazio
        if (!a) return {};

        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
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

    // uso
    var qs = GetQueryString();
    console.log(qs);
    if (qs.profile == 'i'){
        $('#begin').show();
        $('#profile').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 'p'){
        $('#profile').show();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    }else if (qs.profile == 'h'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').show();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 'm'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').show();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 's'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').show();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 'r'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').show();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 'a'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').show();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 'c'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').show();
        $('#mensalidade').hide();
    } else if (qs.profile == 'i'){
        $('#profile').hide();
        $('#begin').show();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    } else if (qs.profile == 'f'){
        $('#profile').hide();
        $('#begin').hide();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').show();
    } else {
        $('#profile').hide();
        $('#begin').show();
        $('#home').hide();
        $('#messages').hide();
        $('#settings').hide();
        $('#reports').hide();
        $('#acaliation').hide();
        $('#callendar').hide();
        $('#mensalidade').hide();
    }

    function confirmConsult(id, id_paciente){
        $.ajax({
            'url' : "<?php echo site_url('/consulta/confirmar')?>",
            'type' : 'POST',
            'data' : 'id_consulta='+id+"&id_paciente="+id_paciente,
            'success' : function(data){
                alert("Consulta confirmada com sucesso!");
                window.location.reload();
            }
        });
    }

    function chageDate(id){
        window.location.href = "<?php echo site_url('/consulta/mudarData') ?>/"+id;
    }

    function histConsulta(id){
        window.location.href = "<?php echo site_url('/consulta/paciente') ?>/"+id
    }

    function cancelConsult(id, id_paciente){
        window.location.href = "<?php echo site_url('/consulta/cancelar') ?>/"+id+"/"+id_paciente;
    }

    function removeSpecialty(id_especializacao, id_medico){
        $.ajax({
            'url' : "<?php echo site_url('/medico/removeSpecialty')?>",
            'type' : 'POST',
            'data' : 'id_especializacao='+id_especializacao+"&id_medico="+id_medico,
            'success' : function(data){
                alert("Removido especialização com sucesso!");
                window.location.reload();
            }
        });
    }

</script>
