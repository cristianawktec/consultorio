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
<script>
    function mydate()
    {
        //alert("");
        document.getElementById("dt").hidden=false;
        document.getElementById("data").hidden=true;
    }
    function mydate1()
    {
        d=new Date(document.getElementById("dt").value);
        dt=d.getDate();
        mn=d.getMonth();
        mn++;
        yy=d.getFullYear();
        document.getElementById("data").value=dt+"/"+mn+"/"+yy
        document.getElementById("data").hidden=false;
        document.getElementById("dt").hidden=true;
    }
</script>

<!-- about section -->
<section class="about " id="about">
    <?php
        $limite = "";
        //echo"<pre>view";print_r($GLOBALS);echo"</pre>";exit;
        @$num_pacientes = $numPacientes['0'];
        @$npacientes = $num_pacientes->num_paciente;

        @$num_consultas = $consultas['0'];
        @$consultas = $num_consultas->consultas;

        if (($consultas > '15')OR($npacientes > '10')){
            if($consultas > '15'){$limite="Consultas";}
            if($npacientes > '10'){$limite="Cadastros";}
            ?>
        <div class="container">
		<div class="row">
			<div class="team-heading text-center" style="margin-top: 200px">
                <font size="30" color="#42b3e5" >Este Médico excedeu o Limite de <?php echo $limite; ?> neste Mês!</font>
			</div>
			<!--Modal Alerts-->
			<div class="be-content">
				<div class="main-content container-fluid">
					<div class="row">
						<!--Nifty Modals Effects-->
						<div class="col-sm-6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-left: 150px;">
							<div class="panel panel-default">
								<div class="panel-body">
									<h4>Avise este Médico para agendar uma nova consulta!</h4>
									<div class="xs-mt-30 xs-mb-20 text-center">
										<a href="/medico/perfil/<?php echo $agenda[0]->id_medico; ?>" class="btn btn-space btn-success md-trigger" role="button" aria-pressed="true">Avisar!</a>
									</div>

									<div class="modal-overlay"></div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
    <?php
        }else{
    ?>
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

        <h4>Marcar Consulta</h4>
        <?php if($this->session->usuario){ ?><form method="post" action="/consulta/agendar"><?php } ?>
                <div class="col-md-6 col-sm-6">
                    <div class="titleMarca">
                        <?
                            $hoje = date('d/m/Y');
                        ?>
                        <input type="hidden" name="horario" value="<?php echo @$agenda[0]->horario; ?>">
                        Dia <input type="date" id="dt" onchange="mydate1();" hidden/>
                        <input type="text" id="data" name="data"  onclick="mydate();" title="Escolha uma data" <?php if(@$this->session->usuario){ ?> required="required" <?php } ?>> as <?php echo @$agenda[0]->horario; ?> horas
                    </div>
                    <div style="padding-top: 3%;">
                        <div class="col-md-4 col-sm-4">
                            <?php if(!$medico[0]->imagem) { ?>
                                <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                     alt="140x140" style="width: 170px; height: 140px;"
                                    <?php if ($medico[0]->ch_sexo == "M"){ ?>
                                        src="<?php echo base_url('assets'); ?>/img/medico_default.jpg" data-holder-rendered="true"
                                    <? } else { ?>
                                        src="<?php echo base_url('assets'); ?>/img/medica_default.jpg" data-holder-rendered="true"
                                    <? } ?>
                                     style="width: 279px;">
                            <? } else { ?>
                                <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                     alt="140x140" style="width: 170px; height: 140px;"
                                     src="<?php echo base_url('assets'); ?>/img/archive/doctor/img/<?php echo $medico[0]->id_usuario ?>/<?php echo $medico[0]->imagem ?>" data-holder-rendered="true"
                                     style="width: 279px;">
                            <? } ?>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <p>Seu Médico</p>
                            <div>
                                <input type="hidden" name="id_medico" value="<?php echo $medico[0]->id_usuario; ?>">
                                <strong><?php echo $medico[0]->nm_medico; ?></strong><br />
                                <div class="">
                                    <b>Valor da Primeira Consulta: R$<?php echo $medico[0]->vr_consulta1; ?><br>
                                    Valor das demais consultas: R$<?php echo $medico[0]->vr_consulta2; ?></b>
                                </div>
                                <br />
                                <strong>Site: </strong>
                                <? if ($medico[0]->pagina_web == ""){
                                    echo"Site não informado!";
                                } else {
                                    echo $medico[0]->pagina_web;
                                }?>
                            </div>
                            <div>
                                <strong>Local :</strong> <?php echo $endereco[0]->nm_endereco; ?>, <?php echo $endereco[0]->nr_endereco; ?> <br />
                                <?php echo $endereco[0]->nm_bairro; ?>, <?php echo $endereco[0]->nm_cidade; ?> - <?php echo $endereco[0]->nm_estado; ?>
                            </div>
                        </div>

                    </div>
                    <div class="information">
                        <div class="col-md-2 col-sm-2">
                            <img src="<?php echo base_url('assets'); ?>/img/first.png" />
                        </div>
                        <div class="col-md-10 col-sm-10 text">
                            Você mudou seus planos ? Não tem problema, você pode cancelar ou
                            alterar a sua consulta a qualquer momento.
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <img src="<?php echo base_url('assets'); ?>/img/phone.png" />
                        </div>
                        <div class="col-md-10 col-sm-10 text">
                            Entre em contato com nosso serviço ao cliente.
                            <br> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> 999 9999 999
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <img src="<?php echo base_url('assets'); ?>/img/block.png" />
                        </div>
                        <div class="col-md-10 col-sm-10 text">
                            Seus dados são usados em conformidade  com nossa politica  de privacidade de dados.
                        </div>
                    </div>
                </div>
                <?php if($this->session->usuario){ ?>
                <div class="col-md-6 col-sm-6">
                    <div class="col-md-12 titleData">Meus Dados</div>

                        <div class="row" style="    padding: 11% !important;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome Completp</label>
                                <input type="hidden" name="id_paciente" value="<?php echo $paciente[0]->id_usuario; ?>">
                                <input type="text" class="form-control" value="<?php echo $paciente[0]->nm_paciente; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="text" class="form-control" value="<?php echo $paciente[0]->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="text" class="form-control" value="<?php echo $paciente[0]->nr_telefone ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Motivo da visita</label>
                                <select class="form-control" name="nm_consulta">
                                    <option value="">Selecione o motivo</option>
                                    <option value="Primeira Consulta">Primeira Consulta</option>
                                    <option value="Retorno">Retorno</option>
                                </select>
                            </div>
                        </div>
                        <button style="float: right;" type="submit" class="btn btn-primary">Continuar ></button>


                </div>
            </form>

            <?php } else {  ?>
            <div class="col-md-6 col-sm-6">
                <div class="formConsulta">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" name="email" class="form-control" id="nm_login" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="ps_login" class="form-control" id="ps_login" placeholder="Sua senha">
                    </div>
                    <button type="button" class="btn btn-default loginAjax">Acessar</button>
                </div>
                </div>
            <?php } ?>

        </div>
        </div>
    <?php
        }
    ?>
</section>

<script>

    $('.loginAjax').click(function(){
        var requisicao = 'ajax';
        var urlRetorno = window.location.href;
        var nm_login = $('#nm_login').val();
        var ps_login = $('#ps_login').val();
        $.ajax({
            'url' : "<?php echo base_url('/login/auth')?>",
            'type' : 'POST',
            'data' : 'email='+nm_login+'&ps_login='+ps_login+'&urlRetorno='+urlRetorno+'&requisicao='+requisicao,
            'success' : function(data){
                var result = JSON.parse( data );
                if (result.logado == true){
                    window.location.reload();
                }

            }
        });
    });
</script>

