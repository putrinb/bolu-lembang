<?php

class home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('is_logged')){
            redirect('auth');
        }
    }
    public function index()
    {
        $data=['title' => 'Bolu Lembang | Dashboard'];
            //$this->load->view('templates/header',$data);
            $this->load->view('dashboard', $data); 
            $this->load->view('templates/footer');
    }
}

