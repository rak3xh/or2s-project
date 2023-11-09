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
                <div class="rajat">
                    <span class="material-symbols-outlined">
                    credit_card
                    </span>
                    <p>Debit Card</p>

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
                <div class="rajat" id="onit">
                    <span class="material-symbols-outlined">
                    currency_rupee
                    </span>
                    <p>UPI / BHIM</p>

                    <span class="material-symbols-outlined">
                    chevron_right
                    </span>
                </div>
            </a>


        </div>


        <!-- ----------------------------------------------------------------------------------- -->

        <form action="">


            <h3 class="title">Payment Through UPI / BHIM</h3>

            <div id="upi">
                <div class="btn" id="paytm"> <img class="upi" src="images/paytm_logo.jpeg" alt=""></div>
                <div class="btn" id="phonepay"> <img class="upi" src="images/phonepe_logo.jpeg" alt=""></div>
                <div class="btn" id="gpay"> <img class="upi" src="images/gpay.png" alt=""></div>
                <div class="btn" id="amazonpay"> <img class="upi" src="images/amazon.png" alt=""></div>
                <div class="btn" id="applepay"> <img class="upi" src="images/apple.png" alt=""></div>
            </div>

            <div id="first1">
                <img id="firstimg" src="https://glinstrument.com/wp-content/uploads/2020/06/qr-code.gif" alt="">
            </div>
            <!-- -----------------------------paytm------------------------ -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span id="close">&times;</span>
                    <div class="floating"><img id="qr" src="images/paytmqr.jpg" alt=""></div>

                    <span class="material-symbols-outlined">
                                        arrow_upward
                                        </span>
                    <h1 class="texts">Scan the above QR in your Paytm Application</h1>
                </div>
            </div>
            <!-- ------------------------phonepay--------------------------------- -->
            <div id="myModal1" class="modal">
                <div class="modal-content">
                    <span id="close1">&times;</span>
                    <div class="floating"><img id="qr" src="images/phonepay qr.jpg" alt=""></div>

                    <span class="material-symbols-outlined">
                                        arrow_upward
                                        </span>
                    <h1 class="texts">Scan the above QR in your Phone Pay Application</h1>
                </div>
            </div>
            <!-- ---------------------------------gpay------------------------------------- -->
            <div id="myModal2" class="modal">
                <div class="modal-content">
                    <span id="close2">&times;</span>
                    <div class="floating"><img id="qr" src="images/gpayqr.jpg " alt=""></div>

                    <span class="material-symbols-outlined">
                                        arrow_upward
                                        </span>
                    <h1 class="texts">Scan the above QR in your Google Pay Application</h1>
                </div>
            </div>
            <!-- ---------------------------------amazonpay------------------------------------- -->
            <div id="myModal3" class="modal">
                <div class="modal-content">
                    <span id="close3">&times;</span>
                    <div class="floating"><img id="qr" src="images/amazonqr.jpg" alt=""></div>

                    <span class="material-symbols-outlined">
                                        arrow_upward
                                        </span>
                    <h1 class="texts">Scan the above QR in your Amazon Pay Application</h1>
                </div>
            </div>
            <!-- ---------------------------------applepay------------------------------------- -->
            <div id="myModal4" class="modal">
                <div class="modal-content">
                    <span id="close4">&times;</span>
                    <div class="floating"><img id="qr" src="images/qrcode_chrome.png" alt=""></div>

                    <span class="material-symbols-outlined">
                                        arrow_upward
                                        </span>
                    <h1 class="texts">Scan the above QR in your Apple Pay Application</h1>
                </div>
            </div>



            <button class="submit-btn"> <a href="confirmed.php">proceed to checkout</a></button>
            <!-- <a class="submit-btn" href="/confirmed.html">proceed to checkout</a> -->

        </form>

    </div>

</body>

</html>

<script src="UPI.js"></script>