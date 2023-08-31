<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/Home.css">
</head>
<body>
    <div class="container">
        <form action="<?php echo base_url();?>index.php/home/login" method="post">

            <?php 
                if($error=$this->session->flashdata('fail_login')){
            ?>
                <p><?php echo $error;?></p>
            <?php    }
            ?>
            <h2>Log In</h2>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email"  class="form-control" name="email" >
                <?php echo form_error('email','<p style="color:red">','</p>');?>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" name="password">
                <?php echo form_error('password','<p style="color:red">','</p>');?>
            </div>
            <input class="btn" type="submit" value="submit">
        </form>
    </div>
</body>
</html>