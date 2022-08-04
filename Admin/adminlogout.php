<?php
session_start();
unset($_SESSION["aid"]);
header("location:adminlogin.php");
exit();
?>