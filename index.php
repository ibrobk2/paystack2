<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title></title>
    <style>
        body{
            background-color: whitesmoke;
        }
        .container{
            margin-top: 50px;
            width: 50%;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text text-center">Payment</h1><br>
        <form id="paymentForm">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email-address" required />
          </div><br>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="tel" id="amount"class="form-control"  required />
          </div><br>
          <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" id="first-name" />
          </div><br>
          <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control" id="last-name" />
          </div><br>
          <div class="form-submit">
            <button type="submit" class="form-control btn btn-success" onclick="payWithPaystack()"> Pay </button>
          </div>
        </form>
    </div>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_xxxx', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });

  handler.openIframe();
}
</script>
</body>
</html>