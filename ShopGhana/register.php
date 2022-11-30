<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or 
    die('query failed');

    if(mysqli_num_rows($select) > 0){
        $message[] = '';

    }else {
        mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or 
        die('query failed');
        $message[] = 'Registration Sucessfull!!';
        header('location:login.php');



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
        <h3 class="reg">register</h3>
        <div class="input-group">
        <input type="text" name = "name" placeholder = "Enter your name">
        </div>
        <input type="text" name = "email" placeholder = "Enter your email">
        <div class="input-group">
        <input type="password" name = "password" placeholder = "Enter your password">
        </div>
        <div class="input-group">
        <input type="text" name = "cpassword" placeholder = "confirm password">
        </div>
        <div class="input-group">
        <input type="submit" name = "submit" class = "btn" value ="register now">
        </div>
        <p>Already have an account <a href="login.php">Login</a></p>
    </form>
    </div>
    
</body>
</html> -->

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ShopGhana</title>
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
<title>ShopGhana SignUp Form</title>
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
<?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message" onclick="this.remove();">' .$message.' </div> ';

            }
        }

    ?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>ShopGhana SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="name" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		
		<!-- //copyright -->
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
