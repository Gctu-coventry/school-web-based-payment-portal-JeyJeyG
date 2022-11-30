<?php
session_start();

unset($_SESSION['total']);
unset($_SESSION['initial']);
unset($_SESSION['Accountid']);
unset($_SESSION['api_key']);
echo '<script>close();</script>';


?>