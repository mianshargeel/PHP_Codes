<?php $page = 3; include "pass_check.php"; include "inc/head.php"; 
$ses_id		=	session_id();
$billNo		=	mysql_query("select pr_bill_no from tbl_bills where pr_bill_no != 0 order by pr_bill_no DESC") or die(mysql_error());
$no			=	mysql_fetch_array($billNo);
$b_no		=	$no['pr_bill_no'] + 1;


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
		$discount		=		$t_data['discount'];
		$total_amount	=		$t_data['total_amount'];
		
		$total_bill		+=	$total_amount;
	
	$insert		=	mysql_query("insert into tbl_bills set pr_bill_no='$b_no', item_name='$item_name', item_type='$item_type', qty='$qty', bonus='$bonus', tp='$tp', up='$up', discount='$discount', total_bill='$total_amount', pr=1 ") or die(mysql_error());
		
		}
		
		if($insert){
			
			$insert_no	=	mysql_query("insert into tbl_bills_no set pr_bill_no='$b_no', date_search='$date_search', date_show='$c_date',  total_bill='$total_bill', dname='$dname', uname='$user_name', pr=1 ") or die(mysql_query());
			
			}
		
		if($insert){
			$delete		=	mysql_query("delete from tbl_tmp_bill where ses_id='$ses_id' && pr=1") or die(mysql_error());
			if($delete){header("Location:plist.php");}
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

        }

        </style>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	
            <h1>purchase return bill</h1>
            
        </div> <!-- headingSection -->
        
       
         <form method="post" enctype="multipart/form-data">
     	<div class="row">
        
        	<div class="col-sm-10 col-sm-offset-1 ">
                  
                   <div class="wbox addDealer">
            
                   
                   
                   	
                        <div class="row">
                        <div class="tblSet">
                         <div id="printable">
                           
                            <table border="0" cellpadding="0" cellspacing="0" >
                            	<tr> <th align="left" style="text-align:left; padding-left:5px;">Item Name</th>  <th>Type</th>  <th>Qty</th>  <th>TP</th>  <th>Disc</th>  <th>Total</th> </tr>
                                <?php
								$bil_qry	=	mysql_query("select * from  tbl_tmp_bill where pr=1") or die(mysql_error());
								while($bill_data = mysql_fetch_assoc($bil_qry)){
									$paid_bill	+=	$bill_data['total_amount'];
								?>
                                <tr> <td align="left" style="text-align:left; padding-left:5px;"><?= ucfirst($bill_data['item_name']); ?></td> <td><?= ucfirst($bill_data['item_type']); ?></td> 
                                	 <td><?= ucfirst($bill_data['qty']); ?></td> <td><?= $bill_data['tp']; ?></td>
                                     <td><?= $bill_data['discount']; ?>%</td> <td><?= $bill_data['total_amount']; ?></td> </tr>
                                    
                                     
                            <?php } ?>
                             <tr><td colspan="6" class="no-border" style="border:1px solid #8E8888; text-align:right; letter-spacing:2px; padding-right:30px; font-size:16px;">
                             Total Bill= <?= $paid_bill ?></td> </tr>
                            </table>
                        
                             </div><!-- Printable --> 
                         </div>    
                        	<div class="col-lg-6 col-md-6 col-sm-6" style="color:black;">
                              
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection">
                           		<input type="submit" name="submit" value="Save" tabindex="13" class="btn">
                                <button name="print" class="btn" tabindex="14">Print</button>
                              <a style="color:white;" href="plist.php">  <button  class="btn" tabindex="15">Go Back</button></a>
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