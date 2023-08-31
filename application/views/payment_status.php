<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 align='center'>Transaction Successful</h2>
    <div>
        <h3 align='center'>Order Details</h3>
            <div>
                <table>
                    <tr>
                        <td>Customer Name:<?php echo  $customerdata->name;?></td>
                    </tr>
                    <tr>
                    <td>Customer Mobile:<?php echo  $customerdata->mobile;?></td>
                    </tr>
                    <tr>
                    <td>Customer Address:<?php echo  $customerdata->address;?></td>
                    </tr>
                    <tr>
                    <td>Customer City:<?php echo  $customerdata->city;?></td>
                    </tr>
                    <tr>
                    <td>Customer State:<?php echo  $customerdata->state;?></td>
                    </tr>
                    <tr>
                        <td>Product Name:<?php echo $product_data->name;?></td>
                    </tr>
                    <tr>
                        <td>Product :<?php echo $product_data->name;?></td>
                    </tr>
                    <tr>
                        <td>Product Name:<?php echo $product_data->name;?></td>
                    </tr>
                    <tr>
                        <td>Product Name:<?php echo $product_data->name;?></td>
                    </tr>
                    <tr>
                        <td>Total: <?php echo $customerdata->total?></td>
                    </tr>
                </table>
            </div>
    </div>
</body>
</html>