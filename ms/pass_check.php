<?php
session_start();
if($_SESSION['signedin'] != "Successful"){header("Location:login.php");}
?>