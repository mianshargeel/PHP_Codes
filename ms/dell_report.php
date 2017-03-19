<?php include "inc/connect.php";

if($_GET['rid']){
$rid	=	$_GET['rid'];	
$dell	=	mysql_query("delete from tbl_bills_no where pr_bill_no='$rid'") or die(mysql_error());
if($dell){
	$dell1	=	mysql_query("delete from tbl_bills where pr_bill_no='$rid'") or die(mysql_error());
	}
if($dell1){echo "<script>history.go(-1);</script>";}	
	}
	
	
	elseif
	($_GET['prid']){
$rid	=	$_GET['prid'];	
$dell	=	mysql_query("delete from tbl_bills_no where bill_no='$prid'") or die(mysql_error());
if($dell){
	$dell1	=	mysql_query("delete from tbl_bills where bill_no='$prid'") or die(mysql_error());
	}
if($dell1){echo "<script>history.go(-1);</script>";}	
	}


	elseif
	($_GET['sid']){
$rid	=	$_GET['sid'];	
$dell	=	mysql_query("delete from tbl_bills_no where sale_bill_no='$sid'") or die(mysql_error());
if($dell){
	$dell1	=	mysql_query("delete from tbl_bills where sale_bill_no='$sid'") or die(mysql_error());
	}
if($dell1){echo "<script>history.go(-1);</script>";}	
	}
	
	
		elseif
	($_GET['srid']){
$rid	=	$_GET['sid'];	
$dell	=	mysql_query("delete from tbl_bills_no where sr_bill_no='$srid'") or die(mysql_error());
if($dell){
	$dell1	=	mysql_query("delete from tbl_bills where sr_bill_no='$srid'") or die(mysql_error());
	}
if($dell1){echo "<script>history.go(-1);</script>";}	
	}
	
?>