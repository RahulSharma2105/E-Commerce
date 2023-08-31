<?php
    class admin_model extends CI_Model{
        public function admin_login($data){
                $this->db->get('admin',$data);
                $this->db->where($data);
            
        }
    }
?>