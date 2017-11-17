<?php

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 2/9/16
 * Time: 11:59 AM
 */
class NoticiaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Noticia_Model', 'noticia');
    }

    public function index()
    {
        $data['noticias'] = $this->noticia->getAllNoticia();
        $this->load->view('layout_principal_admin/top');
        $this->load->view('template_noticia_admin/index', $data);
        $this->load->view('layout_principal_admin/footer_admin');
    }

    public function create()
    {
        $this->load->view('layout_principal_admin/top');
        $this->load->view('template_noticia_admin/create');
        $this->load->view('layout_principal_admin/footer_admin');
    }

    public function edit($id)
    {
        $data['noticia'] = $this->noticia->getNoticiaById($id);
        $this->load->view('layout_principal_admin/top');
        $this->load->view('template_noticia_admin/editar', $data);
        $this->load->view('layout_principal_admin/footer_admin');
    }

    public function update($id)
    {
        $data['titulo'] = $this->input->post('titulo');
        $data['noticia'] = $this->input->post('noticia');
        if ($this->input->post('noticia')){
            $data['arquivo'] = $this->do_upload('arquivo');
        }

        if($this->noticia->update($id,$data)){
            return redirect('/admin/noticias');
        }
    }

    public function add()
    {
        $data['data'] = $this->input->post('data');
        $data['titulo'] = $this->input->post('titulo');
        $data['noticia'] = $this->input->post('noticia');
        $data['arquivo'] = $this->do_upload('arquivo');

        if($this->noticia->add($data)){
            return redirect('/admin/noticias');
        }
    }

    public function do_upload($name)
    {
        if (file_exists("./assets/img/noticia/")) {
            // echo "O arquivo $filename existe";
        } else {
            mkdir("./assets/img/noticia/", 0777);
        }
        $config['upload_path']          = './assets/img/noticia/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 50000;
        $config['max_height']           = 50000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($name))
        {
            $error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
            return null;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            return $data['upload_data']['file_name'];
        }
    }

    public function remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('noticias');
        return redirect('/admin/noticias');
    }
}