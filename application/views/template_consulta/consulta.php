<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/27/15
 * Time: 10:39 PM
 */
?>
<style>
    .contact-caption {
        margin-top: 0px !important;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Reserve agora sua consulta médica</h4>
            <p>Perto de você * o dia que melhor lhe convier * fácil e grátis</p>

            <div class="col-md-12 col-sm-6" style="padding: 9%;background: url('http://dev.consultorio.com/assets/img/medicos.jpg') no-repeat;
    background-size: 100%;    width: 100%;    height: 374px;">
                <form method="get" action="/consulta/pesquisa">
                    <select class="form-control formSearch" id="especialidade" name="especialidade" required title="Escolha uma especialidade">
                        <option value="">Seleciona uma Especialidade</option>
                        <?php foreach($especializacoes as $esp){ ?>
                            <option value="<?php echo $esp->id_especializacao; ?>"><?php echo $esp->nm_especializacao; ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" class="form-control formSearch" name="cep" id="cep" placeholder="Cep">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
            </div>

            <div class="col-md-12 col-sm-6" style="text-align: center">
                <h3>Nós levamos a sua saúde a sério</h3>
                <span>Vamos ajuda-los - Nós cuidamos para encontrar o Médico mais conveniente</span>
            </div>

            <div class="col-md-12 col-sm-6" style="margin-top: 4%;">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets'); ?>/img/patient_content_vertrauen_kompetenz.jpg">
                </div>
                <div class="col-md-4" style="    padding-left: 4%;">
                    <h3>Médicos que inspiram confiança</h3>
                    <p>
                        Todos os médicos possuem um perfil profissional, onde você vai encontrar
                        informações sobre as suas formações e suas experiencia profissional. Para
                        além das opniões de outros pacientes, você pode escolher um profissional médico
                        facilmente.
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="col-md-12 col-sm-6" style="margin-top: 4%;">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h3>Fácil e Seguro</h3>
                    <p>
                        Nós cuidamosdo gerenciamento de seus compromissos
                        para que não interrompam suas atividades diárias.
                        Por isso pedimos somente os dados essênciais para marcar a consulta.
                        - A segurança de seus dados é uma das nossas maiores prioridades.
                    </p>
                </div>
                <div class="col-md-4" style="    padding-left: 4%;">

                    <img src="<?php echo base_url('assets'); ?>/img/patient_content_einfach_sicher.jpg">
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="col-md-12 col-sm-6" style="margin-top: 4%;">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets'); ?>/img/patient_content_ihre_naehe.jpg">
                </div>
                <div class="col-md-4" style="    padding-left: 4%;">
                    <h3>Perto de Você</h3>
                    <p>
                        Em ClickConsultório.com de forma rápida e sem complicação vai encontrar uma consulta com o médico
                        especialista mais próximo. Encontre  consulta médica rápida e simples que combina com você e
                        economizar no telefone.
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
    </div>
</section>
