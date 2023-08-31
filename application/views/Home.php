
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/Home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Ecom</title>
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
                            <li><a href="<?php echo base_url().'index.php/home/login'?>">Login</a></li>
                <?php }?>
                <li><a href="<?php echo base_url().'index.php/home/cart'?>">(<?php echo $count_cart;?>)<i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="hero">
        <h4>Dhamaka Offer</h4>
        <h2>Super value deals</h2>
        <h1>Only for 3 days</h1>
        
        <p>Use coupon and save more than up to 50% in each item!  </p>
        <a href="<?php echo base_url().'index.php/home/shop'?>"><button>Shop Now</button></a>
        
    </section>

    <section id="feature" class="section-p1" >
        <div class="fe-box">
            <img src="#" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="#" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="#" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="#" alt="">
            <h6>Online Order</h6>
        </div>

    </section>

    <section id="product1" class="section-p1" >
        <h2>Feature Product</h2>
        <p> Collection Modern</p>
        <div class="pro-container">
        <?php foreach ($product_list as $product){?>
            <div class="pro"  onclick="window.location.href='<?php echo base_url();?>index.php/home/sproduct/<?php echo $product->product_id;?>'">
                <img src="<?php echo base_url();?>assets/Image/Product/<?php echo $product->product_img;?> ">
                <div class="des">
                    <span>Panjabi</span>
                    <h5><?php echo $product->product_name;?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Rs-<?php echo $product->product_price;?></h3>
                </div>
                <a href="#"><i class="fa-solid fa-cart-plus cart"></i></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <section id="banner" class=".section-m1">
        <h4>Accessories</h4>
        <h2>Up to <span> 80% Off </span>-  Mobile & Tablet</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrival</h2>
        <p>Panjabi</p>
        <div class="pro-container">
        <?php foreach ($product_list2 as $product){?>
            <div class="pro" onclick="window.location.href='<?php echo base_url();?>index.php/home/sproduct/<?php echo $product->product_id;?>'">
                <img src="<?php echo base_url();?>assets/Image/product/<?php echo $product->product_img;?>" alt="">
                <div class="des">
                    <span>Shirt</span>
                    <h5><?php echo $product->product_name;?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Rs: <?php echo $product->product_price;?></h3>
                </div>
                <a href="#"><i class="fa-solid fa-cart-plus cart"></i></a>
            </div>
            <?php } ?>
        </div>
    </section>
    <section id="feedback">
        <h2>FEEDBACK</h2>
        <h4>Visiting For Our Website Please Give Feedback For Our Services</h4>
        <textarea name="feedback" id="text" cols="100" rows="6"></textarea>
    </section>
    <footer class="section-p1">

        <div class="col">
            <img class="logo" src="<?php echo base_url();?>assets/Image/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> 372,Badshahi Road Sharma Para Burdwan</p>
            <p><strong>Phone:</strong> 980005579</p>
            <p><strong>Time:</strong> 10:30-16:00</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook "></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram "></i>
                    <i class="fab fa-linkedin"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="<?php echo base_url().'index.php/home/about'?>">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Terms & Conditions</a>
            <a href="<?php echo base_url().'index.php/home/contact'?>">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <?php  if($this->session->userdata('cid')){?>
                <p><?php echo $this->session->userdata('fname');?></p>
                <?php } else{?>
            <a href="<?php echo base_url().'index.php/home/register'?>">Sign In</a>
            <?php }?>
            <a href="<?php echo base_url().'index.php/home/cart'?>">View Cart</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <strong>Secured payment Gateways</strong>
            <img src="<?php echo base_url();?>assets/Image/Image.png" alt="">
        </div>

        <div class="copyright">
            <p><span>&copy;</span>Developed By Rahul Sharma 2023</p>
        </div>
    </footer>



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