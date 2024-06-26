<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="price">
            <h1>Awesome, that's $99.99!</h1>
        </div>
        <div class="card__container">
            <div class="card">
                <div class="row paypal">
                    <div class="left">
                        <input id="pp" type="radio" name="payment" />
                        <div class="radio"></div>
                        <label for="pp">Paypal</label>
                    </div>
                    <div class="right">
                        <img src="http://i68.tinypic.com/2rwoj6s.png" alt="paypal" />
                    </div>
                </div>
                <div class="row credit">
                    <div class="left">
                        <input id="cd" type="radio" name="payment" />
                        <div class="radio"></div>
                        <label for="cd">Debit/ Credit Card</label>
                    </div>
                    <div class="right">
                        <img src="http://i66.tinypic.com/5knfq8.png" alt="visa" />
                        <img src="http://i67.tinypic.com/14y4p1.png" alt="mastercard" />
                        <img src="http://i63.tinypic.com/1572ot1.png" alt="amex" />
                        <img src="http://i64.tinypic.com/2i92k4p.png" alt="maestro" />
                    </div>
                </div>
                <div class="row cardholder">
                    <div class="info">
                        <label for="cardholdername">Name</label>
                        <input placeholder="e.g. Richard Bovell" id="cardholdername" type="text" />
                    </div>
                </div>
                <div class="row number">
                    <div class="info">
                        <label for="cardnumber">Card number</label>
                        <input id="cardnumber" type="text" pattern="[0-9]{16,19}" maxlength="19" placeholder="8888-8888-8888-8888" />
                    </div>
                </div>
                <div class="row details">
                    <div class="left">
                        <label for="expiry-date">Expiry</label>
                        <select id="expiry-date">
                            <option>MM</option>
                            <option value="1">01</option>
                            <!-- Remaining options -->
                        </select>
                        <span>/</span>
                        <select id="expiry-year">
                            <option>YYYY</option>
                            <option value="2016">2016</option>
                            <!-- Remaining options -->
                        </select>
                    </div>
                    <div class="right">
                        <label for="cvv">CVC/CVV</label>
                        <input type="text" maxlength="4" placeholder="123" />
                        <span data-balloon-length="medium" data-balloon="The 3 or 4-digit number on the back of your card." data-balloon-pos="up">i</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="button">
            <button type="submit"><i class="ion-locked"></i> Confirm and Pay</button>
        </div>
    </div>
</body>

</html>
