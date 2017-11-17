<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 02/08/16
 * Time: 11:42
 */

class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
        $ci->lang->load('message','english');
    }
}