<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">


            <div class="col-md-2 col-sm-6"></div>
            <div class="col-md-8 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <h3>Nova Senha de Acesso</h3>

                        <form class="form" method="post" action="/paciente/mudar_senha/<?=$id;?>">
                            <input class="text" type="password" name="ps_login" placeholder="Nova Senha">
                            <input class="text" type="password" name="ps_confirmar" placeholder="Confirmar Nova Senha">
                            <span class="error">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </span>
                            <input class="submit-btn" type="button" value="Voltar" onClick="history.go(-1)"> &nbsp; <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-6"></div>

        </div>
    </div>
</section><!-- end of about section -->
