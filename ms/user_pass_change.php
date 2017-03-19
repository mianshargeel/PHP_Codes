<?php $page = 1; include "pass_check.php"; include "inc/head.php";
if(isset($_POST['submit'])){
	$old_pass		=		md5($_POST['old_pass']);
	$upass			=		md5($_POST['upass']);
	
	$ck		=	mysql_query("select * from tbl_user where upass='$old_pass'") or die(mysql_error());
	$r_ck	=	mysql_num_rows($ck);
	if($r_ck == ""){$msg = "Password is incorrect please try again ";}
	else{
	
	$qry		=	mysql_query("update tbl_user set upass='$upass' where upass='$old_pass' ") or die(mysql_error());
	if($qry){$msg = "Password changed successfully";}
	}
}
 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<h1>change password</h1>
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
                                <label>old password</label>
                                <input name="old_pass" type="password" autofocus required class="form-control" id="old_pass" tabindex="1">
                                </div>
                                 
                              
                                  
                               
                                
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                             
                            
                              <div class="form-group">
                                <label>new-password</label>
                                  <input name="upass" type="password" required class="form-control" id="upass" tabindex="2">
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
                           <div class="btnSection">
                           		<button type="submit" name="submit" class="btn" tabindex="3">Change Password</button>
                               
                              <a style="color:#fff; font-size:14px; background-color:#ff4081; padding:7px 10px; border-radius:5px;" href="index.php"> Go Back </a>
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