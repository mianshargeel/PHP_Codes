<?php $page = 5; include "pass_check.php"; include "inc/head.php";


 ?>
<!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="headingSection">
        	<h1> today report<br><h4><?= $date_search; ?></h4> </h1>
        </div> <!-- headingSection -->
        
       
        
     	<div class="row">
        
        	<div class="col-sm-10 col-sm-offset-1 ">
            	  
                  <form method="post" enctype="multipart/form-data">
                  
                   <div class="wbox addDealer">
                  
                        <div class="row">
                        
                            <h2 style="color:#000; font-weight:bold; font-size:16px; color:red; text-transform:uppercase; text-align:center;">Sales Report</h2>
                            
                           
                             <table style="margin-bottom:20px;" >
                             	<tr>
                                	<th style="background-color:black; color:white; border:1px solid white; text-align:center;">Sale Return</th>
                                     
                                    <th style="background-color:black; color:white; border:1px solid white; text-align:center;">Total Sale</th> 
                                    <th style="background-color:black; color:white; border:1px solid white; text-align:center;">Discount</th> 
                                    <th style="background-color:black; color:white; border:1px solid white; text-align:center;">Profit</th> 
                                    <th style="background-color:black; color:white; border:1px solid white; text-align:center;">Total Cash</th>
                                    
                                 </tr>
                                 <tr>
                                    <td style="padding:5px 5px; text-align:center;"><?= $r_bill ?></td> 
                                    <td style=" text-align:center;"><?= $t_sale ?></td> 
                                    <td style=" text-align:center;"><?= $t_disc ?></td>
                                     <td style=" text-align:center;"><?= $t_profit ?></td> 
                                    <td style=" text-align:center; font-weight:bold; color:blue; font-size:18px; letter-spacing:2px;"><?= $after_disc - $r_bill ?></td>
                                   
                                </tr>
                             </table>
                           
                         
                            	
                        <h2 style="color:#000; font-weight:bold; font-size:16px; color:red; text-transform:uppercase; text-align:center;">Purchase Report</h2>
                            <table style="margin-bottom:20px;" >
                             	<tr>
                                	<th style="background-color:black; color:white; border:1px solid white; text-align:center;">Purchase Return</th>
                                     
                                    <th style="background-color:black; color:white; border:1px solid white; text-align:center;">Total Purchase</th> 
                                    <th style="background-color:black; color:white; border:1px solid white; text-align:center;">Total Paid</th> 
                                    </tr>
                                 <tr>
                                    <td style="padding:5px 5px; text-align:center;"><?php echo $r_p;  ?></td> 
                                    <td style=" text-align:center;"><?= $pt ?></td> 
                                   <td style=" text-align:center; font-weight:bold; color:blue; font-size:18px; letter-spacing:2px;"><?= $pt - $r_p ?></td>
                                    
                                   
                                </tr>
                             </table>
                       
                            <div class="clear"></div>
                           <div class="btnSection">
                           		
                             <!-- <a style="color:#fff;" class="btn" href="plist.php"> Go Back</a> -->
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