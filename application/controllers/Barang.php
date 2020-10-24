<?php

    class Barang extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Barang_model');
        }
        public function index()
        {
            $data['title'] = "Barang || Laporin";
            $data['barang'] = $this->Barang_model->getDataBarang();
            $data['satuan'] = $this->Barang_model->getDataSatuan();
            $data['kategori'] = $this->Barang_model->getDataKategori();
            $data['otomatis'] = $this->Barang_model->setKode();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('barang/barang',$data);
            $this->load->view('templates/footer');
        }
        public function edit($id)
        {
            $data = $this->Barang_model->setDataBarang($id);
            echo json_encode($data);
        }
        public function tambah()
        {
            $data=[
                'status'=>false,
                'msg'=>[],
                'title'
            ];
            $this->form_validation->set_rules('input_nama','Nama','trim|required');
            $this->form_validation->set_rules('input_berat','Berat','required|numeric|trim');
            $this->form_validation->set_rules('input_satuan','Satuan','required|trim');
            $this->form_validation->set_rules('input_kategori','Kategori','required|trim');
            $this->form_validation->set_rules('input_harga_beli','Harga Beli','required|trim');
            $this->form_validation->set_rules('input_jumlah','Jumlah','required|trim');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $this->Barang_model->insertDataBarang();
                $data['title'] = 'Data Barang disimpan';
                $data['status'] = true;
            }
            echo json_encode($data);
        }

        public function ubah()
        {
            $data=[
                'status'=>false,
                'msg'=>[],
                'title'
            ];
            $this->form_validation->set_rules('input_nama','Nama','trim|required');
            $this->form_validation->set_rules('input_berat','Berat','required|numeric|trim');
            $this->form_validation->set_rules('input_satuan','Satuan','required|trim');
            $this->form_validation->set_rules('input_kategori','Kategori','required|trim');
            $this->form_validation->set_rules('input_harga_beli','Harga Beli','required|trim');
            $this->form_validation->set_rules('input_jumlah','Jumlah','required|trim');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $this->Barang_model->updateDataBarang();
                $data['title'] = 'Data Barang diUpdate';
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function hapus($id)
        {
            $this->Barang_model->hapusDataBarang($id);
            echo json_encode(['status' => true]);
        }
    }