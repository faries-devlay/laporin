<?php

    class Supplier_models extends CI_Model{

        public function insertSupplierData()
        {
            $data = [
                "nip" => $this->input->post('nip',true),
                "supplier_name" => $this->input->post('supplier_name',true),
                "address" => $this->input->post('supplier_alamat',true),
                "telp" => $this->input->post('supplier_telp',true),
            ];
            $this->db->insert('supplier',$data);
        }
        public function editSupplierData()
        {
            $data = [
                "nip" => $this->input->post('nip',true),
                "supplier_name" => $this->input->post('supplier_name',true),
                "address" => $this->input->post('supplier_alamat',true),
                "telp" => $this->input->post('supplier_telp',true),
            ];
            $this->db->where('supplier_id',$this->input->post('supplier_id'));
            $this->db->update('supplier',$data);
        }
        public function getAllSupplier()
        {
            $query = $this->db->get('supplier');
            return $query->result_array();
        }
        public function setDataModel($id)
        {
            $data = $this->db->get_where('supplier',['supplier_id' => $id]);
            return $data->row_array();
        }
        public function hapusSupplier($id)
        {
            $this->db->where('supplier_id', $id);
            $this->db->delete('supplier');
        }
    }