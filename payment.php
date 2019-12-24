<?php
    
    // include header and title
    include 'header.php';
    echo '<title>Payment Getway</title>';
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
            <h2>Please Confirm your Payment</h2>
            <div id="pay-btn"></div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AcuwmzsQeEPfdANx8HCFtOTOLq98E4iHnR-PL3aB020Bt34IitqpDMnipkfft8fbsp7NRWjMTWq25kST"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                    value: '0.01'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by '+ details.payer.name.given_name);
                // Call your server to save the transaction
                return fetch('paypal_transaction_complete.php', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                });
            });
        }
        
    }).render('#pay-btn');
</script>
<?php
	include 'footer.php';
?>
</body>