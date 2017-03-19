<?php
include "inc/connect.php";
$s_id	=	$_GET['s_id'];
$dell	=	mysql_query("delete from tbl_stock where stock_id='$s_id'") or die(mysql_error());
if($dell){header("Location:plist.php");}
?>