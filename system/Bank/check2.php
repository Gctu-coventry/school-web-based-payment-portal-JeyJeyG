<?php
include 'config.php';
session_start();


$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $set = "true";
    $_SESSION['username'] = $row['username'];
    $_SESSION['Accountid'] = $row['Accountid'];
    $_SESSION['initial'] = $row['initial'];
    $identify = $_SESSION['Accountid'];
    $grand_total = $_SESSION['total'];
    $fees = $_SESSION['fees_owing'];
    $initial = $_SESSION['initial'];
    if($initial>$grand_total)
    {




        $X = intval($grand_total);
        $y = intval($initial);
        $balance = $y - $X  ;
        $sql = "UPDATE  users SET initial = '$balance' WHERE 	Accountid ='$identify'";
        $update = mysqli_query($conn,$sql);
    }else{
        echo "balance insufficient";
    }



} else {
    $set = "false";
}


echo $set;
?>