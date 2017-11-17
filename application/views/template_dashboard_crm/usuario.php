<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 31/07/2017
 * Time: 21:15
 */

?>

    <div class="be-content">
            <div class="page-head">
                <h2 class="page-head-title">Usuários</h2>
            </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading ">
                            <p class="xs-mt-10 xs-mb-10">
                                <a href="<?=base_url()?>crm/usuario/novo"  role="button">
                                <button class="btn btn-space btn-success">Adicionar Usuário</button>
                                </a>
                            </p>
                            <div class="tools"><span class="icon mdi mdi-download"></span>
                                <span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="table1" class="table table-striped table-hover table-fw-widget">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Usuário</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($registros as $dados) { ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $dados->nome;?></td>
                                    <td><?php echo $dados->usuario;?></td>
                                    <td style="width: 14% !important;">
                                        <a href="<?=base_url()?>crm/usuario/editar/<?=$dados->id;?>"  title="Editar">
                                            <img class="bone img-responsive" src="<?php echo base_url('assets'); ?>/img/icon/editar.png" style="float: left !important;width: 25%;">
                                        </a>
                                        <a href="#" class="confirm" data-id="<?php echo $dados->id; ?>" data-nome="<?= $dados->nome ?>" title="Excluir" />
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
                                                <p>Deseja realmente excluir o Usuario: <strong><span id="nome"></span></strong>?</p>
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
                                            document.location.href = base_url + "index.php/DashboardCrmController/deletar/"+id;
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
    <nav class="be-right-sidebar">
        <div class="sb-content">
            <div class="tab-navigation">
                <ul role="tablist" class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a></li>
                </ul>
            </div>
            <div class="tab-panel">
                <div class="tab-content">
                    <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                        <div class="chat-contacts">
                            <div class="chat-sections">
                                <div class="be-scroller">
                                    <div class="content">
                                        <h2>Recent</h2>
                                        <div class="contact-list contact-list-recent">
                                            <div class="user"><a href="#"><img src="../../../sites/beagle/dist/html/assets/img/avatar1.png" alt="Avatar">
                                                    <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div></a></div>
                                            <div class="user"><a href="#"><img src="../../../sites/beagle/dist/html/assets/img/avatar2.png" alt="Avatar">
                                                    <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div></a></div>
                                            <div class="user"><a href="#"><img src="../../../sites/beagle/dist/html/assets/img/avatar3.png" alt="Avatar">
                                                    <div class="user-data"><span class="status offline"></span><span class="name">Joel King		</span><span class="message">Ready for the meeti...</span></div></a></div>
                                        </div>
                                        <h2>Contacts</h2>
                                        <div class="contact-list">
                                            <div class="user"><a href="#"><img src="../../../sites/beagle/dist/html/assets/img/avatar4.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div></a></div>
                                            <div class="user"><a href="#"><img src="../../../sites/beagle/dist/html/assets/img/avatar5.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div></a></div>
                                            <div class="user"><a href="#"><img src="../../../sites/beagle/dist/html/assets/img/avatar6.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                            </div>
                        </div>
                        <div class="chat-window">
                            <div class="title">
                                <div class="user"><img src="../../../sites/beagle/dist/html/assets/img/avatar2.png" alt="Avatar">
                                    <h2>Maggie jackson</h2><span>Active 1h ago</span>
                                </div><span class="icon return mdi mdi-chevron-left"></span>
                            </div>
                            <div class="chat-messages">
                                <div class="be-scroller">
                                    <div class="content">
                                        <ul>
                                            <li class="friend">
                                                <div class="msg">Hello</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Hi, how are you?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">Good, I'll need support with my pc</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Sure, just tell me what is going on with your computer?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">I don't know it just turns off suddenly</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input">
                                <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                    <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg mdi mdi-mail-send"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                        <div class="todo-container">
                            <div class="todo-wrapper">
                                <div class="be-scroller">
                                    <div class="todo-content"><span class="category-title">Today</span>
                                        <ul class="todo-list">
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo1" type="checkbox" checked="">
                                                    <label for="todo1">Initialize the project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo2" type="checkbox">
                                                    <label for="todo2">Create the main structure</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo3" type="checkbox">
                                                    <label for="todo3">Updates changes to GitHub</label>
                                                </div>
                                            </li>
                                        </ul><span class="category-title">Tomorrow</span>
                                        <ul class="todo-list">
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo4" type="checkbox">
                                                    <label for="todo4">Initialize the project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo5" type="checkbox">
                                                    <label for="todo5">Create the main structure</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo6" type="checkbox">
                                                    <label for="todo6">Updates changes to GitHub</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo7" type="checkbox">
                                                    <label for="todo7" title="This task is too long to be displayed in a normal space!">This task is too long to be displayed in a normal space!</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Create new task..." name="q"><span class="mdi mdi-plus"></span>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
                        <div class="settings-wrapper">º
                            <div class="be-scroller"><span class="category-title">General</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st1" id="st1"><span>
                            <label for="st1"></label></span>
                                        </div><span class="name">Available</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st2" id="st2"><span>
                            <label for="st2"></label></span>
                                        </div><span class="name">Enable notifications</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st3" id="st3"><span>
                            <label for="st3"></label></span>
                                        </div><span class="name">Login with Facebook</span>
                                    </li>
                                </ul><span class="category-title">Notifications</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st4" id="st4"><span>
                            <label for="st4"></label></span>
                                        </div><span class="name">Email notifications</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st5" id="st5"><span>
                            <label for="st5"></label></span>
                                        </div><span class="name">Project updates</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st6" id="st6"><span>
                            <label for="st6"></label></span>
                                        </div><span class="name">New comments</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st7" id="st7"><span>
                            <label for="st7"></label></span>
                                        </div><span class="name">Chat messages</span>
                                    </li>
                                </ul><span class="category-title">Workflow</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st8" id="st8"><span>
                            <label for="st8"></label></span>
                                        </div><span class="name">Deploy on commit</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


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
