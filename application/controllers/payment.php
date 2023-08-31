<?php

    require APPPATH.'views/razorpay/razorpay-php/Razorpay.php';
    use Razorpay\Api\Api;

    class payment extends  CI_Controller{

        public function bill(){
            $id=24;
            $this->load->model('tester_model');
            $this->session->set_userdata('id',$id);
            $customerdata=$this->tester_model->pay($id);
            $this->load->view('payment_bill',['customerdata'=>$customerdata]);
        }

        public function checkout(){
            $this->load->model('tester_model');
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
                 $customerdata=$this->tester_model->pay($id);
                 $this->load->view('razorpay-checkout',['customerdata'=>$customerdata,'order'=>$order,'key'=>$key_id,'secret'=>$secret]);

                 
                 
        }
        public function payment_status(){
            $this->load->view('payment_status');

        }

    }
?>