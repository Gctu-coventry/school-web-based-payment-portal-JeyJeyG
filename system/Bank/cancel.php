<?php 

session_start();
session_destroy();

header("Location: http://localhost/php/ShopGhana/index.php");

?>