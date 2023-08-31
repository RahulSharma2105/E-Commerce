<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Ecom</title>
</head>
<body>
<section id="header">
        <a href="#"><img src="<?php echo base_url();?>assets/Image/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a  href="<?php echo base_url().'index.php/home/home'?>">Home</a></li>
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
                            <li><a class="active" href="<?php echo base_url().'index.php/home/register'?>">Register</a></li>
                            <li><a href="<?php echo base_url().'index.php/home/login';?>">Login</a></li>
                <?php }?>
                
                <li><a href="<?php echo base_url().'index.php/home/cart'?>">(<?php echo $count_cart;?>)<i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="section-body">
        <div class="container">
            <form  method="post" >
                <h1>Register</h1>
                <div class="contant">
                    <div class="input-box">
                        <label for="">First Name: </label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo set_value('fname');?>" required>
                    </div>
                    <div class="input-box">
                        <label for="">Last Name: </label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo set_value('lname');?>" required>
                    </div>
                    <div class="input-box">
                        <label for="">Email: </label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email');?>" required>
                    </div>
                    <div class="input-box">
                        <label for="">Mobile: </label>
                        <input type="number" class="form-control" name="mobile" placeholder="Mobile" value="<?php echo set_value('mobile');?>" requiredr>                 
                    </div>
                    <div class="input-box">
                        <label for="">Address: </label>
                        <input type="text" class="form-control" name="address" placeholder="Address"  value="<?php echo set_value('Address');?>" required>                  
                    </div>
                    <div class="input-box">
                        <label for="">Password: </label>
                        <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password');?>" required>
                    </div>
                    <div class="input-box">
                        <input  class="btn" type="submit"  name="submit" id="submit">
                    </div>
                    
                        <h5>Already have an account ?</h5>
                        <li><a href="<?php echo base_url().'index.php/home/login';?>">LogIn</a></li>
                
                </div>
            </form>
        </div>
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
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
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
            <a href="<?php echo base_url().'index.php/home/register'?>">Sign In</a>
            <a href="#">View Cart</a>
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