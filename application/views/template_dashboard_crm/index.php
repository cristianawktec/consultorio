<?php

$this->load->view('layout_principal_crm/header');

?>

<div class="be-wrapper">
    <div class="be-content" style="margin-left: 24px;">
        <div class="main-content container-fluid" style="padding-left: 25px; padding-top: 0px;">
            <div class="row">

                <!--Modal Alerts-->
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading-divider-color-primary"><p class="text-primary">PACIENTES</p>
                            <span class="panel-subtitle">Escolha uma ação abaixo</span></div>
                        <div class="panel-body">
                            <p>Aqui você pode Listar todos os seus pacientes ou Inserir um novo Paciente.</p>
                            <div class="main-content container-fluid">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="">
                                            <div class="content">
                                                <span class="size">
                                                  <a href="<?=base_url()?>crm/paciente/novo"  role="button">
                                                    <img src="../../../sites/beagle/dist/html/assets/img/user_add_5006.jpg" width="100" height="70" border="0" style="margin-left: 15px;">
                                                  </a>
                                      </span>Cadastrar&nbsp;Pacientes<span class="device"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="">
                                            <div class="content"><span class="size"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="">
                                            <div class="content">
                                                <a href="<?=base_url()?>crm/paciente/listar"  role="button">
                                                    <img src="../../../sites/beagle/dist/html/assets/img/edit_clear_list.png" width="80" height="70" border="0" style="margin-left: 15px;">
                                                </a>
                                                <center><span class="device">&nbsp;Listar&nbsp;Pacientes</span></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Footer-->
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading-divider-color-primary"><p class="text-primary">PROSPECTOS</p>
                            <span class="panel-subtitle">Escolha uma ação abaixo</span></div>
                        <div class="panel-body">
                            <p>Aqui você pode Listar todos os seus prospectos ou Inserir um novo Prospecto.</p>
                            <div class="main-content container-fluid">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="">
                                            <div class="content">
                                                <span class="size">
                                                <a href="<?=base_url()?>crm/prospecto/novo"  role="button">
                                                    <img src="../../../sites/beagle/dist/html/assets/img/user_add_5006.jpg" width="100" height="70" border="0" style="margin-left: 15px;">
                                                </a>
                                                </span>Cadastrar&nbsp;Prospectos<span class="device"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="">
                                            <div class="content"><span class="size"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="">
                                            <div class="content">
                                                <a href="<?=base_url()?>crm/prospecto/listar"  role="button">
                                                    <img src="../../../sites/beagle/dist/html/assets/img/edit_clear_list.png" width="80" height="70" border="0" style="margin-left: 15px;">
                                                </a>
                                                <center><span class="device">&nbsp;Listar&nbsp;Prospectos</span></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="../../../sites/beagle/dist/html/assets/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
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