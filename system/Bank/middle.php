<?php
include 'config.php';
session_start();
$token = $_SESSION['api_key'];
$grand_total = $_SESSION['total'];



$result = mysqli_query($conn,"SELECT * FROM users WHERE token = '$token'");
$num = mysqli_num_rows($result);
if($num >= 1) {
    $row = mysqli_fetch_assoc($result);
     
     echo "token valid";
     header('location: checkout.php');
     $_SESSION['username'] = $row['username'];
     $_SESSION['Accountid'] = $row['Accountid'];
     $_SESSION['initial'] = $row['initial'];
} else {
    // do other stuff...
    echo "token invalid";
}
?>