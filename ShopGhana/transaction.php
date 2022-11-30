<?php
include 'config.php';
session_start();
$mer_email = $_SESSION['email'];

echo $mer_email;
$sql ="INSERT into transaction (sent_to, tr_date, user_id) 
VALUES('$mer_email', '$mer_email', '$grand_total')";
$results = mysqli_query($conn,$sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopGhana-transaction</title>
</head>
<body>
    

    
</body>
</html>