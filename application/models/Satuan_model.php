<?php

    class Satuan_model extends CI_Model{

        public function getAllSatuan()
        {
            return $this->db->get('satuan')->result();
        }
        public function setDataSatuan($id)
        {
            $data = $this->db->get_where('satuan',['satuan_id' => $id]);
            return $data->row_array();
        }
        public function insertSatuanmodel()
        {
            $data = [
                'satuan' => $this->input->post('satuan_name',true)
            ];

            $this->db->insert('satuan',$data);
        }
        public function updateSatuanModel()
        {
            $data = [
                'satuan' => $this->input->post('satuan_name',true)
            ];
            $this->db->where('satuan_id',$this->input->post('satuan_id'));
            $this->db->update('satuan',$data);
        }
        public function deleteSatuanModel($id)
        {
            $this->db->delete('satuan',['satuan_id'=>$id]);
        }
    }