<?php

    class SettingBarang extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library("form_validation");
            $this->load->model("Setting_model");
        }

        public function index()
        {
            $data['title'] = "Setting Harga || Laporin";
            $data['list_harga'] = $this->Setting_model->getHargaPerBarang();
            $data['get_barang'] = $this->Setting_model->getDataBarangs();
            $data['get_Harga'] = $this->Setting_model->getDataHargas();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('barang/setting',$data);
            $this->load->view('templates/footer');
        }
        public function setData($kd){

            $data = $this->Setting_model->getBarang($kd);
            $async = [
                'barang' => $data->barang_kd,
                'name' => $data->barang_name,
                'stok' => $data->stok,
                'harga' => $data->harga_beli
            ];
            echo json_encode($async);
        }
        public function tambah()
        {
            $tambah=[
                'status'=>false,
                'msg'=>[],
            ];
            $this->form_validation->set_rules('set_nama_harga','Nama','trim|required');
            $this->form_validation->set_rules('set_jumlah_harga','Jumlah','required|numeric|trim');
            $this->form_validation->set_rules('set_harga','Harga','required|trim|numeric');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            if ($this->form_validation->run() == false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $this->Setting_model->insertDataHarga();
                $tambah['status'] = true;
            }

            echo json_encode($tambah);
        }
        public function setHarga($id)
        {
            $harga = $this->Setting_model->getHarga($id);
            $data= [
                'nama_barang'=>$harga->barang_name,
                'name'=>$harga->name,
                'jumlah'=>$harga->jumlah,
                'jual'=>$harga->harga_jual
            ];
            echo json_encode($data);
        }
    }