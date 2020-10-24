<?php

    class Home extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
        }

        public function index()
        {
            $data['title'] = "Home || Laporin";
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('home/index');
            $this->load->view('templates/footer');
        }
        public function loading()
        {
            $this->load->view('loading');
        }
    }