<?php

    class Pembelian extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pembelian_model');
            $this->load->library('form_validation');
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
        }
        public function index()
        {
            $data['title'] = "Pembelian || Laporin";
            $data['supplier_data'] = $this->Pembelian_model->getSupplierToSelect();
            $data['kategoris'] = $this->Pembelian_model->getSupplierToSelectCat();
            $data['satuans'] = $this->Pembelian_model->getSupplierToSelectSat();
            $data['max'] = $this->Pembelian_model->getMaxId();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pembelian/pembelian',$data);
            $this->load->view('templates/footer');
        }
        public function simpanData()
        {
            $data =[
                "status" => false,
                "msg" =>[],
            ];
            $this->form_validation->set_rules('no_faktur','No Faktur','trim|required');
            $this->form_validation->set_rules('select_supplier','Pilih Supplier','trim|required');
            $this->form_validation->set_rules('tgl_tsk','Tanggal Transaksi','trim|required');
            $this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
            if ($this->form_validation->run() == false) {
                foreach($_POST as $key => $value){
                    $data['msg'][$key] = form_error($key);
                }
            }
            else {
                $sessi =[
                    "no_faktur" => $this->input->post('no_faktur',true),
                    "supplier" => $this->input->post('select_supplier',true),
                    "tgl_transaksi" => $this->input->post('tgl_tsk',true),
                    "pembelian" => true
                ];
                $this->session->set_userdata($sessi);
                $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function destroy()
        {
            $this->session->sess_destroy();
            redirect('pembelian');
        }
        public function tambahDetail()
        {
            $data =[
                "status" => false,
                "msg" =>[]
            ];
            $this->form_validation->set_rules('kd_barang','Kode Barang','trim|required');
            $this->form_validation->set_rules('nama_barang','Nama Barang','trim|required');
            $this->form_validation->set_rules('harga_barang','Harga Barang','trim|required|numeric');
            $this->form_validation->set_rules('satuan_barang','Satuan Barang','trim|required');
            $this->form_validation->set_rules('kategori_barang','Kategori Barang','trim|required');
            $this->form_validation->set_rules('berat_barang','Berat','trim|required|numeric');
            $this->form_validation->set_rules('jumlah_barang','Jumlah','trim|required|numeric|max_length[4]');
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            if ($this->form_validation->run() ==  false) {
                foreach ($_POST as $key => $value) {
                    $data['msg'][$key] = form_error($key);
                }
            }
            else{
                $detailSessi = [
                    'kd_barang' => $this->input->post('kd_barang',true),
                    'nama_barang' => $this->input->post('nama_barang',true),
                    'harga_barang' => $this->input->post('harga_barang',true),
                    'satuan_barang' => $this->input->post('satuan_barang',true),
                    'kategori_barang' => $this->input->post('kategori_barang',true),
                    'berat_barang' => $this->input->post('berat_barang',true),
                    'jumlah_barang' => $this->input->post('jumlah_barang',true)
            ];
            // array_push($this->session->set_userdata($detailSekali));
            // $this->session->set_userdata($detailSekali);
            $_SESSION['detail_beli'][] = $detailSessi;
            $data['status'] = true;
            }
            echo json_encode($data);
        }
        public function unset($id)
        {
            $myid = intval($id);
            unset(
                $_SESSION['detail_beli'][$myid]
            );
            redirect('pembelian');
        }
        public function selesai()
        {
            if ($this->session->userdata('pembelian') == true) {
                $insert_id = $this->Pembelian_model->insertDataPembelian();
                if (isset($_SESSION['detail_beli'])) {
                    $this->Pembelian_model->insertDataBarang();
                    $this->Pembelian_model->insertDetailPembelian($insert_id);
                    $data = ['title'=>'Berhasil','text' => 'Pembelian Disimpan','type'=>'success'];
                }
                else {
                    $data = ['title'=>'Gagal','text' => 'Masukkan Detail Barang','type'=>'warning'];
                    echo json_encode($data);
                    return;
                }
                $data = ['title'=>'Berhasil','text' => 'Pembelian Disimpan','type'=>'success'];
            }
            else {
                $data = ['title'=>'Gagal','text' => 'Masukkan Data Barang','type'=>'warning'];
                echo json_encode($data);
                return;
            }
            $session1=[
                'no_faktur','tgl_transaksi','supplier','pembelian'
            ];
            $this->session->unset_userdata($session1);
            unset($_SESSION['detail_beli']);
            echo json_encode($data);
        }
    }