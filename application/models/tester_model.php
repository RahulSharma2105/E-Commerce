<?php 
    class tester_model extends CI_Model{
        public function create_data($data){
            return $this->db->insert('test',$data);
        }


        function login_data($data){
            $this->db->get('test',$data);
            $this->db->where($data);
        
        }
    

    function check_login($email, $pass)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        return $this->db->from('test')->get()->row();
    }
//Reload to home and shop
    public function product_list(){
        return $this->db->select('*')
                        ->from('product_details')
                        ->where('Catagory','t-shirt')
                        ->get()
                        ->result();


    }
    public function product_list2(){
        return $this->db->select('*')
                        ->from('product_details')
                        ->where('Catagory','1')
                        ->get()
                        ->result();


    }

    public function product_full_details(){
        return $this->db->select('*')
                        ->from('product_details')
                        ->get()
                        ->row();
    }
//product-----to-------- sproduct
    public function product_details($product_id){
        return $this->db->select('*')
                        ->from('product_details')
                        ->where('product_id',$product_id)
                        ->group_by("catagory")
                        ->get()
                        ->row();
    }


    public function cart_count_model(){
        return $this->db->select('*')
                        ->from('cart')
                        ->where('user_id',$this->session->userdata('cid'))
                        ->get()
                        ->num_rows();
    }

    public function product_cart_list(){
        return $this->db->select('*')
                        ->from('cart')
                        ->where(['user_id' => $this->session->userdata('cid')])
                        ->get()
                        ->result();
    }

    public function total_amount(){
        return $this->db->select('SUM(product_price) AS amount')
                        ->where('user_id',$this->session->userdata('cid'))
                        ->group_by("user_id")
                        ->get('cart')
                        ->row();
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function agetuser($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $q = $this->db->get('tester');
        $result = $q->result_array();
        return $result;
    }

    /////////////////////////////////////////////////////

    function getUser($userId){
        $this->db->select('*');
        $this->db->where('id',$userId);
        return $user=$this->db->get('test')->row_array();
    }

    function updateUser($userId,$formarray){
        $this->db->where('id',$userId);
        $this->db->update('test',$formarray);
    }


    /////////////////////////////*************************************************//////////////////////////////////
    /* Wish list */

    public function wish_count_model(){
        return $this->db->select('*')
                        ->from('wish_list')
                        ->where('user_id',$this->session->userdata('cid'))
                        ->get()
                        ->num_rows();
    }

    public function product_wish_list(){
        return $this->db->select('*')
                        ->from('wish_list')
                        ->where(['user_id' => $this->session->userdata('cid')])
                        ->get()
                        ->result();
    }

    ///////////////////////////////////////////**************************************///////////////////////////////////////////////////////
                                            /* delivery add with total */
                                            
    public function delivery_address($data){
        return $this->db->insert('order',$data);
    }

    public function delivery_product($data_order){
        return $this->db->insert('order_product',$data_order);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function pay(){
        $this->db->select('*');
       
        $query=$this->db->get('order');
        return $query->row();

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            /* Session Cart */
 
}    
?>