<?php
include "config.php";

session_start();
$fees = $_SESSION['total'];
$initial = $_SESSION['initial'];
$account_no = $_SESSION['Accountid'];
if(!isset($_SESSION['api_key'])){
    header('location: unauthorized.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>checkout page</title>
</head>
<body>
<div class="container">
    <form action="" method="POST" class="login-email">

        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Checkout</p>


        <div class="input-group">
            <h2><?php echo "Total Amount : GH₵" . $fees; ?></h2>
        </div>



        <div class="input-group">
            <button name="submit" type="submit" class="btn" onclick="login();">Pay with MoneyFirst bank</button>
        </div>
        <div class="input-group">
            <a href="cancel.php" type="submit"  name="submit"  class="btn2" >Cancel payment</a>
        </div>

    </form>
</div>
</body>
</html>
<script>



    function login(){

        $(".login-email").replaceWith
        ("<div class='login-email'><h2>MoneyFirst Login</h2>\
            <div class='error'></div>\
            <div class=''>\
				<input type='email' placeholder='Email' name='email' value=''>\
			</div>\
            <div class=''>\
				<input type='password' placeholder='password' name='password' value=''>\
			</div>\
            <div class=''>\
				<button class='button' onclick='log();'>Login to Bank</button>\
			</div>\
            </div>\
            ")

    }
    function log(){
        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();
        if(email != ''){
            var formData = {email: email, password: password};
            $.ajax({url: 'check.php', type:'POST',data: formData, dataType: "text", success: function(response){
                    switch (response){
                        case 'true':
                            $('.login-email').replaceWith("<div class='login-email'> <?php echo "Account number " . $account_no . " your initial balance GH₵" . $initial . ". GH₵" . $fees . " will be deducted from your main Account"?>
                                <button class='button' onclick='payment();'>PAY</button>\
                        </div>\
						")
                            break;
                        case 'false':
                            $('.error').replaceWith("<div> ERROR invalid email/password combination </div>")
                            break;



                    }
                }



            });

        }


    }

    function payment(){
        var initial = <?= $initial?>;
        var grand_total = <?= $fees?>;
        var formdata = {initial: initial,grand_total: grand_total};
        if(initial > grand_total){
            $.ajax({
                type: "POST",
                url: "pay.php",
                data: formdata,
                dataType: "text",
                success: function (response) {
                    console.log(response);

                    switch(response){
                        case "true":
                            $('.login-email').replaceWith("<div>Payment Successful</div>")
                            setTimeout( window.open('finish_payment.php'),2000)
                            window.location.replace("http://localhost/php/shopghana/index.php")
                            break;
                        case "false":
                            $('.login-email').replaceWith("Payment failed")
                            break;


                    }

                }
            });

        }else{
            $('.error').replaceWith("<div> payment failed/insufficient balance </div>")



        }

    }


</script>