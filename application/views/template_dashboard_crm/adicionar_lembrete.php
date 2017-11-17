<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 04/09/2017
 * Time: 18:28
 */
$idmedico = $this->session->userdata('usuarioCrm')->id;
?>

<div class="be-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <div class="navbar-header"><a href="index.html" class="navbar-brand"></a>
            </div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav navbar-right be-user-nav">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="assets/img/avatar.png" alt="Avatar"><span class="user-name">Túpac Amaru</span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <div class="user-info">
                                    <div class="user-name">Túpac Amaru</div>
                                    <div class="user-position online">Available</div>
                                </div>
                            </li>
                            <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
                            <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
                            <li><a href="#"><span class="icon mdi mdi-power"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="page-title"><span>Adicionar Lembrete</span></div>
                <ul class="nav navbar-nav navbar-right be-icons-nav">
                    <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                        <ul class="dropdown-menu be-notifications">
                            <li>
                                <div class="title">Notifications<span class="badge">3</span></div>
                                <div class="list">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li class="notification notification-unread"><a href="#">
                                                        <div class="image"><img src="../../../sites/beagle/dist/html/assets/img/avatar2.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                                        </div></a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="../../../sites/beagle/dist/html/assets/img/avatar3.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                                        </div></a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="../../../sites/beagle/dist/html/assets/img/avatar4.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                                        </div></a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="../../../sites/beagle/dist/html/assets/img/avatar5.png" alt="Avatar"></div>
                                                        <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                        <ul class="dropdown-menu be-connections">
                            <li>
                                <div class="list">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="../../../sites/beagle/dist/html/assets/img/github.png" alt="Github"><span>GitHub</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="../../../sites/beagle/dist/html/assets/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="../../../sites/beagle/dist/html/assets/img/slack.png" alt="Slack"><span>Slack</span></a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="../../../sites/beagle/dist/html/assets/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="../../../sites/beagle/dist/html/assets/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="../../../sites/beagle/dist/html/assets/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="#">More</a></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="be-content">

        <div class="main-content container-fluid" style="width: 800px;">
            <!--Basic forms-->
            <div class="row">
                <div class="col-sm-12" style="width: 780px;">
                    <div class="panel panel-default panel-border-color panel-border-color-primary" style="width: 450px;">
                        <div class="panel-heading panel-heading-divider">Adicionar Lembrete<span class="panel-subtitle">Adição de Lembrete CRM</span></div>
                        <div class="panel-body">
                            <form id="myForm" name="myForm" class="form" method="post" action="<?=base_url()?>crm/dashboard/AdicionarLembrete/">
                                <input class="text" type="hidden" name="id_medico" value="<?php echo $idmedico; ?>">
                                <div class="be-checkbox inline" style="width: 300px;">
                                    <label>Título</label>
                                    <input type="lembrete_titulo" name="lembrete_titulo" id="lembrete_titulo" placeholder="Entre com Título de Lembrete" class="form-control" style="width: 378px;">
                                </div>

                                <div class="form-group">
                                    <label>Data</label>
                                    <div data-min-view="2" data-date-format="dd/mm/yyyy" class="input-group date datetimepicker" style="width: 250px;">
                                        <input size="16" type="text" name="lembrete_data" id="lembrete_data" value="" class="form-control">
                                                        <span class="input-group-addon btn btn-primary">
                                                            <i class="icon-th mdi mdi-calendar"></i>
                                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-16">
                                        <div class="be-checkbox inline" style="width: 550px;">
                                            <p>
                                                <label>Horario      </label>
                                            </p>
                                            <span style="width: 100px;">
                                                 <input name="lembrete_hora" placeholder="Hora" class="form-contro2" style="width: 120px;"/>:<input name="lembrete_minuto" placeholder="Minutos" class="form-contro2" style="width: 120px;"/>
                                           </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lembrete</label>
                                    <textarea class="form-control"name="lembrete_mensagem" id="lembrete_mensagem" placeholder="Escreva o lembrete" class="form-control" style="width: 378px; height: 108px;"></textarea>
                                </div>
                                <br><br><br>
                                <div class="row xs-pt-15">
                                    <div class="col-xs-6" style="width: 70%;">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-primary">Salvar</button>
                                            <button class="btn btn-space btn-default">Cancelar</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
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
                        <div class="settings-wrapper">
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
</div>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/main.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script src="../../../sites/beagle/dist/html/assets/js/app-form-elements.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.formElements();
    });
</script>
</body>
</html>
