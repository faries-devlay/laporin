<?php

    class Penjualan extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Penjualan_model');
        }
        public function index()
        {
            
            date_default_timezone_set("Asia/Jakarta");
            $data['title'] = "Penjualan || Laporin";
            $data['date'] = date('d - M - Y');
            $data['max_kode'] = $this->Penjualan_model->getMaxKode();
            $data['barang'] = $this->Penjualan_model->getBarang();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('penjualan/penjualan',$data);
            $this->load->view('templates/footer');
        }
        public function getSelect($Kd)
        {
            $items = $this->Penjualan_model->getItem($Kd);
            $price = $this->Penjualan_model->getPrices($Kd);
            $data = [
                'name'=>$items->barang_name,
                'berat'=>$items->berat,
                'satuan'=>$items->satuan,
                'kategori'=>$items->category,
                'prices'=>$price
            ];
            echo json_encode($data);
        }
        public function checkHarga()
        {
            $price = $this->Penjualan_model->checkTtlHarga();
            
            echo json_encode($data);
        }
    }