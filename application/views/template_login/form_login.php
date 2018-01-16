<style>
    .contact-caption {
        margin-top: 0px !important;
    }
    h3 {
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .text-center {
        text-align: justify;
    }
</style>

<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <center><h4>Iniciar Sessão</h4></center>

            <div class="col-md-6 col-sm-6">
                <div class="contact-caption clearfix">

                    <div class="col-md-12 col-md-offset-1 contact-form" style="margin-left: 0px !important;">
                        <center><h3>Acesse sua Área</h3></center>

                        <form class="form" method="post" action="/login/auth">
                            <input class="email" type="text" name="email" placeholder="Email/Login">
                            <input class="email" type="password" name="ps_login" placeholder="">
                            <span class="error">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </span>
                            <input class="submit-btn" type="submit" value="ENVIAR">
                        </form>
                        <span class="alert">
                                <?php echo $this->session->flashdata('msg2'); ?>
                        </span>
                        <p style="text-align: right; font-size: large">
                            <a href="usuario/recuperar_senha" style="color: #ffffff; ">Esqueceu sua senha?</a>
                        </p>
                    </div>

                </div>

                <div>

                    <div></p>
                        <h1><center>Porque devo fazer parte do ClickConsultorio?</center></h1>
                        <div class="contact-caption clearfix" style="padding-top: 6% !important;padding-bottom: 18% !important;background: #fff">
                            <h4>
                            <br>
                            Chamada para médicos e profissionais da saúde diferenciados, que estão querendo lotar a sua agenda de pacientes agora!!!
                            <br><br>
                            Só continue lendo apenas se você estiver realmente precisando lotar sua agenda hoje mesmo! do contrario isso não serve para você.
                            <br><br>
                            Com certeza você já viu outros sites por ai prometendo isso, esse tipo de serviço, de como você pode aumentar o número de pacientes na sua agenda.
                            <br><br>
                            Mas você profissional da saúde o que você realmente quer?
                            <br>
                            O que você busca hoje?
                            <br><br>
                            Se você está procurando uma solução para que isso venha acontecer o mais rápido possível, nós aqui do ClickConsultório temos a solução ideal para você.
                            Imagina, todos os dias você abrindo sua agenda e ela cheia de pacientes marcados!
                            <br>
                            Que maravilha hein?
                            <br>
                            Sim isso é possível!
                            <br><br>
                            Se você ainda estiver assistindo esse conteúdo é porque você realmente quer melhorar sua agenda, aumentar o número de pacientes, e assim ganhar mais dinheiro, concorda comigo?
                            <br><br>
                            A cada dia que passa você vê seu consultório vazio?<br>
                            Sua agenda vazia e sem nenhum paciente para atender?<br>
                            Não vê retorno nenhum, essa é sua maior dificuldade hoje?<br>
                            Seu maior problema?<br>
                            Pensa até em desistir da sua profissão?<br>
                            Calma...<br>
                            Conte-nos, por que precisa ser assim!<br>
                            Simples! Não precisa!
                            <br><br>
                            O que está faltando para você profissional da saúde hoje, é ter um sistema que gerencie sua agenda 24h por dia de onde você estiver, a qualquer horário, assim não precisando mais perder seu tempo em procurar ou esperar que seu paciente venha até a clínica.
                            <br><br>
                            Mas, em primeiro lugar vamos nos apresentar, falar um pouco sobre nós, como surgimos.
                            <br><br>
                            Em meados de 2014 com nossa empresa ativa no mercado nacional sentimos na pele a crise econômica Brasileira, perdendo alguns clientes de peso, nos vimos obrigados a replanejar nossas metas, então em 2015 resolvemos ampliar nossos horizontes e fomos para a Europa.
                            Depois de um ano na busca incessante de conhecimento e novos nichos de mercado encontramos uma necessidade latente de gerenciar  consultas e agendas médicas, percebido esse novo nicho de mercado criamos o ClickConsultório, um sistema de consultas médicas e agendamento online para profissionais da saúde.
                            <br><br>
                            Nosso compromisso é  ajudar profissionais da saúde, a terem controle de sua agenda médica 24h por dia, para  o paciente ele poderá marcar a sua consulta de onde estiver, e o médico assim confirmar a consulta ou remarcar para outra data.
                            <br><br>
                            Futuramente também teremos outros serviços, como prontuários eletrônicos, atestados médicos e receitas médicas.
                            <br><br>
                            Sendo assim surge o nosso projeto o ClickConsultório.
                            <br><br>
                            Nós ajudamos pacientes e profissionais da saúde.
                            Fazendo com que tenham facilidade no agendamento de consultas da sua casa, seu trabalho, de onde estiver, sem custo nenhum para o paciente, redução de custo para o médico.
                            <br><br>
                            Agora como você pode conseguir esses benefícios hoje mesmo?
                            <br>
                            Basta você se cadastrar em nosso site agora e experimentar por um custo  de apenas <i><b>R$ 34,90 por mês</b></i>, garanto que você não irá se arrepender, pois terá seu retorno na certa, sua agenda lotada, e seu consultório como sempre quis, cheio de pacientes.
                            <br><br>
                            O que você está esperando? Clique agora mesmo e preencha seu cadastro conosco.
                            <br>
                            Garantimos que daqui um ano você vai ter dado esse voto de confiança ao seu negócio no dia de hoje.
                            <br><br>
                            <b>Lembre-se!</b>
                            <br><br>
                            Mude sua vida hoje! Não deixe para amanhã, aja agora mesmo! Nós estamos aqui aguardando você.
                            <br><br>
                            Venha fazer parte do nosso time, o ClickConsultório.
                            <br>
                            Fale Conosco:
                            <br><br>
                            <i>www.clickconsultorio.com</i>
                            <br>
                            contato@clickconsultorio.com
                            </h4>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-sm-6">
                <div class="contact-caption clearfix"
                     style="    padding-top: 19% !important;padding-bottom: 18% !important;background: #fff">
                    Você é um Médico e deseja usar nossos serviços? <a href="medico/registro">Registre-se aquí.</a>
                    <br/>
                    Você é um paciente e deseja usar nossos serviços? <a href="paciente/registro">Registri-se aquí.</a>

                </div>
            </div>


        </div>
    </div>
</section><!-- end of about section -->

