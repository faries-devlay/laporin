<?php

    class Barang_model extends CI_Model{

        public function getDataBarang()
        {
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('satuan','satuan.satuan_id = barang.satuan_id','inner');
            $this->db->join('category','category.category_id = barang.category_id','inner');
            $data = $this->db->get();
            return $data->result();
        }
        
        public function getDataSatuan()
        {
            return $this->db->get('satuan')->result();
        }
        public function getDataKategori()
        {
            return $this->db->get('category')->result();
        }
        public function setDataBarang($id)
        {
            $hasil = $this->db->get_where('barang',['barang_kd'=>$id]);
            return $hasil->row();
        }
        public function kdOtomatis()
        {
            $this->db->select('RIGHT(barang.barang_kd,4) as kd_barang',false);
            $this->db->order_by('barang_kd','DESC');
            $this->db->limit(1);
            $query = $this->db->get('barang');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kd_barang)+1;
            }
            else {
                $kode = 1;
            }

            $maxCode = str_pad($kode,4,'0',STR_PAD_LEFT);
            $kodeJadi = "BRGOT".$maxCode;
            return $kodeJadi;
        }
        public function setKode()
        {
            $kode = $this->kdOtomatis();
            return $kode;
        }
        public function insertDataBarang()
        {
            
            $data = [
                'barang_kd'=>$this->input->post('input_kd',true),
                'barang_name'=>$this->input->post('input_nama',true),
                'berat'=>$this->input->post('input_berat',true),
                'category_id'=>$this->input->post('input_kategori',true),
                'satuan_id'=>$this->input->post('input_satuan',true),
                'harga_beli'=>$this->input->post('input_harga_beli',true),
                'stok'=>$this->input->post('input_jumlah',true),
            ];
            $this->db->insert('barang',$data);
        }
        public function updateDataBarang()
        {
            $data = [
                'barang_name'=>$this->input->post('input_nama',true),
                'berat'=>$this->input->post('input_berat',true),
                'category_id'=>$this->input->post('input_kategori',true),
                'satuan_id'=>$this->input->post('input_satuan',true),
                'harga_beli'=>$this->input->post('input_harga_beli',true),
                'stok'=>$this->input->post('input_jumlah',true)
            ];
            $this->db->where('barang_kd',$this->input->post('input_kd',true));
            $this->db->update('barang',$data);
        }
        public function hapusDataBarang($id)
        {
            $this->db->where('barang_kd',$id);
            $this->db->delete('barang');
        }
    }