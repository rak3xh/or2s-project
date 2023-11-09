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
                <div class="rajat" id="onit">
                    <span class="material-symbols-outlined">
                    account_balance
                    </span>
                    <p>Internet Banking</p>

                    <span class="material-symbols-outlined">
                    chevron_right
                    </span>
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

            <div class="two">



                <div class="one">

                    <h3 class="title">Select your Bank</h3>

                    <h5>Popular Banks</h5>

                    <div id="mainC">
                        <!-- <input type="radio" class="radio"> -->
                        <div class="lol" id="first" onclick="changeStyle1()">
                            <img src="images/axisbank.png" alt="">
                        </div>
                        <div class="lol" id="sec" onclick="changeStyle2()">
                            <img src="images/hdfc.png" alt="">
                        </div>
                        <div class="lol" id="third" onclick="changeStyle3()">
                            <img src="images/kotak.png" alt="">
                        </div>
                        <div class="lol" id="four" onclick="changeStyle4()">
                            <img src="images/sbi.png" alt="">
                        </div>
                    </div>

                    <h5>All Banks</h5>
                    <div id="bank">
                        <Select id="banks">
                    <option value="==Select your Bank==">==Select Other Banks==</option>
                    <option value="">UCO Bank</option>
                    <option value="">Panjab National Bank</option>
                    <option value="">State Bank of India</option>
                    <option value="">ICICI Bank</option>
                    <option value="">IDFC Bank</option>
                    <option value="">Bharat Bank</option>
                    <option value="">Paytm Payment Bank</option>
                    <option value="">Bharat Bank</option>
                    <option value="">Bank of Boroda</option>
                    <option value="">Yes Bank</option>
               </Select>
                    </div>


                </div>

                <div id="three">

                </div>


            </div>

            <button class="submit-btn"> <a href="confirmed.php">proceed to checkout</a></button>

            <div id="lmao"></div>

        </form>

    </div>

</body>

</html>

<!-- 
<script>
    // function changeStyle1(){
    //     var element = document.getElementById("first");
    // //     element.style.backgroundColor = "#00FF00";
    // //     element.style.border="red";
    // // }
    // function changeStyle2(){
    //     var element = document.getElementById("sec");
    //     // element.style.backgroundColor = "#00FF00";
    //     // element.style.border="red";
    // }
    // function changeStyle3(){
    //     var element = document.getElementById("third");
    //     // element.style.backgroundColor = "#00FF00";
    //     // element.style.border="red";
    // }
    // function changeStyle4(){
    //     var element = document.getElementById("four");
    //     // element.style.backgroundColor = "#00FF00";
    //     // element.style.border="red";
    // }

    </script> -->