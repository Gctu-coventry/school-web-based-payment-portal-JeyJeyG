<?php
    include 'config.php';
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
            <li><a href="#about">transactions</a></li>
            <li><a href="AccountCreat.php">Open Account</a></li>
           
            <li><a href="logout.php">Log out</a></li>



        </ul>
    </nav>
     <?php
    function generatekey() {
        $keylength = 8;
        $str = "abc123456789";
        $randStr = substr(str_shuffle($str), 0, $keylength);
        return $randStr;


    }
    echo generatekey();

    ?> 
  <form action="AccountCreat_inc.php" method="post">

      <input type="hidden" value="<?php echo  generatekey() ; ?>" name= "Accountid">
      <input type="text" name = "Accountholder" placeholder = "Enter your fullname">
      <input type="text" name = "balance" placeholder = "Enter your Account Balance">
      <button type = "submit" name = "submit">Create Account</button>
  </form>
    
</body>
</html>