
<!-- about section -->
<section class="about " id="about">
    <div class="main-content container-fluid" >
        <!--beagle -->
        <div class="be-wrapper">
            <div class="be-content" style="margin-left: 24px;">
                <div class="main-content container-fluid" style="padding-left: 70px; padding-top: 70px;">
                    <!--Tabs-->
                    <div class="row">
                        <!--Success Tabs-->
                        <div class="panel panel-body">

                            <div class="tab-container">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home5" data-toggle="tab"><span class="icon mdi mdi-home"></span>Home</a></li>
                                    <li><a href="#meusdados" data-toggle="tab"><span class="icon mdi mdi-face"></span>Meus Dados</a></li>
                                    <li><a href="#endereco" data-toggle="tab"><span class="icon mdi mdi-city"></span>Meu Endereço</a></li>
                                </ul>
                                <div class="tab-content" style="padding-left: 0px; padding-top: 0px;">
                                    <div id="home5" class="tab-pane active cont">
                                        <h2 style="margin-bottom: 0px; font-size: 32px; padding-top: 10px;">Minhas Consultas</h2>
                                        <!-- Tab Home-->
                                        <div class="panel-heading" style="padding-left: 0px; margin-left: 0px;">
                                            <p class="xs-mt-10 xs-mb-10">
                                                <a href="<?=base_url()?>/consulta/nova"  role="button">
                                                    <button class="btn btn-space btn-success">Nova Consulta</button>
                                                </a>
                                            </p>
                                            <div class="tools"><span class="icon mdi mdi-download"></span>
                                                <span class="icon mdi mdi-more-vert"></span></div>
                                        </div>
                                        <!-- tab home-->
                                        <div class="panel-body">
                                            <table id="table1" class="table table-striped table-hover table-fw-widget">
                                                <thead>
                                                <tr>
                                                    <th>Número da Consulta</th>
                                                    <th>Consulta</th>
                                                    <th>Médico</th>
                                                    <th>Avaliar Médico</th>
                                                    <th>Confirmado</th>
                                                    <th>Data Início</th>
                                                    <th>Estado</th>
                                                    <th>Ação</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($consultas as $consulta){ ?>
                                                    <tr>
                                                        <td><?php echo $consulta->id_consulta ?></td>
                                                        <td><?php echo $consulta->nm_consulta ?></td>
                                                        <td><?php echo $consulta->nm_medico ?></td>
                                                        <td>
                                                            <?php
                                                            $this->db->where('id_consulta',$consulta->id_consulta);$txt = $this->db->get('consulta_medico_avaliacao')->result();
                                                            if ($txt){
                                                                echo "Nota: " . $txt[0]->nota;
                                                            } else {
                                                            ?>
                                                            <a href="" onclick="avaliar('<?=$consulta->id_consulta;?>','<?=$consulta->id_medico;?>')" data-modal="md-avaliacao" class="md-trigger">Avaliar</a>
                                                        </td>
                                                        <?php } ?>
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
                                                        <td><?php echo date('d/m/Y', strtotime($consulta->dt_consulta)); ?></td>
                                                        <td><?php
                                                            if($consulta->ch_confirmacao == 1){
                                                                echo "Confirmado";
                                                            } elseif($consulta->ch_confirmacao == 2){
                                                                echo "Cancelado";
                                                            } elseif($consulta->ch_confirmacao == 3){
                                                                echo "Nova Consulta";
                                                            } elseif($consulta->ch_confirmacao == 4){
                                                                echo "Consulta Remarcada";
                                                            }
                                                            ?></td>
                                                        <td align="left" style="width: 15% !important;">
                                                            <?php if($consulta->ch_confirmacao == 4){ ?>
                                                                <span style="cursor: pointer"
                                                                      data-toggle="tooltip"
                                                                      onclick="confirmConsult('<?php echo $consulta->id_consulta ?>','<?php echo $consulta->id_usuario; ?>')"
                                                                      data-placement="top"
                                                                      title="Confirmar Consulta"
                                                                      aria-hidden="true">
                                                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/confirmar.png" style="float: left !important;width: 15%;">
                                                                        </span>
                                                            <? } ?>
                                                            <span style="cursor: pointer" data-toggle="tooltip"
                                                                  data-placement="top"
                                                                  onclick="novaConsult('<?php echo '1' ?>','<?=$consulta->id_medico;?>')"
                                                                  title="Marcar Nova Consulta com este Médico"
                                                                  aria-hidden="true">
                                                                  <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/agenda.png" style="float: left !important;width: 15%;">
                                                             </span>

                                                            <span style="cursor: pointer" data-toggle="tooltip"
                                                                  data-placement="top"
                                                                  onclick="cancelConsult('<?php echo $consulta->id_consulta ?>','<?=$consulta->id_paciente;?>')"
                                                                  title="Cancelar Consulta"
                                                                  aria-hidden="true">
                                                                  <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png" style="float: left !important;width: 15%;">
                                                             </span>

                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                <!-- model confirmar -->
                                                <div class="modal fade2" id="modal_confirmation">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Confirmação de Exclusão</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
                                                                <button type="button" class="btn btn-danger" id="btn_excluir">Sim. Excluir</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                                <script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
                                                <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>

                                                <script>

                                                    var base_url = "<?= base_url(); ?>";

                                                    $(function(){
                                                        $('.confirma_exclusao').on('click', function(e) {
                                                            e.preventDefault();

                                                            var nome = $(this).data('nome');
                                                            var id = $(this).data('id');

                                                            $('#modal_confirmation').data('nome', nome);
                                                            $('#modal_confirmation').data('id', id);
                                                            $('#modal_confirmation').modal('show');
                                                        });

                                                        $('#modal_confirmation').on('show.bs.modal', function () {
                                                            var nome = $(this).data('nome');
                                                            $('#nome_exclusao').text(nome);
                                                        });

                                                        $('#btn_excluir').click(function(){
                                                            var id = $('#modal_confirmation').data('id');
                                                            document.location.href = base_url + "index.php/PacienteCrmController/deletar/"+id;
                                                        });
                                                    });
                                                </script>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end tab home-->
                                    </div>
                                    <div id="meusdados" class="tab-pane cont">
                                        <!-- meus dados -->
                                        <div class="be-content" style="margin-left: 24px;">
                                            <div class="page-head" style="padding-left: 0px;">
                                                <h2 style="margin-bottom: 0px; font-size: 32px;">Meus Dados</h2>
                                            </div>
                                            <div class="main-content container-fluid" style="padding-left: 10px;padding-top: 0px;padding-right: 70px;">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-left: 0px;">
                                                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table id="user" style="clear: both" class="table table-striped table-borderless">
                                                                        <tbody>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <tr>
                                                                        <td width="15%">Nome:</td>
                                                                        <td width="65%"><?php echo $paciente[0]->nm_paciente; ?>
                                                                            <a id="username" href="#" data-type="text" data-title="Enter username"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sexo: </td>
                                                                        <td><? if($paciente[0]->ch_sexo=='M'){echo"Masculino";}else{echo"Feminino";} ?>
                                                                            <a id="sex" data-title="Select sex" data-value="" data-pk="1" data-type="select" href="#" style="color: gray;" class="editable editable-click"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>E-mail: </td>
                                                                        <td><?=$paciente[0]->email; ?>
                                                                            <a id="firstname" data-title="Enter your firstname" data-placement="right" data-pk="1" data-type="text" href="#" class="editable editable-click editable-empty"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Data de Nascimento: </td>
                                                                        <td><?=$paciente[0]->dt_nascimento; ?>
                                                                            <a id="firstname" data-title="Enter your firstname" data-placement="right" data-pk="1" data-type="text" href="#" class="editable editable-click editable-empty"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>CPF:</td>
                                                                        <td><?php echo $paciente[0]->nr_cpf; ?>
                                                                            <a id="firstname" data-title="Enter your firstname" data-placement="right" data-pk="1" data-type="text" href="#" class="editable editable-click editable-empty"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>RG:</td>
                                                                        <td><?php echo $paciente[0]->nr_rg; ?>
                                                                            <a id="sex" data-title="Select sex" data-value="" data-pk="1" data-type="select" href="#" style="color: gray;" class="editable editable-click"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Estado Civil: </td>
                                                                        <td><?=$paciente[0]->ds_estado_civil; ?>
                                                                            <a id="firstname" data-title="Enter your firstname" data-placement="right" data-pk="1" data-type="text" href="#" class="editable editable-click editable-empty"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nome do Pai:</td>
                                                                        <td><?php echo $paciente[0]->nm_pai; ?>
                                                                            <a id="group" data-title="Select group" data-value="1" data-pk="1" data-type="select" href="#" class="editable editable-click"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nome da Mãe:</td>
                                                                        <td><?php echo $paciente[0]->nm_mae; ?>
                                                                            <a id="status" data-title="Select status" data-source="/status" data-value="0" data-pk="1" data-type="select" href="#" class="editable editable-click"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>LOGIN:</td>
                                                                        <td><?php echo $paciente[0]->nm_login; ?>
                                                                            <a id="dob" href="#" data-title="Select Date of birth" data-pk="1" data-template="D / MMM / YYYY" data-viewformat="DD/MM/YYYY" data-format="YYYY-MM-DD" data-value="1984-05-15" data-type="combodate" class="editable editable-click"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Senha: </td>
                                                                        <td>
                                                                            <a data-title="Alterar Senha" href="/paciente/atualiza_senha/<?=$paciente[0]->id_usuario; ?>" class="editable editable-click editable-empty">******</a>
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fim meus dados -->
                                    </div>

                                    <div id="endereco" class="tab-pane cont">
                                    <!-- meus endereco -->
                                    <div class="be-content" style="margin-left: 24px;">
                                        <div class="page-head" style="padding-left: 0px;">
                                            <h2 style="margin-bottom: 0px; font-size: 32px;">Meu Endereço</h2>
                                        </div>
                                        <div class="main-content container-fluid" style="padding-left: 10px;padding-top: 0px;padding-right: 70px;">
                                            <div class="row">
                                                <div class="col-md-12" style="padding-left: 0px;">
                                                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                                                        <table class="tableConsulta">
                                                            <tr>
                                                                <th>#CEP</th>
                                                                <th>Rua</th>
                                                                <th>Bairro</th>
                                                                <th>Cidade</th>
                                                                <th>Estado</th>
                                                                <th>Complemento</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                            <?php foreach($endereços as $endereco) { ?>
                                                                <tr>
                                                                    <td><?php echo $endereco->nr_cep; ?></td>
                                                                    <td><?php echo $endereco->nm_endereco; ?></td>
                                                                    <td><?php echo $endereco->nm_bairro; ?></td>
                                                                    <td><?php echo $endereco->nm_cidade; ?></td>
                                                                    <td><?php echo $endereco->nm_estado; ?></td>
                                                                    <td><?php echo $endereco->ds_observacao; ?></td>
                                                                    <td align="left" style="width: 15% !important;">
                                                                        <a title="Editar endereço" href="/paciente/endereco-editar/<?= $endereco->id_endereco; ?>">
                                                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png" style="float: center !important;width: 20%;"></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim meu endereco -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>

        </div>

    <!-- x-editable -->

    <script src="../../../sites/beagle/dist/html/assets/lib/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/js/app-form-editable.js" type="text/javascript"></script>
    <!-- fim x-editable -->

        <!-- tables database-->
    <script src="../../../sites/beagle/dist/html/assets/js/main.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
    <script src="../../../sites/beagle/dist/html/assets/js/app-tables-datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascript
            App.init();
            App.dataTables();
            App.formEditable();//x-editable
        });
    </script>
        <!-- end beagle-->
    </div>
