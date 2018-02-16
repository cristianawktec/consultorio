<style>
    .contact-caption {
        margin-top: 80px !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/jquery.maskedinput.js" type="text/javascript"></script>

<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
<script type="text/javascript">
    $(function() {
        $("#horario")
            .mask("99:99");
    });

</script>
<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">


            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Novo Horário de Atendimento</h3>

                        <form class="form" method="post" action="/agenda/adicionar">
                            <input type="hidden" name="id_medico" value="<?=$this->session->usuario->id_usuario;?>">
                            <input id="horario" name="horario" type="text" tabindex="1" />
                            <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>
                    </div>
                </div>
                <h4>Preencha seus Horários disponíveis para Atendimento!</h4>
            </div>
            <div class="col-md-2 col-sm-6"></div>

        </div>
    </div>
</section><!-- end of about section -->
