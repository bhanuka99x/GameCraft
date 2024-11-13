
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing and Payment Form</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <div class="container">
        <form action="pay.html" method="post">
            <div class="row">
                <div class="col" style="margin: 0px 50px">
                    <h3 class="title">Billing Address</h3>

                    <div class="inputBox">
                        <span>Full Name:</span>
                        <input type="text" placeholder="John Doe" required autocomplete="name">
                    </div>

                    <div class="inputBox">
                        <span>Email:</span>
                        <input type="email" placeholder="johndoe@gmail.com" required autocomplete="email">
                    </div>

                    <div class="inputBox">
                        <span>Address:</span>
                        <input type="text" placeholder="Room - Street - Locality" required autocomplete="address-line1">
                    </div>

                    <div class="inputBox">
                        <span>City:</span>
                        <input type="text" placeholder="Colombo" required autocomplete="address-level2">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>State:</span>
                            <input type="text" placeholder="Sri Lanka" required autocomplete="address-level1">
                        </div>

                        <div class="inputBox">
                            <span>Zip Code:</span>
                            <input type="text" placeholder="123 456" required autocomplete="postal-code">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3 class="title">Payment</h3>

                    <div class="inputBox">
                        <span>Cards Accepted:</span>
                        <img src="images/card_img.png" alt="Accepted cards">
                    </div>

                    <div class="inputBox">
                        <span>Name on Card:</span>
                        <input type="text" placeholder="John Doe" required autocomplete="cc-name">
                    </div>

                    <div class="inputBox">
                        <span>Credit Card Number:</span>
                        <input type="text" placeholder="1111-2222-3333-4444" required autocomplete="cc-number" pattern="\d{4}-\d{4}-\d{4}-\d{4}">
                    </div>

                    <div class="inputBox">
                        <span>Exp Month:</span>
                        <input type="text" placeholder="January" required autocomplete="cc-exp-month">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Exp Year:</span>
                            <input type="text" placeholder="2024" required autocomplete="cc-exp-year">
                        </div>

                        <div class="inputBox">
                            <span>CVV:</span>
                            <input type="text" placeholder="123" required autocomplete="cc-csc">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Proceed to Checkout" class="submit-btn">
        </form>
    </div>
</body>

</html>
