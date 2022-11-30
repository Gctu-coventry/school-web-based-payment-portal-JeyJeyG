<?php 
include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$account_id = $_SESSION['Accountid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <link rel="stylesheet" href="style12.css">
</head>
<body>




    </form>
<div class="logo">
    <a href="#">XCEL--Student online bank</a>
    <div class="search_box">
        <input type="text" placeholder="Search EasyPay">
        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
    </div>
</div>

<div class="header-icons">
    <i class="fas fa-bell"></i>
    <div class="account">



    </div>
</div>
</header>
<div class="container">
    <nav>
        <div class="side_navbar">
            <span>Main Menu</span>
            <a href="#" class="active">Dashboard</a>
            <a href="../admin/Admin_addstudent.php">Profile</a>
            <a href="logout.php">Log out</a>
            <a href="#">Application</a>
            <a href="#">My Account</a>
            <a href="../inc/logout.php">logout</a>

            <div class="links">
                <span>Quick Link</span>
                <a href="#">Paypal</a>
                <a href="#">EasyPay</a>
                <a href="#">SadaPay</a>
            </div>
        </div>
    </nav>

    <div class="main-body">
        <h2>Dashboard</h2>
        <div class="promo_card">
            <h1>Welcome to Xcel</h1>
            <span><h4>User Details</h4></span>
            <span><?php echo "Username-- " . $_SESSION['username'] . "<br>"; ?></span>
            <span><?php echo "Account_id-- " . $_SESSION['Accountid'] . "<br>"; ?></span>

            <span><?php echo "bank_balance-- " . "$" . $_SESSION['initial'] . "<br>"; ?></span>
            <button>Learn More</button>
        </div>













        <div class="history_lists">
            <div class="list1">
                <div class="row">
                    <h4 class="mbs">View your Transactions</h4>
                    <a href="#">See all</a>
                </div>
                <table>

                    <tbody>
                    <tr>
                        <th>transactions id</th>
                        <th>reciecers email</th>
                        <th>Amount paid</th>
                        <th>Dte of transaction</th>

                    </tr>
                    <?php


                    $sql = "SELECT * FROM transaction WHERE user = '$account_id'";
                    $query = mysqli_query($conn, $sql);
                    while($fetch = mysqli_fetch_assoc($query)){
                    echo " ";




                    ?>

                    <tr>
                        <td><?php echo $fetch['id'];?></td>
                        <td><?php echo $fetch['reciever'];?></td>
                        <td><?php echo $fetch['amount'];?></td>
                        <td><?php echo $fetch['tr_date'];}?></td>


                    </tr>


                    </tbody>
</body>
</html>