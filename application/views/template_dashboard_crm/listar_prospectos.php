<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 28/08/2017
 * Time: 17:23
 */

//$this->load->view('layout_principal_crm/header');
$this->load->model('Crm_Prospecto_Model');

?>

<div class="be-wrapper">

    <div class="be-content" style="margin-left: 50px;">
        <div class="page-head">
            <h2 class="page-head-title">Lista de Prospectos</h2>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading ">
                            <p class="xs-mt-10 xs-mb-10">
                                <a href="<?=base_url()?>crm/prospecto/baixar"  role="button">
                                    <button class="btn btn-space btn-success">Baixar Arquivo</button>
                                </a>
                            </p>
                            <div class="tools"><span class="icon mdi mdi-download"></span>
                                <span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="table1" class="table table-striped table-hover table-fw-widget">
                                <thead>
                                <tr>
                                    <th>Paciente</th>
                                    <th>Responsável</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Origem</th>
                                    <th>Cadastrado</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($registros as $dados) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $dados->nome;?></td>
                                        <td><?php echo $dados->nm_responsavel;?></td>
                                        <td><?php echo $dados->email;?></td>
                                        <td><?php echo $dados->nr_contato;?></td>
                                        <td><?php echo $dados->fonte;?></td>
                                        <td><?php echo $dados->data_cadastro;?></td>
                                        <td style="width: 14% !important;">
                                            <a href="<?=base_url()?>crm/prospecto/editar/<?=$dados->id;?>"  title="Editar">
                                                <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png" style="float: left !important;width: 25%;">
                                            </a>

                                            <a href="#" class='confirma_exclusao' title="Excluir" data-id="<?= $dados->id ?>" data-nome="<?= $dados->nome ?>" />
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png" style="float: left !important;width: 25%;">
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<!-- model confirmar -->
<div class="modal fade" id="modal_confirmation">
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
            document.location.href = base_url + "index.php/ProspectoCrmController/deletar/"+id;
        });
    });
</script>


<script src="../../../sites/beagle/dist/html/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/main.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/app-tables-datatables.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
    });
</script>
</body>
</html>