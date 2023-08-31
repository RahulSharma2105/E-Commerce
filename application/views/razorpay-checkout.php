<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?php echo $key;?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $order['amount']*100;?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "RJ Company", //your business name
    "description": "Test Transaction",
    "image": "<?php echo base_url();?>assets/Image/logo.png",
    "order_id": "<?php echo $order['id'];?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?php echo base_url('index.php/home/payment_status');?>",
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": "<?php echo $customerdata->fname;?>", //your customer's name
        "email": "<?php echo $customerdata->email;?>",
        "contact": "<?php echo $customerdata->mobile;?>" //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": " Rahul Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
document.getElementById('rzp-button1').click();
</script>