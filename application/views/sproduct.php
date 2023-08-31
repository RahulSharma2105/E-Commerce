<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
                            <li><a href="<?php echo base_url().'index.php/home/login';?>">Login</a></li>
                <?php }?>
                <li><a href="<?php echo base_url().'index.php/home/cart'?>">(<?php echo $count_cart;?>)<i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo base_url();?>assets/Image/Product/<?php echo $product->product_img;?>" width="100%" id="MainImg" alt="">
            <div class="small-img-group">
              <!--  <div class="small-img-col">
                    <img src="<?php echo base_url();?>assets/Image/Product/<?php echo $product->product_img;?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo base_url();?>assets/Image/Product/grey.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo base_url();?>assets/Image/Product/red.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?php echo base_url();?>assets/Image/Product/sky.png" width="100%" class="small-img" alt="">
                </div>-->
        </div>
        </div>
        <div class="single-pro-details">
            <h6>Panjabi</h6>
            <h4><?php echo $product->product_name;?></h4>
            <?php if($product->discount==0){?>
                <h2>Rs: <?php echo $product->product_price;?></h2>
            <?php }else{?>
                <h4 style="color:#FF007F">Off-  <?php echo $product->discount;?>%</h4>
                <h3>RS- <S style="text-decoration-color: #ff0000aa;"><?php echo $product->product_price;?></S>      <?php echo $product->product_price-($product->product_price*$product->discount)/100;?></h3>
                    
            <?php }?>
            
            <?php if($this->session->userdata('cid')){?>
                    <button class="normal" onClick="javascript:wish_add(<?php echo $product->product_id;?>)"><i class="fa fa-heart" aria-hidden="true"></i></button>
                <?php } else{?>
                   <a href="<?php echo base_url().'index.php/home/login'?>"><button class="normal"><i class="fa fa-heart" aria-hidden="true"></i></button></a> 
                <?php } ?>
            <select name="size" class="products_size<?php echo $product->product_id;?>">
                <option value="">Select Size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
            <input type="hidden" name="product_id" class="products_id<?php echo $product->product_id;?>" value="<?php echo $product->product_id; ?>" >
            <input type="hidden" name="product_name" class="products_name<?php echo $product->product_id;?>" value="<?php echo $product->product_name; ?>" >
            <input type="hidden" name="product_price" class="products_price<?php echo $product->product_id;?>" value="<?php echo $product->product_price; ?>" >
            <input type="hidden" name="product_img" class="products_img<?php echo $product->product_id;?>" value="<?php echo $product->product_img; ?>" >
            <?php if($this->session->userdata('cid')){?>
                    <button class="normal" onClick="javascript:addtocart(<?php echo $product->product_id;?>)">Add To Cart</button>
                <?php } else{?>
                   <a href="<?php echo base_url().'index.php/home/login'?>"><button class="normal">Add To Cart</button></a> 
                <?php } ?>
            <h3>Product Details</h3>
            <span><?php echo $product->description?></span>
        </div>
    </section>

    <section id="product1" class="section-p1" >
        <div class="pro-container">
        <?php foreach ($product_list2  as $product ){?>
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

    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg =document.getElementsByClassName("small-img");
            smallimg[<?php echo $product->product_id;?>].onclick=function(){
                MainImg.src = smallimg[0].src;
            }
            smallimg[<?php echo $product->product_id;?>].onclick=function(){
                MainImg.src = smallimg[1].src;
            }
            smallimg[2].onclick=function(){
                MainImg.src = smallimg[2].src;
            }
            smallimg[3].onclick=function(){
                MainImg.src = smallimg[3].src;
            }

    </script>
    <script type="text/javascript">
        function addtocart(p_id){
            var id=$('.products_id'+p_id).val();
            var names=$('.products_name'+p_id).val();
            var name=names.replace(/[^a-zA-Z0-9 ]/g, '');
            var img=$('.products_img'+p_id).val();
            var price=$('.products_price'+p_id).val();
            var size=$('.products_size'+p_id).val();
            var quantity=1; 
            alert(id+'---'+name+'---'+price+'---'+img+'---'+quantity+'.....'+size);

            $.ajax({
                type:"POST",
                url:"<?php echo base_url('index.php/home/add_to_card');?>",
                data:{
                    id:id,
                    name:name,
                    price:price,
                    quantity:quantity,
                    image:img,
                    size:size
                },
                success: function(response){
                    alert('ADD IN YOUR CART');
                }
            });
        }

        function wish_add(p_id){
            var id=$('.products_id'+p_id).val();
            var names=$('.products_name'+p_id).val();
            var name=names.replace(/[^a-zA-Z0-9 ]/g, '');
            var img=$('.products_img'+p_id).val();
            var price=$('.products_price'+p_id).val();
            alert(id+'----'+name+"-------"+img+'---------'+price);
        $.ajax({
                type:"POST",
                url:"<?php echo base_url('index.php/home/wish_add');?>",
                data:{
                    id:id,
                    name:name,
                    price:price,
                    image:img
                },
                success: function(response){
                    alert('ADD IN YOUR CART');
                }
            });
        }
    </script>
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