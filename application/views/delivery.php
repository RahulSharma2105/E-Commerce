
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/Home.css">

    <title>Ecom</title>
</head>
<body>
     <section id="header">
        <a href="#"><img src="<?php echo base_url();?>assets/Image/logo.png" class="logo" alt=""></a>
    </section>
    <section>
      <div>
            <h3>Product details</h3>
            <table class="table table-striped">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
               <?php
                    if(count($cart_product)>0){
                        
                        foreach($cart_product as $cart){
                    ?>
                            <tr>
                                <td><?php echo $cart->product_name;?></td>
                                <td><?php echo $cart->product_quantity;?></td>
                                <td><?php echo $cart->product_size;?></td>
                                <td><?php echo $cart->product_price/$cart->product_quantity;?></td>
                                <td><?php echo $cart->product_price;?></td>
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
      </div>
    </section>
<section>
  <h3 align="center">Delivery Address</h3>
  <div class="container-fluid p-5">
  <form method="post" action="<?php echo base_url().'index.php/home/delivery';?>">
  <input type="hidden" name="total" value=" <?php echo $price_count->amount; ?>">
  <input type="hidden" name="user_id" value=" <?php echo $cart->user_id; ?>">
  <input type="hidden" name="product_id" value=" <?php echo $cart->product_id; ?>">
  <input type="hidden" name="product_name" value=" <?php echo $cart->product_name; ?>">
  <input type="hidden" name="product_img" value=" <?php echo $cart->product_img; ?>">
  <input type="hidden" name="product_single_price" value=" <?php echo $cart->product_price/$cart->product_quantity; ?>">
  <input type="hidden" name="product_quantity" value=" <?php echo $cart->product_quantity; ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo set_value('name');?>">
    </div>
    <div class="form-group col-md-6">
      <label for="mobile">Mobile</label>
      <input type="text" class="form-control" id="mobile" placeholder="Mobile" name="mobile" value="<?php echo set_value('mobile');?>">
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo set_value('address');?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city');?>">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" class="form-control" name="state" value="<?php echo set_value('name');?>">
        <option value="SelectState">Select State</option>
                        <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" name="zip" value="<?php echo set_value('zip');?>">
    </div>
  </div>
  <button type="submit" class="btn btn-warning">Delivery Here</button>
</form>
  </div>
</section>

</body>
</html>