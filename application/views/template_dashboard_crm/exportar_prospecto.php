<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 31/08/2017
 * Time: 11:17
 */
?>
<meta charset="UTF-8">
<?php
$data = date("d-m-Y");

$arquivo = "Prospectos_".$data;

$html = '';
$html .= '<table border="1" align="center" style="text-align: center;">';
$html .= '<tr>';


$html .= '<td colspan="8" align="center" style="background-color: #0a41cc; color: #FFF;"><b>Indicação</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Contato</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Origem</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cadastrado</b></td>';
$html .= '</tr>';


foreach($registros as $dados) {
    if($dados->fonte=='Indicação') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nnome . '</td>';
        $html .= '<td>' . $dados->nm_responsavel . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_contato . '</td>';
        $html .= '<td>' . $dados->fonte . '</td>';
        $html .= '<td>' . $dados->data_cadastro . '</td>';
        $html .= '</tr>';
    }
}

$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #0a41cc; color: #FFF;"><b>Site</b></td>';
$html .= '</tr>';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Contato</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Origem</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cadastrado</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->fonte=='Site') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nnome . '</td>';
        $html .= '<td>' . $dados->nm_responsavel . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_contato . '</td>';
        $html .= '<td>' . $dados->fonte . '</td>';
        $html .= '<td>' . $dados->data_cadastro . '</td>';
        $html .= '</tr>';
    }
}

$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #0a41cc; color: #FFF;"><b>Ligação Direta</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Contato</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Origem</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cadastrado</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->fonte=='Ligação Direta') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nome . '</td>';
        $html .= '<td>' . $dados->nm_responsavel . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_contato . '</td>';
        $html .= '<td>' . $dados->fonte . '</td>';
        $html .= '<td>' . $dados->data_cadastro . '</td>';
        $html .= '</tr>';
    }
}


$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #0a41cc; color: #FFF;"><b>E-mail Marketing</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Contato</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Origem</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cadastrado</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->fonte=='E-mail Marketing') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nnome . '</td>';
        $html .= '<td>' . $dados->nm_responsavel . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_contato . '</td>';
        $html .= '<td>' . $dados->fonte . '</td>';
        $html .= '<td>' . $dados->data_cadastro . '</td>';
        $html .= '</tr>';
    }
}


$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #0a41cc; color: #FFF;"><b>Facebook</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Contato</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Origem</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cadastrado</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->fonte=='Facebook') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nnome . '</td>';
        $html .= '<td>' . $dados->nm_responsavel . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_contato . '</td>';
        $html .= '<td>' . $dados->fonte . '</td>';
        $html .= '<td>' . $dados->data_cadastro . '</td>';
        $html .= '</tr>';
    }
}


$html .= '<tr>';
$html .= '<td colspan="8"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="8" align="center" style="background-color: #0a41cc; color: #FFF;"><b>Instagram</b></td>';
$html .= '</tr>';
$html .= '<tr style="text-align: center;">';
$html .= '<td style="background-color: #B7DEE8;"><b>Paciente</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Responsável</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>E-mail</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Contato</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Origem</b></td>';
$html .= '<td style="background-color: #B7DEE8;"><b>Cadastrado</b></td>';
$html .= '</tr>';

foreach($registros as $dados) {
    if($dados->fonte=='Instagram') {
        $html .= '<tr style="text-align: center;">';
        $html .= '<td>' . $dados->nnome . '</td>';
        $html .= '<td>' . $dados->nm_responsavel . '</td>';
        $html .= '<td>' . $dados->email . '</td>';
        $html .= '<td>' . $dados->nr_contato . '</td>';
        $html .= '<td>' . $dados->fonte . '</td>';
        $html .= '<td>' . $dados->data_cadastro . '</td>';
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