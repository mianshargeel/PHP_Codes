<?php $page = 1; include "pass_check.php"; include "inc/head.php";
$u_id		=		$_GET['u_id'];
$query		=	mysql_query("select * from tbl_user where uid='$u_id'") or die(mysql_error());
$row		=	mysql_fetch_array($query);
$user_name	=	$row['user_name'];
$u_contact	=	$row['ucontact'];
$alt_contact=	$row['ualtcontact'];
$add		=	$row['address'];
if(isset($_POST['submit'])){
	$name			=		$_REQUEST['name'];
	
	$ucontact		=		$_REQUEST['ucontact'];
	$ualtcontact	=		$_REQUEST['ualtcontact'];
	$address		=		$_REQUEST['address'];
	
	$qry		=	mysql_query("update tbl_user set user_name='$name',  ucontact='$ucontact', ualtcontact='$ualtcontact', address='$address' where uid='$u_id' ") or die(mysql_error());
	if($qry){header("Location:user_list.php");}
	}
 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<h1>update USER</h1>
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
                                <input name="name" type="text" autofocus required class="form-control" value="<?= $user_name ?>" id="name" tabindex="1" autocomplete="off">
                                </div>
                                  
                                <!--     
                              <div class="form-group">
                                <label>PASSWORD</label>
                                <input name="upass" type="password" required class="form-control" id="upass" tabindex="3">
                                </div>
                               --> 
                                <div class="form-group">
                                <label>Contact</label><input name="ucontact" type="text" value="<?= $u_contact ?>"  class="form-control" id="ucontact"  tabindex="5">
                                </div>  
                                  
                              <div class="form-group">
                                <label>alternate contact no</label><input name="ualtcontact" type="text" value="<?= $alt_contact ?>"  class="form-control" id="ualtcontact"  tabindex="7">
                                </div>
                                  
                               
                                
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                                <!--  
                              <div class="form-group">
                                <label>USER NAME</label>
                                  <input name="uname" type="text" required class="form-control" id="uname" tabindex="2">
                                </div>
                            
                              <div class="form-group">
                                <label>confirm-password</label>
                                  <input name="upconfirm" type="hidden" required class="form-control" id="upconfirm" tabindex="4">
                                </div>    
                                  
                               
                                
                                  
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
                                    <textarea name="address" rows="9" class="form-control" id="address" tabindex="9"><?= $add ?></textarea>
                              </div>
                                 
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection">
                           		<button type="submit" name="submit" class="btn" tabindex="10">Edit User</button>
                                <button type="reset" class="btn" tabindex="11">Reset Form</button>
                              <a style="color:#fff; color:#fff;" class="btn" href="user_list.php">  Go Back</a>
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