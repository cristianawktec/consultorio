<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/27/15
 * Time: 10:39 PM
 */
?>
<?php echo $map['js']; ?>
<style>
    .contact-caption {
        margin-top: 0px !important;
    }
    .ondestar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png")  ;
        width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 68px;
    }
    .twostar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 55px;;
    }
    .threestar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 41px;;
    }
    .fourstar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 27px;;
    }
    .fivestar{
        background: url("<?php echo base_url('assets') ?>/img/icon/star.png");    width: 76px;
        height: 13px;
        background-size: 76px;
        background-position-x: 76px;
        background-position-y: 14px;;
    }
</style>
<!-- about section -->
<section class="about " id="about">
    <div class="container">
        <div class="row" style="padding-bottom: 140px;padding-top: 116px;">

            <h4>Resultado da Busca</h4>

            <div id="directionsDiv" class="col-md-6 col-sm-6">
                <?php echo $map['html']; ?>
            </div>
            <div class="col-md-6 col-sm-6">

                <div class="row filterResult">
                    Mostrar mais filtros
                    <form method="get" action="/consulta/pesquisa">
                        <input type="text"  name="cep" id="cep" >
                        <select class="" id="especialidade" name="especialidade" required>
                            <option value="">Seleciona uma Especialidade</option>
                            <?php foreach($especializacoes as $esp){ ?>
                                <option value="<?php echo $esp->id_especializacao; ?>"><?php echo $esp->nm_especializacao; ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-default">Buscar</button>
                    </form>
                </div>
                <br />
                <div class="row"><b><? if($contMedico==0) { echo "0";} else { echo count($contMedico); } ?></b> - Encontrado(s)</div>
                <hr />
                <div class="row">
                    <?php $cont = 1; foreach($medicos as $medico){ //echo"<br><pre>";print_r($medico);echo"</pre>"; ?>

                    <div class=""><?= $cont; ?> - <?php echo $medico->nm_medico; ?></div>
                        <div class=""><a  href="<?echo $medico->pagina_web; ?>" target="_blank" ><?php echo $medico->pagina_web; ?></a></div>
                        <div class="">
                            <?php
                                $nota1 = 0;
                                $i = 0;
                                foreach($notas as $nota) {
                                if ($medico->id_medico == $nota->id_medico){
                                    $i += 1;
                                    $nota1 = $nota1 + $nota->nota;
                                }
                            }
                            if ($nota1 > 0) {
                                $nota2 = ($nota1 / $i);
                                if ($nota2 >= 5){
                                    echo '<div class="fivestar"></div>';
                                } elseif ($nota2 <= 1 && $nota2 < 2 ){
                                    echo '<div class="ondestar"></div>';
                                } elseif ($nota->nota >= 2 && $nota2 < 3){
                                    echo '<div class="twostar"></div>';
                                } elseif ($nota->nota >= 3 && $nota2 < 4){
                                    echo '<div class="threestar"></div>';
                                } elseif ($nota->nota >= 4 && $nota2 < 5){
                                    echo '<div class="fourstar"></div>';
                                }
                            }

                            ?>
                        </div>
                    <div class="">
                        Valor da Primeira Consulta: R$<?php echo $medico->vr_consulta1; ?><br>
                        Valor das demais consultas: R$<?php echo $medico->vr_consulta2; ?>
                    </div>
                    <div class=""><?php echo $medico->nm_endereco; ?>
                        <?php echo $medico->nr_endereco; ?>,
                        <?php echo $medico->nm_bairro; ?>,
                        <?php echo $medico->nm_cidade; ?>,
                        <?php echo $medico->nr_cep; ?>
                        <?php echo $medico->nm_estado; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?php if(!$medico->imagem) { ?>
                                <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                     alt="140x140" style="width: 170px; height: 140px;"
                                    <?php if ($medico->ch_sexo == "M"){ ?>
                                        src="<?php echo base_url('assets'); ?>/img/medico_default.jpg" data-holder-rendered="true"
                                    <? } else { ?>
                                        src="<?php echo base_url('assets'); ?>/img/medica_default.jpg" data-holder-rendered="true"
                                    <? } ?>
                                     style="width: 279px;">
                            <? } else { ?>
                                <img data-src="holder.js/140x140" class="img-rounded col-md-2"
                                     alt="140x140" style="width: 170px; height: 140px;"
                                     src="<?php echo base_url('assets'); ?>/img/archive/doctor/img/<?php echo $medico->id_usuario ?>/<?php echo $medico->imagem ?>" data-holder-rendered="true"
                                     style="width: 279px;">
                            <? } ?>
                        </div>
                        <div class="col-md-8">
                            <h4 style="margin-bottom: 9px !important;">Horarios de Atendimento</h4>
                            <?php
                            $this->db->where('id_medico', $medico->id_usuario);
                            $agenda = $this->db->get('agenda')->result();
                            foreach($agenda as $age){
                            ?>
                            <div class="col-md-2 horarioAgenda" onclick="markConsult('<?php echo $age->id_agenda ?>','<?php echo $age->id_medico ?>')"><?php echo $age->horario; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $cont++; } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function markConsult(id_agenda, id_medico){
        window.location.href = "<?php echo base_url(); ?>consulta/marcar?agenda="+id_agenda+"&doctor="+id_medico;
    }
</script>
