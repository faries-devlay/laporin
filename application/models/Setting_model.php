<?php

    class Setting_model extends CI_Model{

        public function getDataBarangs()
        {
            $data = $this->db->get('barang');
            return $data->result();
        }
        public function getDataHargas()
        {
            $data = $this->db->get('harga');
            return $data->result();
        }
        public function getBarang($kd)
        {
            $data = $this->db->get_where('barang',['barang_kd' => $kd]);
            return $data->row();
        }
        public function insertDataHarga()
        {
            $data = [
                'name' => $this->input->post('set_nama_harga',true),
                'jumlah' => $this->input->post('set_jumlah_harga',true),
                'barang_kd' => $this->input->post('kd_harga',true),
                'harga_jual' => $this->input->post('set_harga',true),
                'laba' => $this->input->post('set_laba_harga',true)
            ];
            $this->db->insert("harga",$data);
        }
        public function getHargaPerBarang()
        {
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('harga','barang.barang_kd = harga.barang_kd','inner');
            return $this->db->get()->result();
        }
        public function getHarga($id)
        {
            $this->db->select('*');
            $this->db->from('harga');
            $this->db->join('barang','barang.barang_kd = harga.barang_kd','inner');
            $this->db->where('harga_id',$id);
            $query = $this->db->get();
            return $query->row();
        }
    }