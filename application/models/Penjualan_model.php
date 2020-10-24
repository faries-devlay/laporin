<?php 

    class Penjualan_model extends CI_Model{

        public function getMaxKode()
        {
            $this->db->select('RIGHT(penjualan.kd_transaksi,5) as kode_penjualan');
            $this->db->order_by('kd_transaksi','DESC');
            $this->db->limit(1);
            $mykode = $this->db->get('penjualan');

            if ($mykode->num_rows()<>0) {
                $data = $mykode->row();
                $fixKode = intval($data->kode_penjualan)+1;
            }
            else{
                $fixKode = 1;
            }
            $maxCode = str_pad($fixKode,5,'0',STR_PAD_LEFT);
            $kodeJadi = "PJLOT".$maxCode;
            return $kodeJadi;
        }
        public function getBarang()
        {
            return $this->db->get('barang')->result();
        }
        public function getItem($kd)
        {
            $this->db->select("*");
            $this->db->from("barang");
            $this->db->join("category","category.category_id = barang.category_id","inner");
            $this->db->join("satuan","satuan.satuan_id = barang.satuan_id","inner");
            $this->db->where('barang.barang_kd',$kd);
            $data = $this->db->get();
            return $data->row();
        }
        public function getPrices($kd)
        {
            $prices = $this->db->get_where("harga",["barang_kd" => $kd]);
            return $prices->result();
        }
        public function checkTtlHarga()
        {
            $this->db->where("barang_kd",$this->input->post('kd',true));
            $hasil = $this->db->get("harga");
            return $hasil->result();
        }
    }