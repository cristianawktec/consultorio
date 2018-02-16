<?php
 /**
 * Created by PhpStorm.
 * User: cristian
 * Date: 10/11/2017
 * Time: 17:50
 */
?>

<!-- Google Adowords -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79289611-1', 'auto');
    ga('send', 'pageview');

</script>
<!-- End Google Adowords -->

<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="http://cluster-piwik.locaweb.com.br/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 3732]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Piwik Code -->

<!-- RD Station -->
<script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/2fc9f641-d8af-488d-b56d-33315c4ea00f-loader.js" ></script>
<!-- end RD Station -->

<section class="slider" id="home">
	<div class="container-fluid">
		<div class="row">

            <!-- planos e precos-->
            <div class="be-wrapper" style="margin-left: 150px;">

                <div class="be-content" >
                    <div class="main-content container-fluid">
                        <div class="team-heading text-center">
                            <h2 style="font-size: 50px; color: #42b3e5; margin-top: 50px;width: 800px;">Planos e Valores</h2>
                        </div>
                        <p class="display-description text-center" style="width: 800px;">Por que pagar por uma mensalidade? O que inclui?</p>
                        <div class="row pricing-tables">
                            <div class="col-md-3">
                                <div class="pricing-table pricing-table-primary">
                                    <div class="pricing-table-image">
                                        <!--imagem free-->
                                    </div>
                                    <div class="pricing-table-title" style="font-size: 40px; color: #42b3e5;">Free</div>
                                    <div class="panel-divider panel-divider-xl"></div>
                                    <div class="pricing-table-price"><span class="currency">R$</span><span class="value">0,00</span><span class="frecuency">/mês</span></div>
                                    <ul class="pricing-table-features">
                                        <li style="font-size: 20px;color: #060606;">Se está começando agora</li>
                                        <li style="font-size: 20px;color: #060606;">Este é o seu Plano</li>
                                        <li style="font-size: 20px;color: #060606;">Livre de mensalidades!</li>
                                        <li>&nbsp;</li>
                                    </ul><a href="<?php echo base_url(); ?>medico/registro/plano/1" class="btn btn-primary" style="font-size: 20px; color: #fffefd;">GRÁTIS</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="pricing-table pricing-table-warning">
                                    <div class="pricing-table-image">
                                        <!--imagem basico-->
                                    </div>
                                    <div class="pricing-table-title" style="font-size: 40px; color: #fbbc05;">Básico</div>
                                    <div class="panel-divider panel-divider-xl"></div>
                                    <div class="pricing-table-price"><span class="currency">R$</span><span class="value">34,90</span><span class="frecuency">/mês</span></div>
                                    <ul class="pricing-table-features">
                                        <li style="font-size: 20px;color: #060606;">Já tens muitas consultas</li>
                                        <li style="font-size: 20px;color: #060606;">para gerenciar?</li>
                                        <li style="font-size: 20px;color: #060606;">Este é o seu Plano</li>
                                        <li>&nbsp;</li>
                                    </ul><a href="<?php echo base_url(); ?>medico/registro/plano/2" class="btn btn-warning" style="font-size: 20px; color: #fffefd; background-color: #fbbc05;">ASSINAR</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="pricing-table pricing-table-success">
                                    <div class="pricing-table-image">
                                        <!--imagem premium-->
                                    </div>
                                    <div class="pricing-table-title" style="font-size: 40px; color: #34a853;">Premium</div>
                                    <div class="panel-divider panel-divider-xl"></div>
                                    <div class="pricing-table-price"><span class="currency">R$</span><span class="value">49,90</span><span class="frecuency">/mês</span></div>
                                    <ul class="pricing-table-features">
                                        <li style="font-size: 20px;color: #060606;">Necessitas de um CRM</li>
                                        <li style="font-size: 20px;color: #060606;">e um relacionamento</li>
                                        <li style="font-size: 20px;color: #060606;">maior com o seu Paciente?</li>
                                        <li style="font-size: 20px;color: #060606;">Este é o seu Plano</li>
                                    </ul><a href="<?php echo base_url(); ?>medico/registro/plano/3" class="btn btn-success" style="font-size: 20px; color: #fffefd;">ASSINAR</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- fim planos e precos-->

            <!-- descricao -->
            <div class="be-content" style="margin-left: 50px;">
                <div class="main-content container-fluid" style="width: 1450px; padding-left: 0px; padding-top: 0px; padding-right: 350px;">
                    <div class="row pricing-tables">
                        <div class="col-md-3">
                            <div class="pricing-table pricing-table-danger" >
                               <ul class="pricing-table-features" >
                                    <li style="font-size: 20px;color: #060606;">Módulo Agenda</li>
                                    <li style="font-size: 20px;color: #060606;">Registro de Consultas</li>
                                    <li style="font-size: 20px;color: #060606;">Cadastro Pacientes</li>
                                    <li style="font-size: 20px;color: #060606;">Histórico Médico</li>
                                    <li style="font-size: 20px;color: #060606;">Número de Paciente</li>
                                    <li style="font-size: 20px;color: #060606;">Número de Consultas mês</li>
                                    <li style="font-size: 20px;color: #060606;">Alertas</li>
                                    <li style="font-size: 20px;color: #060606;">Consulta On-Line</li>
                                    <li style="font-size: 20px;color: #060606;">Campanhas de Marketing</li>
                                    <li style="font-size: 20px;color: #060606;">Suporte por e-mail</li>
                                    <li style="font-size: 20px;color: #060606;">Cópias de segurança</li>
                                    <li style="font-size: 20px;color: #060606;">Módulo CRM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="pricing-table pricing-table-primary">
                                <ul class="pricing-table-features">
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li style="font-size: 20px;color: #060606;">10</li>
                                    <li style="font-size: 20px;color: #060606;">15</li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #840713;"><span class="mdi mdi-minus"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #840713;"><span class="mdi mdi-minus"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #840713;"><span class="mdi mdi-minus"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #840713;"><span class="mdi mdi-minus"></span></div></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="pricing-table pricing-table-warning">
                                <ul class="pricing-table-features">
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li style="font-size: 20px;color: #060606;">ILIMITADO</li>
                                    <li style="font-size: 20px;color: #060606;">ILIMITADO</li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #840713;"><span class="mdi mdi-minus"></span></div></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="pricing-table pricing-table-success">
                                <ul class="pricing-table-features">
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li style="font-size: 20px;color: #060606;">ILIMITADO</li>
                                    <li style="font-size: 20px;color: #060606;">ILIMITADO</li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                    <li><div class="icon" style="font-size: 20px; color: #128404;"><span class="mdi mdi-check"></span></div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <!-- fim descricao -->

		</div>
	</div>
</section><!-- end of slider section -->

 <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
 <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
 <script src="assets/js/main.js" type="text/javascript"></script>
 <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
 <script type="text/javascript">
     $(document).ready(function(){
         //initialize the javascript
         App.init();
     });

 </script>


			<script src="../../../sites/beagle/dist/html/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
			<script src="../../../sites/beagle/dist/html/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
			<script src="../../../sites/beagle/dist/html/assets/js/main.js" type="text/javascript"></script>
			<script src="../../../sites/beagle/dist/html/assets/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
			<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
			</script>
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

		</div>
	</div>
	</div>
</section>
<!-- end of team section -->

