<?php 
        require APPPATH.'views/razorpay/razorpay-php/Razorpay.php';
        use Razorpay\Api\Api;
    

    class home extends CI_Controller{

        public function home(){
            
            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $product_list=$this->tester_model->product_list();
            $product_list2=$this->tester_model->product_list2();
            $this->load->view('home',['product_list'=>$product_list,'product_list2'=>$product_list2,'count_cart'=>$count_cart]);

        }
        
        public function shop(){

            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $product_list=$this->tester_model->product_list();
            $product_list2=$this->tester_model->product_list2();
            $this->load->view('shop',['product_list'=>$product_list,'product_list2'=>$product_list2,'count_cart'=>$count_cart]);

        }

        public function about(){
            
            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $this->load->view('about',['count_cart'=>$count_cart]);
        }

        public function contact(){
            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $this->load->view('contact',['count_cart'=>$count_cart]);
        }


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                        /* Register Account */
        public function register(){
    
            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $this->form_validation->set_rules('fname','Name','required');
            $this->form_validation->set_rules('lname','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run()== false){
               $this->load->view('register',['count_cart'=>$count_cart]);
            }
            else{
                $data=array();
                $data['fname']=$this->input->post('fname');
                $data['lname']=$this->input->post('lname');
                $data['email']=$this->input->post('email');
                $data['mobile']=$this->input->post('mobile');
                $data['address']=$this->input->post('address');
                $data['password']=$this->input->post('password');
                $this->tester_model->create_data($data);
                $this->session->set_flashdata('success','Record added successfully!');
                redirect(base_url().'index.php/home/home');
            }

        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                    /*  Product Details */
        public function sproduct($product_id){
            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $product_list=$this->tester_model->product_details($product_id);
            $product_list2=$this->tester_model->product_list2();
            $wish_count=$this->tester_model->wish_count_model();
            $this->load->view('sproduct',['product'=>$product_list,'count_cart'=>$count_cart,'wish_count'=>$wish_count,'product_list2'=>$product_list2]);
        }

        public function login(){
            /*if ($this->session->userdata('id')){
               redirect(base_url().'index.php/home/home');
            }*/

            $this->load->model('tester_model');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run()){
                $email=$this->input->post('email');
                $password=$this->input->post('password');

                $account=$this->tester_model->check_login($email,$password);

                if($account != NULL){
                    $_SESSION['cid']=$account->id;
                    $_SESSION['fname']=$account->fname;
                    $_SESSION['email']=$account->email;
                    redirect(base_url().'index.php/home/shop');
                }else{
                    $this->session->set_flashdata('fail_login','Please check your email and password');
                    redirect(base_url().'index.php/home/login');
                }

            }else{
                $this->load->view('login');
            }
        }

        public function logout(){
            $this->session->unset_userdata('id');
            $this->session->sess_destroy();
            return redirect(base_url().'index.php/home/home');
        }

        /*public function login_currectly()
        {
            $this->load->model('tester_model');
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

           $data = $this->tester_model->user_login($email, $pass);
           $count = count($data);
        //    echo $count; die;
        if($count>0){
            echo "<script>alert('You Are Sucessfully Login !!')</script>";
            	echo "<script>location.href='shop'</script>";
        }else{
            echo "<script>alert('Oopos Login Faild !!')</script>";
            echo "<script>location.href='login'</script>";
        }
        }*/

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            /* Add To Cart */
        public function add_to_card(){
            $this->load->model('tester_model');

            $user_id=$this->session->userdata('cid');
            $product_id=$this->input->post('id');
            $product_name=$this->input->post('name');
            $product_price=$this->input->post('price');
            $product_size=$this->input->post('size');
            $product_quantity=$this->input->post('quantity');
            $product_img=$this->input->post('image');

            $cart_product=$this->db->select('*')
                                    ->from('cart')
                                    ->where('user_id',$user_id)
                                    ->where('product_id',$product_id)
                                    ->get()
                                    ->row();

            if($cart_product== ''){
                
                $data=array(
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'product_name' =>$product_name,
                    'product_img'=>$product_img,
                    'product_size'=>$product_size,
                    'product_quantity' => $product_quantity,
                    'product_price' => $product_price
                );
                $this->db->insert('cart',$data);

            }else{
                $qnty=$cart_product->product_quantity+$product_quantity;
                $price =$product_price*$qnty;

                $data =array(
                    'product_quantity' => $qnty,
                    'product_price' =>$price
                );

                $this->db->where(['user_id' => $user_id, 'product_id'=>$product_id]);
                $this->db->update('cart',$data);
            }
        }
        public function cart(){

            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            //echo '<pre>'; print_r($count_cart); die;
            $product_list=$this->tester_model->product_cart_list();
            $price_count=$this->tester_model->total_amount();
            $this->load->view('cart',['cart_product'=>$product_list,'price_count'=>$price_count,'count_cart'=>$count_cart]);
        }


        public function delete($id){
            $this->db->where('cart_id',$id)
                    ->delete('cart');
            return redirect(base_url().'index.php/home/cart');
        }


        public function checkout(){
            $this->load->model('tester_model');
            $product_list=$this->tester_model->product_cart_list();
            $price_count=$this->tester_model->total_amount();
            $this->load->view('cart_checkout',['cart_product'=>$product_list,'price_count'=>$price_count]);
 
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                               /* UPDATE PART MY PROFILE */

        function edit($userId){
            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $user=$this->tester_model->getUser($userId);
            //echo '<pre>'; print_r($user); die;

            $this->form_validation->set_rules('fname','Name','required');
            $this->form_validation->set_rules('lname','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run()== false){
                $this->load->view('my_profile',['count_cart'=>$count_cart,'udata'=>$user ]);
            }else{
                //Update
                $formArray=array();
                $formArray['fname']=$this->input->post('fname');
                $formArray['lname']=$this->input->post('lname');
                $formArray['email']=$this->input->post('email');
                $formArray['mobile']=$this->input->post('mobile');
                $formArray['address']=$this->input->post('address');
                $formArray['password']=$this->input->post('password');
                $this->tester_model->updateUser($userId,$formArray);
                $this->session->set_flashdata('success','Record Update');
                redirect(base_url().'index.php/home/home');

            }    
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                                /*Wish list */

        public function wish_add(){
            $this->load->model('tester_model');
            
            $user_id=$this->session->userdata('cid');
            $product_id=$this->input->post('id');
            $product_name=$this->input->post('name');
            $product_price=$this->input->post('price');
            $product_img=$this->input->post('image');

            

            $wish_product=$this->db->select('*')
                                    ->from('wish_list')
                                    ->where('user_id',$user_id)
                                    ->where('product_id',$product_id)
                                    ->get()
                                    ->row();

            

            if($wish_product== ''){
                
                $data=array(
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'product_name' =>$product_name,
                    'product_img'=>$product_img,
                    'product_price' => $product_price
                );
                
              $this->db->insert('wish_list',$data);
            

            }
        }
        public function wish_list(){

            $this->load->model('tester_model');
            $count_cart=$this->tester_model->cart_count_model();
            $product_list=$this->tester_model->product_wish_list();
            $this->load->view('wish_list',['wish_product'=>$product_list,'count_cart'=>$count_cart]);
        }


        public function wish_delete($id){
            $this->db->where('wish_id',$id)
                    ->delete('wish_list');
            return redirect(base_url().'index.php/home/wish_display');
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                     /* Delivery Address */
        
        public function delivery(){

            $this->load->model('tester_model');

            $count_cart=$this->tester_model->cart_count_model();
            $product_list=$this->tester_model->product_cart_list();
            $price_count=$this->tester_model->total_amount();
         

           // echo print_r($product_details); die;
           //echo print_r($product_list); die;


            $this->form_validation->set_rules('total','Total','required');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('city','City','required');
            $this->form_validation->set_rules('state','State','required');
            $this->form_validation->set_rules('zip','Zip','required');
            if($this->form_validation->run()== false){
               $this->load->view('delivery',['cart_product'=>$product_list,'price_count'=>$price_count,'count_cart'=>$count_cart]);
            }
            else{
                $data=array();
                $data['user_id']=$this->session->userdata('cid');
                $data['total']=$this->input->post('total');
                $data['name']=$this->input->post('name');
                $data['mobile']=$this->input->post('mobile');
                $data['address']=$this->input->post('address');
                $data['city']=$this->input->post('city');
                $data['state']=$this->input->post('state');
                $data['zip']=$this->input->post('zip');
                $this->tester_model->delivery_address($data);
                $data_order=array();
                $data_order['price_subtotal']=$this->input->post('total');
                $data_order['user_id']=$this->input->post('user_id');
                $data_order['product_id']=$this->input->post('product_id');
                $data_order['name']=$this->input->post('product_name');
                $data_order['image']=$this->input->post('product_img');
                $data_order['price']=$this->input->post('product_single_price');
                $data_order['quantity']=$this->input->post('product_quantity');
                $this->tester_model->delivery_product($data_order);
                redirect(base_url().'index.php/home/bill');
            }

            
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                /* Bill */

        public function bill(){

            $id=$this->session->userdata('cid');
            $this->load->model('tester_model');
            $this->session->set_userdata('id',$id);
            $customerdata=$this->tester_model->pay($id);

            $this->load->view('payment_bill',['customerdata'=>$customerdata]);
        }

        
        public function checkout1(){
            $this->load->model('payment_model');
            $key_id='rzp_test_0wt3dsidcfkv2N';
            $secret ='w6HzsMO4aErkPTZXF6vzgQVo';
            $payment=$this->input->post('payment');
            $api = new Api($key_id, $secret);
            $order=$api->order->create(
                ['receipt' => 'order_rcptid_11',
                 'amount' => $payment*100, 
                 'currency' => 'INR'
                 ]);

                 
                 $id=$this->session->userdata('id');
                 $customerdata=$this->payment_model->pay($id);
                 $this->load->view('razorpay-checkout',['customerdata'=>$customerdata,'order'=>$order,'key'=>$key_id,'secret'=>$secret]);         
        }
        public function payment_status(){
            $this->load->model('tester_model');
            $customerdata=$this->tester_model->pay();
            $this->load->view('payment_status',['customerdata'=>$customerdata]);
            
        }
    }
?>