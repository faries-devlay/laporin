<?php

    class Satuan extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Satuan_model');
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
        }
        public function index()
        {
            $data['title'] = "Satuan || Laporin";
            $data['satuans'] = $this->Satuan_model->getAllSatuan();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('satuan/satuan',$data);
            $this->load->view('templates/footer');
        }
        public function tambah()
        {
            $data = [
                'status' =>false,
                'msg' =>[],
            ];

            $this->form_validation->set_rules('satuan_name','Satuan','trim|required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $this->Satuan_model->insertSatuanModel();
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function setData($id)
        {
            $data = $this->Satuan_model->setDataSatuan($id);
            echo json_encode($data);
        }
        public function ubah()
        {
            $data = [
                'status' =>false,
                'msg' =>[]
            ];
            $this->form_validation->set_rules('satuan_name','Satuan','trim|required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $coba = $this->Satuan_model->updateSatuanModel();
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function hapus($id)
        {
            $this->Satuan_model->deleteSatuanModel($id);
            echo json_encode(['status' => true]);
        }
    }