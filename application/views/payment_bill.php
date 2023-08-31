<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h4>Payment Gateway</h4>
        <hr>
        <p>Customer First Name: <?php echo $customerdata->name;?></p>
        <p>Customer Mobile: <?php echo $customerdata->mobile;?></p>
        <p>Customer Address: <?php echo $customerdata->address;?></p>
        <p>Total Amount:  Rs-   <?php echo $customerdata->total;?>

        <form action="<?php echo base_url('index.php/home/checkout1');?>" method="post">
                <input type="hidden" name="payment" value="<?php echo $customerdata->total;?>">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="" class="btn btn-primary">
            </div>

           

        </form>
</body>
</html>