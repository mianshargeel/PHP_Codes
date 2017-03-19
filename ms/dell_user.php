<?php include "inc/connect.php";

if($_GET['u_id']){
$u_id	=	$_GET['u_id'];	
$dell	=	mysql_query("delete from tbl_user where uid='$u_id'") or die(mysql_error());
if($dell){header("Location:user_list.php");}	
	}elseif
	($_GET['d_id']){
		$d_id	=	$_GET['d_id'];
		$dell	=	mysql_query("delete from tbl_dealer where d_id='$d_id'") or die(mysql_error());
if($dell){header("Location:dealer_list.php");}
		}
?>