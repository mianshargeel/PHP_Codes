<?php $page = 4; include "pass_check.php"; include "inc/head.php"; 
$ses_id		=	session_id();
$billNo		=	mysql_query("SELECT sr FROM tbl_bills where sr != 0 OR sr != '' ORDER by sr DESC ") or die(mysql_error());
$no			=	mysql_fetch_array($billNo);
$b_no		=	$no['sr'] + 1;

$tbl		=	mysql_query("select * from tbl_disc where sr_bill_no='$b_no'");
$tbl_data	=	mysql_fetch_array($tbl);
$c_name1		=	$tbl_data['c_name'];


if(isset($_POST['submit'])){
	
	$tmp_qry	=	mysql_query("select * from tbl_tmp_bill where ses_id = '$ses_id'") or die(mysql_error());
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
		
	
	$insert		=	mysql_query("insert into tbl_bills set sr_bill_no='$b_no', item_name='$item_name', item_type='$item_type', qty='$qty', up='$up', total_bill='$total_amount', sr=1 ") or die(mysql_error());
		
		}

		
		if($insert){
			$insert_no	=	mysql_query("insert into tbl_bills_no set sr_bill_no='$b_no', date_search='$date_search', date_show='$c_date', total_bill='$total_bill',  dname='$dname', uname='$user_name', c_name='$c_name1',  sr=1") or die(mysql_query());
			
			}
		
		if($insert){
			$delete		=	mysql_query("delete from tbl_tmp_bill where ses_id='$ses_id' && sr=1") or die(mysql_error());
			if($delete){header("Location:sales.php");}
			}
	}
	

if(isset($_POST['c_submit'])){
		$c_name		=		$_POST['c_name'];
		
		$insert_b_no	=	mysql_query("insert into tbl_disc set 
							c_name='$c_name', sr_bill_no='$b_no'  ")		    or die(mysql_error());
		if($insert_b_no){header("Location:sales_return_bill.php");}					
							
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
                        
                           <h2 style="color:black;">Hospital Name</h2><h4 style="color:black">03362040050</h4>
                           <div style="float:left; text-align:left; color:black; margin:10px 0px; font-size:10px;">
                           		Bill NO: <?= $b_no ?><br>
								Username: <?= $user_name ?><br>
								Date: <?= $c_date ?>
                                
                           </div>
                           
                            <table border="0" cellpadding="0" cellspacing="0" >
                            	<tr> <th align="left" style="text-align:left; padding-left:5px;">Item Name</th>  <th>Type</th>  <th>Qty</th>  <th>UP</th> <!-- <th>Disc</th> --> <th>Total</th> </tr>
                                <?php
								$bil_qry	=	mysql_query("select * from  tbl_tmp_bill where sr=1") or die(mysql_error());
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
						if($tbl_data['c_paid'] != ""){
						?>
                        <br> Paid Cash = <?= $tbl_data['c_paid']; ?>
                        <?php }
						if($tbl_data['c_disc'] != ""){
						?>
                         <br> Total = <?=  $tbl_data['after_disc']; ?>
                        <?php }
						if($tbl_data['c_return'] != ""){
						?>
                       
                        <br> Return Cash = <?= $tbl_data['c_return']; ?>
                        
                        <?php }
						if($tbl_data['c_name'] != ""){
						?>
                        <br> Cust-Name = <?= $tbl_data['c_name']; ?>
                        <?php } ?>
                       
                       
                             
                             </td> </tr>
                            </table>
                        </div>
                             </div><!-- Printable --> 
                         </div>    
                        	<div class="col-lg-6 col-md-6 col-sm-6" style="color:black;">
                              
                                  
                            </div>
                            <div class="clear"></div>
                            <div class="btnSection">
                            <input style="width:150px; height:30px; text-align:center;" type="text" autofocus placeholder="Customer Name" name="c_name">
                          <!--  <input style="width:70px;  height:30px; text-align:center;" type="text" name="c_paid" placeholder="Paid">
                            <input style="width:70px;  height:30px; text-align:center;" type="text" name="c_disc" placeholder="Discount"> 
                           --> 
                            <input class="btn" type="submit" name="c_submit" value="Submit">
                            </div> 
                          
                           <div class="btnSection">
                           		<input type="submit" name="submit" value="Save" tabindex="13" class="btn">
                               <!-- <button name="print" class="btn" tabindex="14" onClick="window.print();">Print</button>-->
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