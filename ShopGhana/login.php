<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or 
    die('query failed');

    if(mysqli_num_rows($select) > 0){
       

        $row = mysqli_fetch_assoc($select);
       
         $_SESSION['user_id'] = $row['id'];
        header('location:index.php');


        



    }else{
        $message[] = 'incorrect password/email combination';
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Ghana</title>
    <link rel="stylesheet" href="css/a.css">
</head>
<body>
    <?php
        // if(isset($message)){
        //     foreach($message as $message){
        //         echo '<div class="message" onclick="this.remove();">' .$message.' </div> ';

        //     }
        // }

    ?>
    <div class="container">
    <form action="" method="post">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">ShopGhana</p>
        <h3 class="reg">Login</h3>
        <div class="input-group">
        <input type="text" name = "email" placeholder = "Enter your email">
        </div>
        <div class="input-group">
        <input type="password" name = "password" placeholder = "Enter your password">
        </div>
        
        <input type="submit" name = "submit" class = "btn" value ="Login">
        <p>don't have an account <a href="register.php">Register now</a></p>
    </form>
    </div>
    
</body>
</html> -->

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ShopGhana Form</title>
  <link rel="stylesheet" href="css/st.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>ShopGhana Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/st.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>ShopGhana Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="login">
				</form>
				<p> have an Account? <a href="register.php"> Register Now!</a></p>
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>
<!-- partial -->
  
</body>
</html>
