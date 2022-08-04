<?php
session_start();
unset($_SESSION["mib"]);
header("location:login.php");
exit();
?>