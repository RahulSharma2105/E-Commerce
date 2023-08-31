<?php 
    class admin extends CI_Controller{
        public function admin(){
            $this->load->view('admin/admin_sidebar');
            $this->load->view('admin/index');
        }

        public function add_product(){
            $this->load->view('admin/admin_sidebar');
            $this->load->view('admin/product_add');
        }
    }
?>