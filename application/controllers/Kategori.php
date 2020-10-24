<?php

    class Kategori extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Kategori_model');
            $this->load->library('form_validation');
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
        }
        public function index()
        {
            $data['title'] = "Kategori || Laporin";
            $data['kategori'] = $this->Kategori_model->getAllKategori();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('kategori/kategori',$data);
            $this->load->view('templates/footer');
        }
        public function setData($id)
        {
            $data = $this->Kategori_model->setDataModel($id);
            echo json_encode($data);
        }
        public function tambah()
        {
            $data = [
                "status" => false,
                "message" => []
            ];
            $this->form_validation->set_rules('kategori_name','Kategori','trim|required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['message'][$key] = form_error($key);
                }
            }
            else {
                $this->Kategori_model->insertCategoryData();
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function ubah()
        {
            $data = [
                "status" => false,
                "message" => []
            ];
            $this->form_validation->set_rules('category_name','Kategori','trim|required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['message'][$key] = form_error($key);
                }
            }
            else {
                $this->Kategori_model->updateCategoryData();
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function hapus($id)
        {
            $this->Kategori_model->deleteCategoryData($id);
            echo json_encode(['status' => true]);
        }
    }