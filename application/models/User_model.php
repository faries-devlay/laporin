<?php

    class User_model extends CI_Model{

        public function getuserData()
        {
            $data = [
                'username' => $this->input->post('username',true),
                'password' => $this->input->post('password',true)
            ];
            $user = $this->db->get_where('user',$data);
            if ($user->num_rows()) {
                $found = $user->row();
            }
            else{
                $found = null;
            }
            return $found;
        }
    }