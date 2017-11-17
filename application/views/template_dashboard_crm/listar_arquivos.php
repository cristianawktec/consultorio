<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 05/09/2017
 * Time: 19:24
 */

//$this->load->view('layout_principal_crm/header');

?>

<!-- JS dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>

<!-- bootbox code -->
<script src="../../../assets/bootstrap/bootbox/bootbox.min.js"></script>
<script>
    $(document).on("click", ".confirm", function(e) {
        bootbox.confirm("Are you sure?", function(result) {
            Example.show("Confirm result: "+result);
        });
    });

    // ensure modal is only shown on page load
    $(function() {
        // wire up the buttons to dismiss the modal when shown
        $("#myModal").bind("show", function() {
            $("#myModal a.btn").click(function(e) {
                // do something based on which button was clicked
                // we just log the contents of the link element for demo purposes
                console.log("button pressed: "+$(this).html());
                // hide the dialog box
                $("#myModal").modal('hide');
            });
        });

        // remove the event listeners when the dialog is hidden
        $("#myModal").bind("hide", function() {
            // remove event listeners on the buttons
            $("#myModal a.btn").unbind();
        });

        // finally, wire up the actual modal functionality and show the dialog
        $("#myModal").modal({
            "backdrop"  : "static",
            "keyboard"  : true,
            "show"      : true    // this parameter ensures the modal is shown immediately
        });
    });
</script>

<div class="be-wrapper">

    <div class="be-content" style="margin-left: 50px;">
        <div class="page-head">
            <h2 class="page-head-title">Lista de Arquivos</h2>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading ">
                            <p class="xs-mt-10 xs-mb-10">
                                <a href="<?=base_url()?>crm/dashboard/NovoArquivo"  role="button">
                                    <button class="btn btn-space btn-success">Adicionar Arquivo</button>
                                </a>
                            </p>
                            <div class="tools"><span class="icon mdi mdi-download"></span>
                                <span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="table1" class="table table-striped table-hover table-fw-widget">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Paciente</th>
                                    <th>Arquivo</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($registros as $dados) {
                                    //$data2 = explode('-', $dados->arquivo_data);
                                    //$dados->arquivo_data = $data2['2']."/".$data2['1']."/".$data2['0'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $dados->arquivo_data;?></td>
                                        <td><?php echo $dados->nm_paciente;?></td>
                                        <td><?php echo $dados->arquivo_nome;?></td>
                                        <td style="width: 14% !important;">
                                            <a href="<?=base_url()?>crm/dashboard/download_arquivo/<?=$dados->arquivo_paciente_id."/".$dados->arquivo_nome;?>"  title="Abrir">
                                                <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/confirmar.png" style="float: left !important;width: 25%;">
                                            </a>

                                            <a href="#" class="confirm" data-id="<?php echo $dados->arquivo_paciente_id; ?>" data-nome="<?= $dados->arquivo_nome ?>" title="Excluir" />
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
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Confirmação de Exclusão</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Deseja realmente excluir o arquivo: <strong><span id="nome"></span></strong>?</p>
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
                                            $('#nome').text(nome);
                                        });

                                        $('#btn_enviar').click(function(){
                                            var id = $('#modal_confirmation').data('id');
                                            document.location.href = base_url + "index.php/DashboardCrmController/remover_arquivo/"+id;
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