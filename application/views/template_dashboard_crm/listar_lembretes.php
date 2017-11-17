<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 04/09/2017
 * Time: 11:26
 */

//$this->load->view('layout_principal_crm/header');

?>


<div class="be-wrapper">

    <div class="be-content" style="margin-left: 50px;">
        <div class="page-head">
            <h2 class="page-head-title">Lista de Lembretes</h2>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading ">
                            <p class="xs-mt-10 xs-mb-10">
                                <a href="<?=base_url()?>crm/dashboard/NovoLembrete"  role="button">
                                    <button class="btn btn-space btn-success">Adicionar Lembrete</button>
                                </a>
                            </p>
                            <div class="tools"><span class="icon mdi mdi-download"></span>
                                <span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="table1" class="table table-striped table-hover table-fw-widget">
                                <thead>
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Lembrete</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($registros as $dados) {
                                    $data2 = explode('-', $dados->lembrete_data);
                                    $dados->lembrete_data = $data2['2']."/".$data2['1']."/".$data2['0'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $dados->lembrete_data." às ".$dados->lembrete_hora.":".$dados->lembrete_minuto." hs";?></td>
                                        <td><?php echo $dados->lembrete_titulo;?></td>
                                        <td style="width: 14% !important;">
                                            <a href="<?=base_url()?>crm/dashboard/editar_lembrete/<?=$dados->lembrete_id;?>"  title="Editar">
                                                <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png" style="float: left !important;width: 25%;">
                                            </a>
                                            <a href="#" class="confirm" data-id="<?=$dados->lembrete_id; ?>" data-nome="<?=$dados->lembrete_titulo ?>"title="Excluir">
                                                <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/cancelar.png" style="float: left !important;width: 25%;">
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <!-- model confirmar -->
                                <div class="modal fade" id="modal_confirmation">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Confirmação de Exclusão</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Deseja realmente excluir este Lembrete <strong><span id="lembrete"></span></strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
                                                <button type="button" class="btn btn-danger" id="btn_enviar">Sim, Excluir</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.js"></script>
                                <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>

                                <script>

                                    var base_url = "<?= base_url(); ?>";

                                    $(function(){
                                        $('.confirm').on('click', function(e) {
                                            e.preventDefault();

                                            var nome = $(this).data('nome');
                                            var id = $(this).data('id');

                                            $('#modal_confirmation').data('nome', nome);
                                            $('#modal_confirmation').data('id', id);
                                            $('#modal_confirmation').modal('show');
                                        });

                                        $('#modal_confirmation').on('show.bs.modal', function () {
                                            var nome = $(this).data('nome');
                                            $('#lembrete').text(nome);
                                        });

                                        $('#btn_enviar').click(function(){
                                            var id = $('#modal_confirmation').data('id');
                                            document.location.href = base_url + "index.php/DashboardCrmController/deletarLembrete/"+id;
                                        });
                                    });
                                </script>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
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