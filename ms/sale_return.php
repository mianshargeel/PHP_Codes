<?php $page = 3; include "pass_check.php"; include "inc/head.php";
$stock_id	=	$_GET['stock_id']; 
$ses_id		=	session_id();
$nqry			=	mysql_query("select * from tbl_stock where stock_id='$stock_id'") or die(mysql_error());
$qrow			=	mysql_fetch_assoc($nqry);
$name			=	$qrow['name'];
$type			=	$qrow['type'];
$tp				=	$qrow['tp'];
$discount		=	$qrow['item_discount'];
$detail			=	$qrow['detail'];
$up				=	$qrow['up'];
if(isset($_POST['submit'])){
	$qty1			=	$_POST['qty'];
	$total_bill		=	$qty1 * $tp;
	
	$up_cnt			=	$up * $qty1;
	
	$qty			=	$qrow['qty'] + $qty1;
	
	$aw_bonus		=	$qrow['total_bill'];
	$awithout_bonus	=	$qrow['without_bonus'];
	$item_disc		=	$qrow['item_discount'];
	
	
		$d		=		$total_bill * $item_disc;
		$dd		=		$d / 100;
		$ddd	=		$total_bill - $dd;
		
	$r_amount	=	$aw_bonus + $ddd ;
	$rr_amount	=	$awithout_bonus + $ddd;
	
			$query		=		mysql_query("update tbl_stock set 
											qty='$qty', 
											item_discount='$discount', tp='$tp',
											c_date='$c_date', 
											total_bill='$r_amount', without_bonus='$rr_amount',
											ses_id='$ses_id' where stock_id='$stock_id' ") or die(mysql_error());
			
			if($query){
				
				$tmp_qry	=	mysql_query("insert into tbl_tmp_bill set
											item_name='$name', item_type='$type', uname='$user_name',  qty='$qty1', up='$up', 
											total_amount='$up_cnt', ses_id='$ses_id', sr=1
				") or die(mysql_error());
				if($tmp_qry){header("Location:sales.php");}
				}
		
}
	
 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	
            <h1>sale return</h1>
           
        </div> <!-- headingSection -->
        
       
        
     	<div class="row">
        
        	<div class="col-sm-10 col-sm-offset-1 ">
            	  <?php
				  $qry	=	mysql_query("select * from tbl_stock where stock_id='$stock_id'") or die(mysql_error());
				  $row	=	mysql_fetch_assoc($qry);
				  ?>
                  <form method="post" enctype="multipart/form-data">
                  
                   <div class="wbox addDealer">
            
                   
                   
                   <?php if($msg != ""){ ?>
                    <div class="custom_alert"><h3><?php echo $msg; ?></h3></div>
        			<?php } ?>	
                        <div class="row">
                        
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                            
                              <div class="form-group">
                                <label><?= $type; ?><br><?= $name; ?></label>
                             
                                </div>
                                  
                             <div class="form-group">
                                <label>quantity </label>
                                <input name="qty" type="text" autofocus class="form-control" id="qty" tabindex="1" placeholder="Return Quantity">
                                </div>
                                  
                              
                                  
                                 
                              <div class="form-group" style="color:black;">
                                Rs. <label><?= $up; ?></label>
                                
                                </div>
                                  
                             <!--
                                 <div class="form-group">
                                    <label>MFG Date </label>
                                  	<input type="text" class="form-control" id="datetimepicker2" />
                                  </div>  
                                 
                              -->
                                   
                              
                                 
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                               <div class="form-group">
                                <label></label>
                                  
                                </div> 
                              
                             
                            <!--      
                                  
                                    <div class="form-group">
                                    <label>Batch No</label>
                                    <input type="text" class="form-control"  tabindex="8">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Expiry Date</label>
                                     <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                    <input type="text" class="form-control"  tabindex="10">
                                   
                                  </div>
                                  
                             -->     
                               
                                 
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection" style="float:left; text-align:left; margin-left:2%;">
                           		<button type="submit" name="submit" tabindex="7" class="btn">Sale Return</button>
                         <!--       <button type="reset" class="btn" tabindex="8">Reset Form</button> -->
                              <button  class="btn" tabindex="9"> <a style="color:white;" href="sales.php"> Go Back</a></button>
                           </div>  <!--btnSection  -->
                            
                        </div>
      			  </div> <!--wbox  -->
                  </form>
            </div>
        </div>
        
    </div>
 

<?php include "inc/footer.php"; ?>

      <script type="text/javascript" src="js/moment-with-locales.js"></script>
    
  
    
      <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$('#datetimepicker1').datetimepicker();
$('#datetimepicker2').datetimepicker();
});//]]> 