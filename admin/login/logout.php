<?php
session_start();
unset($_SESSION["dangnhap_admin"]);
header("location: login.php");

?>