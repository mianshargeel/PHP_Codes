<?php $page = 3; include "pass_check.php"; include "inc/head.php"; 
$ses_id		=	session_id();
if(isset($_POST['goBack'])){header("Location:plist.php");}
if(isset($_POST['submit'])){
	$name		=	$_POST['name'];
	$type		=	$_POST['type'];
	$qty		=	$_POST['qty'];
	$tp			=	$_POST['tp'];
	$up			=	$_POST['up'];
	$discount	=	$_POST['discount'];
	$detail		=	$_POST['detail'];
	$bonus		=	$_POST['bonus'];
	$dname		=	$_REQUEST['dname'];
	
	$total_bill		=	$qty * $tp;
	$bonus_add		=	$bonus * $tp;
	
	
	
	
	if($discount != ""){
		$d		=		$total_bill * $discount;
		$dd		=		$d / 100;
		$ddd1	=		$total_bill - $dd;
		$ddd	=		$ddd1 + $bonus_add;
		}
		else{$ddd = $total_bill;}
	
$chk_old	=	mysql_query("select * from tbl_stock where name='$name' && qty='$qty'") or die(mysql_error());	
$m_row		=	mysql_num_rows($chk_old);
if($m_row != ""){$msg = "$name is already exist";}else{
	
	
	if($name == ""){$msg = "Please provide item name";}
	elseif($type == ""){$msg = "Please provide item type";}
	elseif($qty == ""){$msg = "Please provide item Quantity";}
	elseif($tp == ""){$msg = "Please provide item T.P";}
	elseif($up == ""){$msg = "Please provide item U.P.";}
	
	else{
			$query		=		mysql_query("insert into tbl_stock set 
											name='$name', type='$type', qty='$qty', bonus='$bonus', without_bonus='$ddd1', 
											item_discount='$discount', tp='$tp', up='$up', 
											detail='$detail', purchase=1, c_date='$c_date', 
											total_bill='$ddd', ses_id='$ses_id', uname='$uname', 
											dname='$dname' ") or die(mysql_error());
			
			if($query){
				
				$tmp_qry	=	mysql_query(" insert into tbl_tmp_bill set
												item_name='$name', item_type='$type', uname='$user_name', dname='$dname', qty='$qty', bonus='$bonus', up='$up', tp='$tp', 
												total_amount='$ddd1', discount='$discount', ses_id='$ses_id', purchase=1
				") or die(mysql_error());
				if($tmp_qry){header("Location:purchase.php");}
				}
		}
}
	}
 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<?php
			if($tmp_bill != ""){
			?>
             <span class="btn back"><a href="purchase_bill.php"><i class="fa fa-calculator"></i><?php echo "Items: ". "$tmp_bill  | " . "Rs: " . "$cnt"; ?></a></span>
           	<?php }else{ ?>
            <h1>Add purchase <?= $_SESSION['user_name']; ?></h1>
            <?php } ?>
        </div> <!-- headingSection -->
        
       
        
     	<div class="row">
        
        	<div class="col-sm-10 col-sm-offset-1 ">
            	  
                  <form method="post" enctype="multipart/form-data">
                  
                   <div class="wbox addDealer">
            
                   
                   
                   <?php if($msg != ""){ ?>
                    <div class="custom_alert"><h3><?php echo $msg; ?></h3></div>
        			<?php } ?>	
                        <div class="row">
                        
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                            
                              <div class="form-group">
                                <label>item Name</label>
                                <input name="name" type="text" autofocus  class="form-control" id="name" tabindex="1" autocomplete="off">
                                </div>
                                  
                                     
                              <div class="form-group">
                                <label>quantity</label>
                                <input name="qty" type="text"  class="form-control" id="qty" tabindex="3" autocomplete="off">
                                </div>
                                  
                                  
                              <div class="form-group">
                                <label>rp</label><input name="tp" type="text"  class="form-control" id="tp"  tabindex="5" autocomplete="off">
                                </div>
                                  
                                 
                              <div class="form-group">
                                <label>Unit Price</label>
                                <input name="up" type="text" class="form-control" id="up"  tabindex="7" autocomplete="off">
                                </div>
                                  
                             <!--
                                 <div class="form-group">
                                    <label>MFG Date </label>
                                  	<input type="text" class="form-control" id="datetimepicker2" />
                                  </div>  
                                 
                              -->
                                   
                                 <div class="form-group">
                                   <label>Dealer Name </label>
                                    <select name="dname" class="form-control"  tabindex="11" id="dname">
                                    <?php
										if($dname != ""){
									?>
                                     <option value="<?= $dname ?>" selected><?= $dname ?></option>
                                     <?php }else{ ?>
                                      <option value="" selected>Select Dealer</option>
                                     <?php }
									 while($data_d	=	mysql_fetch_array($dealer)){
									 ?>
                                      <option value="<?= $data_d['dname'] ?>"><?= $data_d['dname'] ?></option>
                                      <?php } ?>
                                      
                                    </select>
                                  
                              </div>
                                 
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                                
                              <div class="form-group">
                                <label>item type</label>
                                  <input name="type" type="text"   class="form-control" id="type" tabindex="2" autocomplete="off">
                                </div>
                                  
                                
                              <div class="form-group">
                                <label>	bonus</label>
                                <input name="bonus" type="text" class="form-control" id="bonus"  tabindex="4" autocomplete="off">
                                </div>
                                  
                                  
                                   
                              <div class="form-group">
                                <label>Discount</label>
                                <input name="discount" type="text" class="form-control" id="discount"  tabindex="6" autocomplete="off">
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
                                 <div class="form-group">
                                   <label>Comments</label>
                                    <textarea name="detail" rows="8" class="form-control" id="detail" tabindex="12"></textarea>
                              </div>
                                 
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection">
                           		<button type="submit" name="submit" tabindex="13" class="btn">Add Purchase</button>
                                <button type="reset" class="btn" tabindex="14">Reset Form</button>
                              <input type="submit" name="goBack" value="Go Back"  class="btn" tabindex="15">
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