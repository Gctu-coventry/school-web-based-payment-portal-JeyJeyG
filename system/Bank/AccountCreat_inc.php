<?php
    include 'config.php';
    if(isset($_POST['submit'])){
    
    $Accoutid=$_POST['Accountid'];
    $Accountholder=$_POST['Accountholder'];
    $balance=$_POST['balance'];
    $sql="insert into account(Accountid ,Accountholder ,balance) values( '{$Accoutid}','{$Accountholder}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
               echo "<script> alert('Your Account has been created!');
                               window.location='welcome.php'; 
                     </script> "; 
                     
                    
    }else{
      echo "failed";
    }
  }
?>
