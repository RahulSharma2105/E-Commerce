
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/Home.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Ecom</title>
    <style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    .img{
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 100px;
    }
    .new{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
    </style>
</head>
<body>
<section id="header">
        <a href="#"><img src="<?php echo base_url();?>assets/Image/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a  class="active" href="<?php echo base_url().'index.php/home/home'?>">Home</a></li>
                <li><a href="<?php echo base_url().'index.php/home/shop'?>">Shop</a></li>
                <li><a href="<?php echo base_url().'index.php/home/about'?>">About</a></li>
                <li><a href="<?php echo base_url().'index.php/home/contact'?>">Contact</a></li>
                <?php  if($this->session->userdata('cid')){?>
                    <li><a href="#"><?php echo $this->session->userdata('fname');?></a>
                        <ul class="dropdown">
                            <li><a href="<?php echo base_url().'index.php/home/edit/'.$this->session->userdata('cid')?>">My Profile</a></li>
                            <li><a href="<?php echo base_url().'index.php/home/wish_list'?>">Wish List</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url().'index.php/home/logout'?>">Logout</a></li>
                        <?php } else{?>
                            <li><a href="<?php echo base_url().'index.php/home/register'?>">Register</a></li>
                            <li><a href="<?php echo base_url().'index.php/home/login';?>">Login</a></li>
                <?php }?>
                <li><a href="<?php echo base_url().'index.php/home/cart'?>">(<?php echo $count_cart;?>)<i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>
<?php  if($this->session->userdata('cid')){?>
<section>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Delete</th>
                </tr>
               <?php
                    if(count($cart_product)>0){
                        
                        foreach($cart_product as $cart){
                    ?>
                            <tr>
                                <td>
                                    <img  class="img" src="<?php echo base_url();?>assets/Image/product/<?php echo $cart->product_img;?>" alt="">
                                </td>
                                <td><?php echo $cart->product_name;?></td>
                                <td><?php echo $cart->product_quantity;?></td>
                                <td><?php echo $cart->product_size;?></td>
                                <td><?php echo $cart->product_price/$cart->product_quantity;?></td>
                                <td><?php echo $cart->product_price;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/home/delete/<?php echo $cart->cart_id;?>" 
                                    class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php        
                        }
                    }
               ?>
               <?php
                    if($price_count !=''){?>
                        <tr class="new" style="text-align:right;">
                            <td>Total Amount</td>
                            <td>RS. <?php echo $price_count->amount;?></td>
                        </tr>
                <?php }
                ?>
            </table>
            <a href="<?php echo base_url();?>index.php/home/delivery" class="btn btn-warning">Place Order</a>
        </div>
    </div>
</section>
<?php } else {?>

 <section id="section-body">
        <div class="container">
            <img src="<?php echo base_url();?>assets/Image/cart_empty.jpg" class="center" alt="">
            <h4 style="text-align:center;" >Login to see the items you added previously</h4>
        </div>
    </section>
<?php } ?>


<style>
    
    
    ul li{
        display: inline-block;
        position: relative;
    }

    ul li a{
        display: block;
        padding: 20px 7px;
        color: #000;
        text-decoration: none;
        text-align: center;
        font-size: 20px;
        font-weight:bold;
    }

    ul li ul.dropdown li {
        display: block;
    }
    ul li ul.dropdown{
        width:100%;
        background: #e2e4ec;
        position: absolute;
        z-index: 999;
        display: none; 
    }
    
    ul li:hover ul.dropdown{
        display: block;
    }
</style>
</body>
</html>
