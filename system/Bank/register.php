<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	
	
	$accountid = $_POST['Accountid'];
	$holder_name = $_POST['holder_name'];
	$initial_deposit = $_POST['_name'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$initial = $_POST['initial'];
	$token = $_POST['token'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (acc_id ,acc_name, holder_name, initial_deposit, password)
					VALUES ('$accountid' '$password', '$initial', '$token')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - hirunatech</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<?php
    function generatekey() {
        $keylength = 8;
        $str = "123456789";
        $randStr = substr(str_shuffle($str), 0, $keylength);
        return $randStr;


    }
    
	?>
	<?php
 
 //Generate a random string.
 $token = openssl_random_pseudo_bytes(16);
  
 //Convert the binary data into hexadecimal representation.
 $token = bin2hex($token);
  
 
 ?>
	<
	<input type="hidden" value="<?php echo  generatekey() ; ?>" name= "Accountid">
	<input type="hidden" value="<?php echo  $token ; ?>" name= "token">
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<input type="number" placeholder="Enter your initial balance" name="initial" value="<?php echo $_POST['initial']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>