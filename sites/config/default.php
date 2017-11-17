<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 03/03/16
 * Time: 12:37
 */

//include("./config/conexao.php");
include("conexao.php");

//echo"<br> estou no default";

if ( ! function_exists('base_url'))
{
    /**
     * Base URL
     *
     * Create a local URL based on your basepath.
     * Segments can be passed in as a string or an array, same as site_url
     * or a URL to a file can be passed in, e.g. to an image file.
     *
     * @param	string	$uri
     * @param	string	$protocol
     * @return	string
     */
    function base_url($uri = '', $protocol = NULL)
    {
        return get_instance()->config->base_url($uri, $protocol);
    }
}

# Função responsável por explosão de array
function mostra_tudo($curarray,$startglue,$endglue,$fimglue,$withkeys=false) {
    foreach($curarray as $curkey => $curvalue) {
        if (is_array($curvalue)) {
            $curvalue = mul_dim_implode($curvalue,$startglue,$endglue,$fimglue,$withkeys);
        }
        if (!isset($retu)) {
            if ($withkeys) {
                $retu = $startglue.$curkey.$fimglue;
            } else {
                $retu = $startglue.$curvalue.$endglue;
            }
        } else {
            $result = count($curarray);
            $result = $result - 1;
            if ($withkeys) {
                $retu .= $startglue.$curvalue.$endglue;
            } else {
                if($i < $result ) {
                    $retu .= $startglue.$curvalue.$endglue;
                } else {
                    $retu .= $startglue.$curvalue.$fimglue;
                }
            }
        }
        $i++;
    }
    return $retu;
}

# Função de INSERT (mysql)
function insert($post,$db) {

//echo"<br>default<br><pre>";print_r($_POST);echo"</pre>";

    $a = "'$";
    $b = "_";
    $c = "POST[";
    $campo = array();
    $valor = array();
    foreach ($post as $cmp => $value) {
        array_push($campo, $cmp);
        array_push($valor, $value);
    }
    $second = mostra_tudo($valor,"'","',","'");
    $first = implode(",",$campo);

    $sql  = "INSERT INTO";
    $sql .= " $db";
    $sql .= " (";
    $sql .= "$first";
    $sql .= " )";
    $sql .= " ";
    $sql .= " VALUES";
    $sql .= " (";
    $sql .= " $second";
    $sql .= " )";

    $res = mysql_query($sql);
    //echo $sql;die;
    echo "<script>javascript:history.back(1);</script>";

}

# Função de SELECT (mysql) modificado para a landingpage para trazer as cidades para popular a combocidade
function select($estado,$db) {
    header( 'Cache-Control: no-cache' );
    header( 'Content-type: application/xml; charset="utf-8"', true );
    $cidades = array();

    $sql = "SELECT cod_cidades, nome
			FROM cidades
			WHERE estados_cod_estados='$estado'
			ORDER BY nome";
    //echo"<br>sql: ".$sql;die;
    $res = mysql_query( $sql );
    while ( $row = mysql_fetch_assoc( $res ) ) {
        $cidades[] = array(
            'cod_cidades'	=> $row['cod_cidades'],
            'nome'			=> utf8_encode($row['nome']),
        );
    }
    //echo"Array: <pre>";print_r($cidades);echo"</pre>";die;
    echo( json_encode( $cidades ) );
}