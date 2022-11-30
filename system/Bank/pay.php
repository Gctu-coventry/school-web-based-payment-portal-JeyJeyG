<?php
session_start();
        include 'config.php';
        $token = $_SESSION['api_key'];

        
        $name = $_SESSION['username'];
        $grand_total = $_POST['grand_total'];
        $initial = $_SESSION['initial'];
        
        // $X = intval($grand_total);
        // $y = intval($initial);
        // $balance = $y - $X  ;
        $identify = $_SESSION['Accountid'];
        
        
       

        //Merchant info
        $sql3 = "SELECT * FROM users WHERE token = '$token'";
        $results3 = mysqli_query($conn,$sql3);
        if($results3){
           $row= mysqli_fetch_array($results3);
           $_SESSION['username'] = $row['username'];
           $_SESSION['email'] = $row['email'];
           $_SESSION['initial'] = $row['initial'];
           $mer_initial = $_SESSION['initial'];
           $mer_email = $_SESSION['email'];
           $mer_username = $_SESSION['username'];

           $a = intval($grand_total);
           $b = intval($mer_initial);
           $merchant_balance = $b + $a;

           $sql4 = "UPDATE users SET initial = '$merchant_balance' WHERE  token ='$token'";
            $update3 = mysqli_query($conn,$sql4);
           $set = "true";
            $trn_date = date("Y-m-d H:i:s");
           

                $sql ="INSERT into transaction (user, tr_date,  reciever, amount) 
                VALUES('$identify', '$trn_date', '$mer_email', '$grand_total')";
                $results = mysqli_query($conn,$sql);

           
           

        }else{
            $set = "false";

        }
$sql16 = "SELECT * FROM users WHERE Accountid = '$identify'";

$result6 = mysqli_query($conn,$sql16);
if($result6) {
    $update4 = mysqli_query($conn, $sql16);
    $row= mysqli_fetch_array($result6);
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['initial'] = $row['initial'];
    $user_initial = $_SESSION['initial'];
    $a = intval($grand_total);
    $z = intval($user_initial);
    $user_balance = $z - $a;
    $m = $_SESSION['email'];
    $sql5 = "UPDATE users SET initial = '$user_balance' WHERE  email ='$m'";
    $update5 = mysqli_query($conn,$sql5);


}else{

}





echo $set;




