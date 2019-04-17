<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.

// TODO: Insert your custom payment fields here.
?>

<script>
    jQuery(document).ready(function ($) {
        jQuery('#payment_method_khalti').on('click', function () {
            //jQuery('#place_order').hide();
        });
        if (!document.getElementById('payment_method_khalti').checked) {
            jQuery('#place_order').show();
            alert('show');
        }
    })
</script>
<script src="https://khalti.com/static/khalti-checkout.js"></script>
<!-- Place this where you need payment button -->
<button id="payment-button" style="background-color: #773292;color: #fff;border: none;padding: 5px 10px;border-radius: 2px;">Pay with Khalti</button>
<!-- Place this where you need payment button -->
<!-- Paste this code anywhere in you body tag -->
<script>
    var config = {
        // replace the publicKey with yours
        "publicKey": "<?php echo $this->public_key;?>",
        "productIdentity": "<?php echo $order_id;?>",
        "productName": "product",
        "productUrl": "url",
        "eventHandler": {
            onSuccess(payload) {
                // hit merchant api for initiating verfication
                //console.log(payload);
                var token = payload.token;
                var amount = payload.amount;
                window.location.href = '?token=' + token + '&amount=' + amount + '&order_id=' +<?php echo $order_id;?>;
            },
            onError(error) {
                console.log(error);
            },
            onClose() {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    //btn.onclick = function () {
    checkout.show({amount: <?php echo $tot;?>});
    //}
</script>