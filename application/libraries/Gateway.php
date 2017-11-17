<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 3/8/16
 * Time: 7:06 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gateway
{

    public function Gateway(){
        require 'LocawebGateway/LocawebGatewayProcessor.php';
    }

}