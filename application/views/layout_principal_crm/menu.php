<?php
/**
 * Created by PhpStorm.
 * User: crist
 * Date: 31/07/2017
 * Time: 17:31
 */
?>


<link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" href="../../../sites/beagle/dist/html/assets/css/style.css" type="text/css"/>
<!--buttons-->
<link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/font-awesome/css/font-awesome.min.css"/>
<!--fim buttons-->

<!--icons-->
<link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../../../sites/beagle/dist/html/assets/lib/select2/css/select2.min.css"/>
<!--fim icons-->

<!-- menus -->
<div class="be-wrapper be-nosidebar-left">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <div class="navbar-header"><a href="index.html" class="navbar-brand"></a>
            </div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav navbar-right be-user-nav">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                            <img src="../../../sites/beagle/dist/html/assets/img/avatar.png" alt="Avatar">
                            <span class="user-name">Usuario CRM</span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <div class="user-info">
                                    <div class="user-name">Usuario</div>
                                    <div class="user-position online">Available</div>
                                </div>
                            </li>
                            <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
                            <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
                            <li><a href="#"><span class="icon mdi mdi-power"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right be-icons-nav">
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

            <a href="#" data-toggle="collapse" data-target="#be-navbar-collapse" class="be-toggle-top-header-menu collapsed">Menus</a>
            <div id="be-navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>crm/dashboard">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/dashboard/usuario">Gerenciar Usuarios</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/dashboard/senha">Alterar Senha</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/paciente/exportar">Exportar Pacientes</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/prospecto/exportar">Exportar Prospectos</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/paciente/aniversariante">Aniversariantes</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/dashboard/lembretes">Lembretes</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/dashboard/bancoArquivos">Banco de Arquivos</a></li>
                    <li><a href="<?php echo base_url(); ?>crm/logout">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--menu sidebar
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title">Menu sidebars</h2>
            <ol class="breadcrumb page-head-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Layouts</a></li>
                <li class="active">No sidebars</li>
            </ol>
        </div>
        <!--conteudo-->
    </div>

</div>
<!-- fim menus -->
