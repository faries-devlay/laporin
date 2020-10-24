<?php
    
    class Pembelian_model extends CI_Model{

        public function getSupplierToSelect()
        {
            return $this->db->get('supplier')->result();
        }
        public function getSupplierToSelectCat()
        {
            return $this->db->get('category')->result();
        }
        public function getSupplierToSelectSat()
        {
            return $this->db->get('satuan')->result();
        }
        public function getMaxId()
        {
            $kodeJadi = '';
            if (isset($_SESSION['detail_beli']) == true) {
                $kd = [];
                foreach ($_SESSION['detail_beli'] as $key) {
                    $kd[] = $key['kd_barang'];
                }
                if ($kd != null) {
                    $kodeJadi = max($kd);
                }
                $str = substr($kodeJadi,5,4);
                $kdFix = intval($str);
                $kdFix++;
                $kodeJadi = "BRGOT".sprintf('%04s',$kdFix);
            }
            else{
            $this->db->select('RIGHT(barang.barang_kd,4) as kode_barang',false);
            $this->db->order_by('barang_kd','DESC');
            $this->db->limit(1);
            $query =  $this->db->get('barang');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_barang)+1;
            }
            else {
                $kode = 1;
            }

            $maxCode = str_pad($kode,4,'0',STR_PAD_LEFT);
            $kodeJadi = "BRGOT".$maxCode;
            }
        return $kodeJadi;
        }
        public function insertDatapembelian()
        {
            $data=[
                'no_faktur'=>$this->session->userdata('no_faktur'),
                'tgl_transaksi' =>$this->session->userdata('tgl_transaksi'),
                'supplier_id'=>$this->session->userdata('supplier'),
                'user_id'=>$this->session->userdata('user_id'),
                'total_pembelian'=>$this->input->post('ttl_belanja'),
                'bayar'=>$this->input->post('bayar')
            ];
            $this->db->insert('pembelian',$data);
            return $this->db->insert_id();
            // return;
        }

        public function insertDataBarang()
        {
            foreach ($_SESSION['detail_beli'] as $kode => $barang) {
                $data = [
                    'barang_kd'=> $barang['kd_barang'],
                    'barang_name'=> $barang['nama_barang'],
                    'berat'=> $barang['berat_barang'],
                    'category_id'=> $barang['kategori_barang'],
                    'satuan_id'=> $barang['satuan_barang'],
                    'harga_beli'=> $barang['harga_barang'],
                    'stok'=> $barang['jumlah_barang'],
                ];
                $this->db->insert('barang',$data);
            }
            // return;
        }
        public function insertDetailPembelian($insert_id)
        {
            foreach ($_SESSION['detail_beli'] as $kode => $barang) {
                $total = $barang['jumlah_barang'] * $barang['harga_barang'];
                $data=[
                    'pembelian_id'=>$insert_id,
                    'barang_kd'=>$barang['kd_barang'],
                    'jumlah'=>$barang['jumlah_barang'],
                    'total_beli'=>$total
                ];
                $this->db->insert('detail_pembelian',$data);
            }
        }
    }