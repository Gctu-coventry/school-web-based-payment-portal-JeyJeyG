<?php 
    session_start();
    $_SESSION['api_key'] = $_POST['api_key'];
    $_SESSION['total'] = $_POST['total'];


    $response = "true";
echo $response;
?>