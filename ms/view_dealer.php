<?php $page = 2; include "pass_check.php"; include "inc/head.php";
$d_id	=	$_GET['d_id'];

 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<h1> dealer view </h1>
        </div> <!-- headingSection -->
        
       
        
     	<div class="row">
        
        	<div class="col-sm-10 col-sm-offset-1 ">
            	  
                  <form method="post" enctype="multipart/form-data">
                  
                   <div class="wbox addDealer">
                   <?php if($msg != ""){ ?>
                    <div class="custom_alert"><h3><?php echo $msg; ?></h3></div>
        			<?php } ?>	
                        <div class="row">
                        <?php
						$dqry	=	mysql_query("select * from tbl_dealer where d_id='$d_id'") or die(mysql_error());
						$d_data	=	mysql_fetch_assoc($dqry);
						?>
                        	<div class="col-lg-6 col-md-6 col-sm-6">
                            
                              <div class="form-group">
                                <label>Dealer Name</label>
                                <input name="dname" type="text" class="form-control" id="dname" tabindex="1" autocomplete="off" value="<?= $d_data['dname'] ?>" readonly>
                                </div>
                                  
                                     
                              <div class="form-group">
                                <label>Landline</label>
                                <input name="landline" type="text" required class="form-control" id="landline" tabindex="3" value="<?= $d_data['phone'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                <label>Fax</label><input name="fax" type="text"  class="form-control" id="fax"  tabindex="5" value="<?= $d_data['fax'] ?>" readonly>
                                </div>  
                                  
                              <div class="form-group">
                                <label>Website</label><input name="web" type="text"  class="form-control" id="web"  tabindex="7" value="<?= $d_data['web'] ?>" readonly>
                                </div>
                                  
                                 
                              <div class="form-group">
                              <label>Email</label>
                                <input name="email" type="email" class="form-control" id="email"  tabindex="9"  value="<?= $d_data['email'] ?>" readonly>
                                </div>
                                
                           
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            	
                                
                              <div class="form-group">
                                <label>Dealer Code</label>
                                  <input name="dcode" type="text" required class="form-control" id="dcode" tabindex="2"  value="<?= $d_data['dcode'] ?>" readonly>
                                </div>
                            
                              <div class="form-group">
                                <label>Contact</label>
                                  <input name="contact" type="text" required class="form-control" id="contact" tabindex="4" value="<?= $d_data['contact'] ?>" readonly>
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
                                    <textarea name="detail" rows="9" class="form-control" id="detail" tabindex="9"><?= $d_data['address'] ?></textarea>
                              </div>
                                 
                                  
                            </div>
                            <div class="clear"></div>
                           <div class="btnSection">
                           		
                              <a style="color:#fff;" class="btn" href="dealer_list.php"> Go Back</a>
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