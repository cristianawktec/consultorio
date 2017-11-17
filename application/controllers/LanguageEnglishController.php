<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 02/08/16
 * Time: 11:17
 */


class TestLanguage extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->lang->load("message","english");
    }

    function index() {
        $data["language_msg"] = $this->lang->line("msg_hello_english");
        $this->load->view('language_view', $data);
    }
}

class LangSwitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }
}