<?php

    class Supplier extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Supplier_models');
            $this->load->library('form_validation');
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
        }
        public function index()
        {
            $data['title'] = "Supplier || Laporin";
            $data['supplier'] = $this->Supplier_models->getAllSupplier();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('supplier/index.php',$data);
            $this->load->view('templates/footer');
        }
        public function tambah()
        {   
            $data = [
                "success" => false,
                "title" =>'Supplier Berhasil Ditambah',
                'msg' => []
            ];
            $this->form_validation->set_rules('nip','Nip Supplier','trim|required');
            $this->form_validation->set_rules('supplier_name','Nama Supplier','trim|required');
            $this->form_validation->set_rules('supplier_telp','Telp Supplier','trim|required|numeric');
            $this->form_validation->set_rules('supplier_alamat','Alamat Supplier','trim|required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $this->Supplier_models->insertSupplierData();
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function setData($id)
        {
            $data = $this->Supplier_models->setDataModel($id);
            echo json_encode($data);
        }
        public function ubah()
        {
            $data = [
                "success" => false,
                "title" =>'Supplier Berhasil Diubah',
                'msg' => []
            ];
            $this->form_validation->set_rules('nip','Nip Supplier','trim|required');
            $this->form_validation->set_rules('supplier_name','Nama Supplier','trim|required');
            $this->form_validation->set_rules('supplier_telp','Telp Supplier','trim|required|numeric');
            $this->form_validation->set_rules('supplier_alamat','Alamat Supplier','trim|required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $this->Supplier_models->editSupplierData();
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function hapus($id)
        {
            $this->Supplier_models->hapusSupplier($id);
            echo json_encode(array("status" => true));
        }
    }