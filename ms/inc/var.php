<?php
$user_name		=	$_SESSION['nm'];
$as				=	$_SESSION['status'];
$dlist_qry		=	mysql_query("select * from tbl_dealer") or die(mysql_error());
$stock_qry		=	mysql_query("select * from tbl_stock") or die(mysql_error());
$dealer			=	mysql_query("select * from tbl_dealer") or die(mysql_error());
$user_liar		=	mysql_query("select * from tbl_user where status=0") or die(mysql_error());

$tmp_bill_qry		=	mysql_query("select * from tbl_tmp_bill where purchase=1 or pr=1") or die(mysql_error());
$tmp_bill			=	mysql_num_rows($tmp_bill_qry);

while($amount		=	mysql_fetch_array($tmp_bill_qry))
{
	$cnt		+=	$amount['total_amount'];	
	}

$rqry	=	mysql_query("select * from tbl_tmp_bill") or die(mysql_error());
$rp		=	mysql_fetch_assoc($rqry);
$purch	=	$rp['purchase'];
$purch_r=	$rp['pr'];	
	

//sales, sales_return
$sale_bill_qry		=	mysql_query("select * from tbl_tmp_bill where sale=1 or sr=1") or die(mysql_error());
$sale_bill			=	mysql_num_rows($sale_bill_qry);

while($sl		=	mysql_fetch_array($sale_bill_qry))
{
	$sle		+=	$sl['total_amount'];	
	}
	
$ssqry	=	mysql_query("select * from tbl_tmp_bill") or die(mysql_error());
$ssrp		=	mysql_fetch_assoc($ssqry);
$sales	=	$rp['sale'];
$sales_r=	$rp['sr'];	
	
	
date_default_timezone_set('Asia/Karachi');
$c_date			=	date("d-m-Y h:i:s A");
$date_search	=	date("d-m-Y");


while($data1	=	mysql_fetch_assoc($stock_qry)){
					
					$with_bonus			+=	$data1['total_bill'];
			 		$without_bonus		+=  $data1['without_bonus']; 
					
					
				} 
				
				
							$ts_report	=	mysql_query("select * from tbl_bills_no where date_search='$date_search' && sale=1") or die(mysql_error());	
							$chk		=	mysql_num_rows($ts_report);
							echo $tdate;
							while($ts_data = mysql_fetch_array($ts_report)){
	
							$t_sale		+=	$ts_data['total_bill'];
							$t_disc		+=	$ts_data['c_disc'];
							$after_disc	+=	$ts_data['c_bill_total'];
							$t_profit	+=	$ts_data['profit'];
	
							}
							
							$sr_query = mysql_query("select * from tbl_bills_no where date_search='$date_search' && sr=1") or die(mysql_error());	
							while($sr = mysql_fetch_assoc($sr_query)){
								$r_bill	=	$sr['total_bill'];
								}
								
								
							$p_query = mysql_query("select * from tbl_bills_no where date_search='$date_search' && purchase=1") or die(mysql_error());	
							while($p = mysql_fetch_assoc($p_query)){
								$pt	+=	$p['total_bill'];	
								}
								
							$preturn_query = mysql_query("select * from tbl_bills_no where date_search='$date_search' && pr=1") or die(mysql_error());	
							while($p_return = mysql_fetch_assoc($preturn_query)){
								$r_p	=	$p_return['total_bill'];
								}	
								
								$tbl_bils		=	mysql_query("select * from tbl_bils where id=1") or die(mysql_error());	
								$bils_data		=	mysql_fetch_assoc($tbl_bils);
								$hnm			=	$bils_data['hname'];
								$hno			=	$bils_data['hno'];
								$rnm			=	$bils_data['ryts'];
								$rno			=	$bils_data['ryts_no'];
				
			
?>