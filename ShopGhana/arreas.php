<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
};

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopGhana</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<div class="content">
    <img src="https://picsum.photos/300/300/?random" />
</div>

<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>


<?php
$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select_user) > 0){
    $fetch_user = mysqli_fetch_assoc($select_user);
};
?>
<p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
<p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
<p> email : <span></span> </p>



<h1 class="heading">Checkout Page</h1>

<table>
    <thead>
    <th>image</th>
    <th>name</th>
    <th>price</th>
    <th>quantity</th>
    <th>total price</th>
    <th>action</th>
    </thead>
    <tbody>
    <?php
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    $grand_total = 0;
    if(mysqli_num_rows($cart_query) > 0){
    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
    ?>
    <tr>
        <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
        <td><?php echo $fetch_cart['name']; ?></td>
        <td>$<?php echo $fetch_cart['price']; ?>/-</td>
        <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
        <?php
        $grand_total += $sub_total;
        }
        }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
        }
        ?>
    <tr class="table-bottom">
        <td colspan="4">grand total :</td>
        <td>$<?php echo $grand_total; ?>/-</td>
    </tr>

    <script>
        $(document).ready(function(){

            var api_key = '60229276326bcfb11c827035b653c13f';
            var total = <?=$fetch_user['fees_owing']?>;

            if(api_key != ''){
                var formData = {api_key: api_key, total: total};
                $.ajax({url: 'c_out.php', type:'POST',data: formData, dataType: "text", success: function(response){
                        console.log(response);
                        switch (response){
                            case 'true':
                                console.log('It is true')
                            <?php //header("Location: http://localhost/LifeLineBank/views/middle1.php" )?>
                                window.location.replace("http://localhost/php/system/Bank/middle1.php")
                                break;
                            case 'false':
                                $('.replaced').replaceWith("<div> ERROR</div>");
                                break;


                        }
                    }


                });

            }else{
                $('.replaced').append("<div>All fields are required</div>");

            }
        })
    </script>
</body>
</html>