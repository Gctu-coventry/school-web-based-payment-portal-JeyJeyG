<?php
include 'config.php';
session_start();
$account_id = $_SESSION['Accountid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="user.css">
</head>
<body>
<nav class="navbar">

        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="transaction.php">transactions</a></li>
            
           
            <li><a href="logout.php">Log out</a></li>



        </ul>
    </nav>


    <?php echo "<h1>Your transactions  " . $_SESSION['username'] . "</h1>"; ?>

    <div class="account_details">
       <div> <?php echo "Your account ID is " . $account_id; ?> </div> 
        <div>Your account current bank balance  is &#8373 <?php echo   $_SESSION['initial']; ?></div> 

    </div>
   
    <table class="content-table">
  <thead>
    <tr>
      <th>id</th>
      <th>Sent to</th>
      <th>amount</th>
      <th>Date of transaction</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
    

    $sql = "SELECT * FROM transaction WHERE user = '$account_id'";
    $query = mysqli_query($conn, $sql);
    while($fetch = mysqli_fetch_assoc($query)){
        echo "<tr><td>" . $fetch['id'] . "</td><td>" . $fetch['reciever']
         . "</td><td>" . $fetch['amount'] . "</td><td>" . $fetch['tr_date'] . "</td></tr>";
    } 
       
    

    ?>
   
    <tr>
      <td><?php  echo $fetch['id']; ?></td>
      <td><?php  echo $fetch['reciever']; ?></td>
        
      <td><?php  echo $fetch['amount'] . "<br>";?></td>
      
    </tr>
    
  </tbody>
</table>

    
</body>
</html>