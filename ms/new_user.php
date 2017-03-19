<?php $page = 1; include "pass_check.php"; include "inc/head.php";
if(isset($_POST['submit'])){
	$name			=		$_REQUEST['name'];
	$uname			=		md5($_REQUEST['uname']);
	$upass			=		md5($_POST['upass']);
	$upconfirm		=		md5($_POST['upconfirm']);
	$ucontact		=		$_REQUEST['ucontact'];
	$ualtcontact	=		$_REQUEST['ualtcontact'];
	$address		=		$_REQUEST['address'];
	$use	=	mysql_query("select * from tbl_user where user_name='$name'");
	$urow	=	mysql_num_rows($use);
	if($urow >0 ){$msg = "ERROR: $name is already exist";}
	else{
	if($upass != $upconfirm){$msg = "ERROR: Provided Passwords not same try again"; }
	else{
	$qry		=	mysql_query("insert into tbl_user set user_name='$name', uname='$uname', upass='$upass', upconfirm='$upconfirm', ucontact='$ucontact', ualtcontact='$ualtcontact', address='$address', c_date='$c_date' ") or die(mysql_error());
	if($qry){$msg = "$name is added successfully";}
	}}}
 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<h1>Add nEW USER</h1>
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
                                <label>Name</label>
                                <input name="name" type="text" autofocus required class="form-control" value="<?= $name ?>" id="name" tabindex="1" autocomplete="off">
                                </div>
                                  
                                     
                              <div class="form-group">
                                <label>PASSWORD</label>
                                <input name="upass" type="password" required class="form-control" id="upass" tabindex="3">
                                </div>
                                <div class="form-group">
                                <label>Contact</label><input name="ucontact" type="text" value="<?= $ucontact ?>"  class="form-control" id="ucontact"  tabindex="5">
                                </div>  
                                  
                              <div class="form-group">
                                <label>alternate contact no</label><input name="ualtcontact" type="text" value="<?= $ualtcontact ?>"  class="form-control" id="ualtcontact"  tabindex="7">
                                </div>
                                  
                               
                                
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                                
                              <div class="form-group">
                                <label>USER NAME</label>
                                  <input name="uname" type="text" required class="form-control" id="uname" tabindex="2">
                                </div>
                            
                              <div class="form-group">
                                <label>confirm-password</label>
                                  <input name="upconfirm" type="password" required class="form-control" id="upconfirm" tabindex="4">
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
                                   <label>address</label>
                                    <textarea name="address" rows="9" class="form-control" id="address" tabindex="9"><?= $address ?></textarea>
                              </div>
                                 
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection">
                           		<button type="submit" name="submit" class="btn" tabindex="10">Add User</button>
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