<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 25/08/2017
 * Time: 17:43
 */


$data = date("d-m-Y");

$arquivo = "Pacientes_".$data;

$html = '';
$html .= '<table border="1" align="center" style="text-align: center;">';
$html .= '<tr>';


$html .= '<td colspan="8" align="center" style="background-color: #00C; color: #FFF;"><b>Indicação</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Observaçao</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Último Histórico</b></td>';
$html .= '</tr>';


foreach($registros as $dados) {
    if($dados->id_origem=='1') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nm_paciente . '</td>';
        $html .= '<td>' . $dados->nm_mae . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_telefone . '</td>';
        $html .= '<td>' . $dados->nr_celular . '</td>';
        $html .= '<td>' . $dados->ds_observacao . '</td>';
        $html .= '<td>' . $dados->data_modificacao . '</td>';
        $html .= '</tr>';
    }
}

$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #093; color: #FFF;"><b>Site</b></td>';
$html .= '</tr>';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Observaçao</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Último Histórico</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->id_origem=='2') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nm_paciente . '</td>';
        $html .= '<td>' . $dados->nm_mae . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_telefone . '</td>';
        $html .= '<td>' . $dados->nr_celular . '</td>';
        $html .= '<td>' . $dados->ds_observacao . '</td>';
        $html .= '<td>' . $dados->data_modificacao . '</td>';
        $html .= '</tr>';
    }
}

$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #C60; color: #FFF;"><b>Ligação Direta</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Observaçao</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Último Histórico</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->id_origem=='3') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nm_paciente . '</td>';
        $html .= '<td>' . $dados->nm_mae . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_telefone . '</td>';
        $html .= '<td>' . $dados->nr_celular . '</td>';
        $html .= '<td>' . $dados->ds_observacao . '</td>';
        $html .= '<td>' . $dados->data_modificacao . '</td>';
        $html .= '</tr>';
    }
}


$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #cc4ba8; color: #FFF;"><b>E-mail Marketing</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Observaçao</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Último Histórico</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->id_origem=='4') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nm_paciente . '</td>';
        $html .= '<td>' . $dados->nm_mae . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_telefone . '</td>';
        $html .= '<td>' . $dados->nr_celular . '</td>';
        $html .= '<td>' . $dados->ds_observacao . '</td>';
        $html .= '<td>' . $dados->data_modificacao . '</td>';
        $html .= '</tr>';
    }
}


$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #c8cc06; color: #FFF;"><b>Facebook</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Observaçao</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Último Histórico</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->id_origem=='5') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nm_paciente . '</td>';
        $html .= '<td>' . $dados->nm_mae . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_telefone . '</td>';
        $html .= '<td>' . $dados->nr_celular . '</td>';
        $html .= '<td>' . $dados->ds_observacao . '</td>';
        $html .= '<td>' . $dados->data_modificacao . '</td>';
        $html .= '</tr>';
    }
}


$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #630acc; color: #FFF;"><b>Instagram</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Fixo</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Telefone Celular</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Observaçao</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Último Histórico</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->id_origem=='6') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nm_paciente . '</td>';
        $html .= '<td>' . $dados->nm_mae . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_telefone . '</td>';
        $html .= '<td>' . $dados->nr_celular . '</td>';
        $html .= '<td>' . $dados->ds_observacao . '</td>';
        $html .= '<td>' . $dados->data_modificacao . '</td>';
        $html .= '</tr>';
    }
}

$html .= '</table>';



header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );

echo $html;
exit;

?>