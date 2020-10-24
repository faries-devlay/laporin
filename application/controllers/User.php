<?php

    class User extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model("User_model");
            $this->load->library("form_validation");
        }
        public function index()
        {
            $data['title'] = "Login || Laporin";
            $this->load->view('login/login',$data);
        }
        public function login()
        {
            $data = [
                "status" => false,
                'msg' => [],
                'redirect',
                'not_found'=>false
            ];
            $this->form_validation->set_rules("username","Username","required|trim");
            $this->form_validation->set_rules("password","Password","required|trim");
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $getData = $this->User_model->getuserData();
                // $data['redirect'] = $this->User_model->getuserData();
                if ($getData == null) {
                    $data['not_found'] = false;
                    $data['status'] = true;
                }
                else{
                    $session=[
                        'user_id'=> $getData->user_id,
                        'username'=> $getData->username,
                        'login' => true
                    ];
                    $this->session->set_userdata($session);
                    
                    if ($getData->level == 'admin') {
                        $data['status'] = true;
                        $data['not_found'] = true;
                        $data['redirect'] = 'home/admin';
                    }
                    else{
                        $data['status'] = true;
                        $data['not_found'] = true;
                        $data['redirect'] = 'home';
                    }
                }
            }
            echo json_encode($data);
        }
        public function logout()
        {
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
            else{
                $this->session->sess_destroy();
                redirect('user');
            }
        }
    }