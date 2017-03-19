<?php $page = 2; include "pass_check.php"; include "inc/head.php";
if(isset($_POST['submit'])){
	$dname		=		$_POST['dname'];
	$dcode		=		$_POST['dcode'];
	$landline	=		$_POST['landline'];
	$contact	=		$_POST['contact'];
	$detail		=		$_POST['detail'];
	$email		=		$_POST['email'];
	$web		=		$_POST['web'];
	$fax		=		$_POST['fax'];
	$qry		=	mysql_query("insert into tbl_dealer set dname='$dname', dcode='$dcode', phone='$landline', contact='$contact', email='$email', web='$web', fax='$fax', address='$detail', c_date='$c_date' ") or die(mysql_error());
	if($qry){$msg = "$dname is added successfully";}
	}
 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<h1>Add dealer</h1>
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
                                <label>Dealer Name</label>
                                <input name="dname" type="text" autofocus required class="form-control" id="dname" tabindex="1" autocomplete="off">
                                </div>
                                  
                                     
                              <div class="form-group">
                                <label>Landline</label>
                                <input name="landline" type="text" required class="form-control" id="landline" tabindex="3">
                                </div>
                                <div class="form-group">
                                <label>Fax</label><input name="fax" type="text"  class="form-control" id="fax"  tabindex="5">
                                </div>  
                                  
                              <div class="form-group">
                                <label>Website</label><input name="web" type="text"  class="form-control" id="web"  tabindex="7">
                                </div>
                                  
                                 
                              <div class="form-group">
                              <label>Email</label>
                                <input name="email" type="email" class="form-control" id="email"  tabindex="9">
                                </div>
                                
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                                
                              <div class="form-group">
                                <label>Dealer Code</label>
                                  <input name="dcode" type="text" required class="form-control" id="dcode" tabindex="2">
                                </div>
                            
                              <div class="form-group">
                                <label>Contact</label>
                                  <input name="contact" type="text" required class="form-control" id="contact" tabindex="4">
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
                                    <textarea name="detail" rows="9" class="form-control" id="detail" tabindex="9"></textarea>
                              </div>
                                 
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection">
                           		<button type="submit" name="submit" class="btn" tabindex="10">Add Dealer</button>
                                <button type="reset" class="btn" tabindex="11">Reset Form</button>
                              <a style="color:#fff;" href="index.php">  <button tabindex="12"  class="btn">Go Back</button></a>
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