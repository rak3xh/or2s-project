<!DOCTYPE html>
<html lang="en">
<title>
    Payment
</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/or2s/User/PAYMENT/images/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <h1 id="heading">
        <p id="text">

            PAYMENT GATEWAY OF OR2S</p>
    </h1>


    <div class="container">

        <!-- ------------------------------------------------------------------------ -->
        <div id="left">
            <h3 id="lefttop">Payment Type</h3>

            <a href="creditCard.php">
                <div class="rajat">
                    <span class="material-symbols-outlined">
                    credit_card
                    </span>
                    <p>Credit Card</p>
                </div>
            </a>

            <a href="DebitCard.php">
                <div class="rajat" id="onit">
                    <span class="material-symbols-outlined">
                    credit_card
                    </span>
                    <p>Debit Card</p>

                    <span class="material-symbols-outlined">
                    chevron_right
                    </span>
                </div>
            </a>


            <a href="Internet_Banking.php">
                <div class="rajat">
                    <span class="material-symbols-outlined">
                    account_balance
                    </span>
                    <p>Internet Banking</p>
                </div>
            </a>


            <a href="Upi_payment.php">
                <div class="rajat">
                    <span class="material-symbols-outlined">
                    currency_rupee
                    </span>
                    <p>UPI / BHIM</p>
                </div>
            </a>


        </div>


        <!-- ----------------------------------------------------------------------------------- -->

        <form action="">

            <div class="row">



                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" placeholder="abc xyz">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="Midnapore">
                    </div>

                    <!-- <div class="flex"> -->
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="West Bengal">
                    </div>
                    <!-- <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456">
                    </div> -->
                    <!-- </div> -->

                </div>

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="images/card_img1.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Card holder name:</span>
                        <input type="text" placeholder="abc xyz">
                    </div>
                    <div class="inputBox">
                        <span>Debit card number :</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2032">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="123">
                        </div>
                    </div>

                </div>

            </div>

            <button class="submit-btn"> <a href="confirmed.php">proceed to checkout</a></button>

        </form>

    </div>

</body>

</html>