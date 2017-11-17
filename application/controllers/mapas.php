<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 29/11/15
 * Time: 12:50
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapas extends CI_Controller {

    /*
    * Utilizando o Construtor da classe para carregar as libraries e helpers
    */
    public function __construct(){
        parent::__construct();
        $this->load->library('googlemaps');
        $this->load->helper('url');
        $this->load->helper('html');
    }


    /*
    * Carregando um mapa com traçado de rota.
    */
    public function index(){
        //Mapa do utilizando Directions.
        $config['center'] = 'auto';
        $config['zoom'] = 'auto';
        $config['directions'] = TRUE;
        $config['directionsStart'] = 'R. da Pedra, 200, Palhoça - SC';
        $config['directionsEnd'] = 'R. da Pedra, 200, Palhoça - SC';
        $config['directionsDivID'] = 'directionsDiv';
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapas',$data);
    }

    /*
    * Carregano um mapa utilizando o Street View.
    */
    public function streetview(){
        //Mapa do utilizando Street View.
        //Coordenadas do esccritório da Awk (Doctor) Pedra Branca.
        $config['center'] = '-27.6222197,-48.6775413';
        $config['map_type'] = 'STREET';
        $config['streetViewPovHeading'] = 270;
        $this->googlemaps->initialize($config);

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapas',$data);
    }

    /*
     * Exibindo a localização de um Único Marcador.
     */
    public function marcador_simples(){
        $config['center'] = '-27.6222197,-48.6775413';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = '-27.6222197,-48.6775413';
        $marker['infowindow_content'] = 'Sede Doctor - Pedra Branca<br/><img width=\"187\" height=\"250\" src=\"https://www.google.com.br/maps/@-27.622835,-48.6784569,3a,75y,90t/data=!3m8!1e1!3m6!1s-zU6M1HzrIWo%2FVB4tKZvbtmI%2FAAAAAAAAgW4%2FlnVMssAYjQw!2e4!3e11!6s%2F%2Flh4.googleusercontent.com%2F-zU6M1HzrIWo%2FVB4tKZvbtmI%2FAAAAAAAAgW4%2FlnVMssAYjQw%2Fw311-h100-n-k-no%2F!7i10240!8i3290?hl=pt-BR" alt=\"Vista da Sede Awk\">';
        $marker['title'] = "Jardim Botânico de Curitiba";
        //$marker['icon'] = base_url() ."assets/imgs/marcador_personalizado.png";
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapas',$data);
    }

    /*
    * Exibindo marcadores do Google Places.
    */
    public function places(){
        $config['center'] = '-27.6222197,-48.6775413';
        $config['zoom'] = 'auto';
        $config['places'] = TRUE;
        $config['placesLocation'] = '-27.6222197,-48.6775413';
        $config['placesRadius'] = 200;
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapas',$data);
    }

    /*
    * Exibindo fotos do Panoramio.
    */
    public function panoramio(){
        $config['center'] = '-27.6222197,-48.6775413';
        $config['zoom'] = '16';
        $config['map_type'] = 'HYBRID';
        $config['panoramio'] = TRUE;
        $config['panoramioTag'] = 'Pedra Branca';
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapas',$data);
    }




}