<!-- <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
    <button type="submit">Pay Now</button>

    <input type="hidden" name="public_key" value="FLWPUBK_TEST-b30dc0f94322cbf898b2a5331603cfe2-X" />
    <input type="hidden" name="tx_ref" value="bitethtx-019203" />
    <input type="hidden" name="amount" value="500" />
    <input type="hidden" name="currency" value="KES" />
    <input type="hidden" name="redirect_url" value="http://localhost/well-known/flutterwave/success.php/" />
    <input type="hidden" name="meta[token]" value="54" />
    <input type="hidden" name="customer[name]" value="Jesse Pinkman" />
    <input type="hidden" name="customer[email]" value="jessepinkman@walterwhite.org" />

 </form> -->
 

 <script src="https://checkout.flutterwave.com/v3.js"></script>

 <button type="button" onclick="makePayment()">Pay Now</button>

 <script>
     function makePayment() {
  FlutterwaveCheckout({
    public_key: "FLWPUBK_TEST-b30dc0f94322cbf898b2a5331603cfe2-X",
    tx_ref: "titanic-48981487343MDI0NzMx",
    amount: 5460,
    currency: "KES",
    payment_options: "card",

    callback: function(payment) {
        // Send AJAX verification request to backend
        verifyTransactionOnBackend(payment.id);
      },
      onclose: function(incomplete) {
        if (incomplete || window.verified === false) {
          document.querySelector("#payment-failed").style.display = 'block';
        } else {
          document.querySelector("form").style.display = 'none';
          if (window.verified == true) {
            document.querySelector("#payment-success").style.display = 'block';
          } else {
            document.querySelector("#payment-pending").style.display = 'block';
          }
        }
      },

    // redirect_url: "http://localhost/well-known/flutterwave/success.php/",
    meta: {
      consumer_id: 23,
      consumer_mac: "92a3-912ba-1192a",
    },
    customer: {
      email: "rose@unsinkableship.com",
      phone_number: "0710290934",
      name: "Rose DeWitt Bukater",
    },
    customizations: {
      title: "The Titanic Store",
      description: "Payment for an awesome cruise",
      logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
    },
  });

  function verifyTransactionOnBackend(transactionId) {
    // Let's just pretend the request was successful
    setTimeout(function() {
      window.verified = true;
    }, 200);
  }
}
</script>