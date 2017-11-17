<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/27/15
 * Time: 10:39 PM
 */
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">
            <h4>Marcar Consulta</h4>
            <form method="post" action="/consulta/agendar">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <h4>Consulta Marcada com Sucesso!</h4> Você não precisa fazer mais nada. Muito em breve vamos
                        enviar-lhe uma confirmação de sua consulta por e-mail, com esse aviso o processo de
                        consulta é concluido.
                    </div>
                </div>

            </form>

        </div>
    </div>

</section>

<script>

    $('.loginAjax').click(function(){
        var requisicao = 'ajax';
        var urlRetorno = window.location.href;
        var nm_login = $('#nm_login').val();
        var ps_login = $('#ps_login').val();
        $.ajax({
            'url' : "<?php echo site_url('/login/auth')?>",
            'type' : 'POST',
            'data' : 'email='+nm_login+'&ps_login='+ps_login+'&urlRetorno='+urlRetorno+'&requisicao='+requisicao,
            'success' : function(data){
                var result = JSON.parse( data );
                if (result.logado == true){
                    window.location.href = urlRetorno;
                }

            }
        });
    });
</script>

