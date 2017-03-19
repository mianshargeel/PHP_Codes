<?php $page = 14; include "pass_check.php"; include "inc/head.php"; 
$ses_id		=	session_id();
$billNo		=	mysql_query("SELECT sale_bill_no FROM tbl_bills where sale_bill_no != 0 OR sale_bill_no != '' ORDER by sale_bill_no DESC ") or die(mysql_error());
$no			=	mysql_fetch_array($billNo);
$b_no		=	$no['sale_bill_no'] + 1;

$tbl		=	mysql_query("select * from tbl_disc where bill_no='$b_no' && sr_bill_no=0");
$tbl_data	=	mysql_fetch_array($tbl);
$c_name1		=	$tbl_data['c_name'];
$c_paid1		=	$tbl_data['c_paid'];
$c_bill1		=	$tbl_data['c_bill'];

$c_disc1		=	$tbl_data['c_disc'];

$c_after_disc1	=	$tbl_data['after_disc'];
$c_return1		=	$tbl_data['c_return'];


if(isset($_POST['submit'])){
	
	if($c_paid1 == ""){echo "<script>alert('ERROR: Please Provide PAID amount first');</script>";}else{
	
	$tmp_qry	=	mysql_query("select * from tbl_tmp_bill where ses_id = '$ses_id' && sale=1") or die(mysql_error());
	while($t_data		=	mysql_fetch_array($tmp_qry)){
		
		$item_name		=		$t_data['item_name'];
		$item_type		=		$t_data['item_type'];
		$uname			=		$t_data['uname'];
		$dname			=		$t_data['dname'];
		$qty			=		$t_data['qty'];
		$bonus			=		$t_data['bonus'];
		$up				=		$t_data['up'];
		$tp				=		$t_data['tp'];
		$profit			=		$t_data['profit'];
		$discount		=		$t_data['discount'];
		$total_amount	=		$t_data['total_amount'];
		
		$total_bill		+=	$total_amount;
		$total_profit	+=	$profit;
		$final_disc		=	$total_profit - $c_disc1;
		
		
	
	$insert		=	mysql_query("insert into tbl_bills set sale_bill_no='$b_no', item_name='$item_name', item_type='$item_type', qty='$qty', bonus='$bonus', tp='$tp', up='$up', discount='$discount', total_bill='$total_amount', profit='$profit', sale=1 ") or die(mysql_error());
		
		}

		
		if($insert){
			
			$insert_no	=	mysql_query("insert into tbl_bills_no set sale_bill_no='$b_no', date_search='$date_search', date_show='$c_date', total_bill='$c_bill1', profit='$final_disc', dname='$dname', uname='$user_name',
			
			c_paid='$c_paid1', c_name='$c_name1', c_disc='$c_disc1', c_bill_total='$c_after_disc1', c_return='$c_return1',  sale=1") or die(mysql_query());
			
			}
		
		if($insert){
			$delete		=	mysql_query("delete from tbl_tmp_bill where ses_id='$ses_id' && sale=1") or die(mysql_error());
			if($delete){$tbl_disc	=	mysql_query("delete from tbl_disc where bill_no='$b_no'");}
			if($tbl_disc){header("Location:sales.php");}
			}
			
}
	
}

if(isset($_POST['c_submit'])){
		
		$total_bbill=		$_POST['total_bbill'];
		$c_name		=		$_POST['c_name'];
		$c_paid		=		$_POST['c_paid'];
		$c_disc		=		$_POST['c_disc'];
		
		$rt			=	$c_paid - $total_bbill;
		if($c_disc != ""){ 
		$from_total	=	$total_bbill - $c_disc; // total bill and discount
		$from_paid	=	$c_paid - $from_total; //return
		
		$insert_b_no	=	mysql_query("insert into tbl_disc set c_paid='$c_paid', 
							c_name='$c_name', c_bill='$total_bbill', c_disc='$c_disc', after_disc='$from_total', 
							c_return='$from_paid', bill_no='$b_no'  ")		    or die(mysql_error());
		if($insert_b_no){header("Location:sales_bill.php");}					
							}
							else
							
							{$insert_b_no	=	mysql_query("insert into tbl_disc set c_paid='$c_paid', 
							c_name='$c_name', c_bill='$total_bbill', after_disc='$total_bbill', 
							c_return='$rt', bill_no='$b_no'  ")		    or die(mysql_error());
		if($insert_b_no){header("Location:sales_bill.php");}
		}
}
 ?>
 <style type="text/css">

        @media print {

            body * {

                visibility:hidden;

            } 

            #printable, #printable * {

                visibility:visible;
		

            }

            #printable { /* aligning the printable area */

                position:absolute;

                left:0;

                top:0;
				font-weight:bold;
				margin-left:auto; margin-right:auto;

            }
			#printable .soft{margin-left:auto; margin-right:auto; text-align:center; font-size:12px; font-weight:normal; margin-left:0px; margin-top:0px;}
			#printable table{width:100%; margin-left:auto; margin-right:auto;}
        }

        </style>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	
            <h1>sales bill</h1>
            
        </div> <!-- headingSection -->
        
       
         <form method="post" enctype="multipart/form-data">
     	<div class="row">
        
        	<div class="col-sm-10 col-sm-offset-1 ">
                  
                   <div class="wbox addDealer">
            
                   
                   
                   	
                        <div class="row">
                        <div class="tblSet">
                         <div id="printable">
                          <div style="width:100%; height:auto; overflow:hidden; text-align:center;">
                        
                           <h2 style="color:black;"><?= $hnm; ?></h2><h4 style="color:black"><?= $hno; ?></h4>
                           <div style="float:left; text-align:left; color:black; margin:10px 0px; font-size:10px;">
                           		Bill NO: <?= $b_no ?><br>
								Username: <?= $user_name ?><br>
                                
								Date: <?= $c_date ?>
                                
                           </div>
                           
                            <table border="0" cellpadding="0" cellspacing="0" >
                            	<tr> <th align="left" style="text-align:left; padding-left:5px;">Item Name</th>  <th>Type</th>  <th>Qty</th>  <th>UP</th> <!-- <th>Disc</th> --> <th>Total</th> </tr>
                                <?php
								$bil_qry	=	mysql_query("select * from  tbl_tmp_bill where sale=1") or die(mysql_error());
								while($bill_data = mysql_fetch_assoc($bil_qry)){
									$paid_bill	+=	$bill_data['total_amount'];
								?>
                                <tr> <td align="left" style="text-align:left; padding-left:5px;"><?= ucfirst($bill_data['item_name']); ?></td> <td><?= ucfirst($bill_data['item_type']); ?></td> 
                                	 <td><?= $bill_data['qty'] + $bill_data['bonus']; ?></td> <td><?= $bill_data['up']; ?></td>
                                   <!--  <td><? // $bill_data['discount']; ?>%</td> --> <td><?= $bill_data['total_amount']; ?>
                                   <input type="hidden" value="<?= $paid_bill; ?>" name="total_bbill">
                                   </td> </tr>
                                    
                                     
                            <?php } ?>
                             <tr><td colspan="6" class="no-border" style="border:1px solid #8E8888; 
                             text-align:right; letter-spacing:2px; padding-right:5px; font-size:16px; border:none; font-size:10px;">
                             <?php $sb	= $bill_data['total_amount'] - $c_disc ?>
                            
                             Total Bill = <?= $paid_bill ?>
                        <?php
						if($tbl_data['c_disc'] != ""){
						?>
                        <br> Discount = <?= $tbl_data['c_disc']; ?>
                       <?php } ?>
                        <?php
						if($tbl_data['c_disc'] != ""){
						?>
                        <br> Total = <?=  $tbl_data['after_disc']; ?>
                        
                        <?php }
						if($tbl_data['c_paid'] != ""){
						?>
                         <br> Paid  = <?= $tbl_data['c_paid']; ?>
                        <?php }
						if($tbl_data['c_return'] != ""){
						?>
                       
                        <br> Return  = <?= $tbl_data['c_return']; ?>
                        
                        <?php }
						if($tbl_data['c_name'] != ""){
						?>
                        <br> Cust-Name = <?= $tbl_data['c_name']; ?>
                        <?php } ?>
                       
                       
                             
                             </td> </tr>
                            </table>
                            <div class="soft"><?= $rnm; ?><br><?= $rno; ?></div>
                        </div>
                             </div><!-- Printable --> 
                         </div>    
                        	<div class="col-lg-6 col-md-6 col-sm-6" style="color:black;">
                              
                                  
                            </div>
                            <div class="clear"></div>
                            <div class="btnSection">
                            <input style="width:150px; height:30px; text-align:center;" autocomplete="off" type="text" autofocus placeholder="Customer Name" name="c_name">
                            <input style="width:70px;  height:30px; text-align:center;" autocomplete="off"
                             type="text" name="c_paid" placeholder="Paid" onClick="this.focus(); this.setSelectionRange(0, 9999);">
                            <input style="width:70px;  height:30px; text-align:center;" autocomplete="off" type="text" name="c_disc" placeholder="Discount"> 
                            <input class="btn" type="submit" name="c_submit" value="Submit">
                            </div> 
                          
                           <div class="btnSection">
                           		<input type="submit" name="submit" value="Save" tabindex="13" class="btn">
                                <button name="print" class="btn" tabindex="14" onClick="window.print();">Print</button>
                             <a href="sales.php" style="background-color:#ff4081; padding:6px 8px; border-radius:4px; font-size:14px; border:1px solid transparent; color:white;">Go Back</a>
                           </div>  <!--btnSection  -->
                            
                          
                            
                        </div>
      			  </div> <!--wbox  -->
                
            </div>
        </div>
        </form>
    </div>

<?php include "inc/footer.php"; ?>

      <script type="text/javascript" src="js/moment-with-locales.js"></script>
    
  
    
      <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$('#datetimepicker1').datetimepicker();
$('#datetimepicker2').datetimepicker();
});//]]> 