</section>

<!-- Nifty Modal-->
<div id="md-avaliacao" class="modal-container modal-effect-6" style="perspective: none;padding-top: 56px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="mdi mdi-close"></span></button>
        </div>
        <div class="modal-body2" >
            <div class="text-center" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Dê uma Nota de 1 à 5 ao Médico</h4>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/paciente/avalia_medico" enctype="multipart/form-data">
                            <input type="hidden" name="id_medico" id="id_medico" value="">
                            <input type="hidden" name="id_consulta" id="id_consulta" value="">
                                <button type="submit" class="btn btn-primary" name="nota" value="1"> 1</button>
                                <button type="submit" class="btn btn-primary" name="nota" value="2"> 2</button>
                                <button type="submit" class="btn btn-primary" name="nota" value="3"> 3</button>
                                <button type="submit" class="btn btn-primary" name="nota" value="4"> 4</button>
                                <button type="submit" class="btn btn-primary" name="nota" value="5"> 5</button>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"></div>
</div>
<!-- Nifty Modal-->
<script>

    function avaliar(id_consulta, id_medico){
        $('#id_medico').val(id_medico);
        $('#id_consulta').val(id_consulta);
    }

    function cancelConsult(id, id_paciente){
        window.location.href = "<?php echo site_url('/consulta/cancelar') ?>/"+id+"/"+id_paciente;
    }

    function novaConsult(id, id_medico){
        window.location.href = "<?php echo base_url(); ?>consulta/marcar?agenda="+id+"&doctor="+id_medico;
        //window.location.href = "<?php echo site_url('/consulta/marcar') ?>/"+id+"/"+id_paciente;
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
</script>
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