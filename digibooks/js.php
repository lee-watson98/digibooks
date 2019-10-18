
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
<script
    src="https://www.paypal.com/sdk/js?client-id=sb">
  </script>

  <script>
 paypal.Buttons({
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: '<?php echo $_SESSION['total_price']?>'
        }
      }]
    });
  },
  onApprove: function(data, actions) {
    // Capture the funds from the transaction
    return actions.order.capture().then(function(details) {
      // Show a success message to your buyer
      alert('Transaction successful.');
      window.location.replace("thankyou.php?tx=4&amt=5&cc=GBP&st=completed");
    });
  }
}).render('#paypal-button-container');
 </script>
