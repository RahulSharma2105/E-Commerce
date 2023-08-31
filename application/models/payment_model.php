<?php 
    class  payment_model extends CI_Model{

        public function pay($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            $query=$this->db->get('test');
            return $query->row();
        }
    }
?>