<?php

    class Kategori_model extends CI_Model{


        public function getAllKategori()
        {
            return $this->db->get('category')->result();
        }
        public function setDataModel($id)
        {
            $data = $this->db->get_where('category',['category_id' => $id]);
            return $data->row_array();
        }
        public function insertCategoryData()
        {
            $data = [
                'category' => $this->input->post('kategori_name',true)
            ];

            $this->db->insert('category',$data);
        }
        public function updateCategoryData()
        {
            $data = [
                'category' =>$this->input->post('kategori_name',true)
            ];
            $this->db->where('category_id',$this->input->post('category_id'));
            $this->db->update('category',$data);
        }
        public function deleteCategoryData($id)
        {
            // $this->db->where();
            $this->db->delete('category',['category_id'=>$id]);
        }
    }