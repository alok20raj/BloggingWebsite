<?php
session_start();
if(!isset($_SESSION["email"])){
header("Location: login2.php");
exit(); }
?>