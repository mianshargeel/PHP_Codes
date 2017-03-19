<?php $page = 5; include "pass_check.php"; include "inc/head.php"; ?>
 <!-- From, to search Start -->    
   			<div class="container">
            <div class="row headingSection">
        	
            <div class="col-lg-4 col-md-4 col-sm-4 ">
              <h1>purchase REPORT</h1>
              </div>
            <div class="col-lg-4 col-md-4 col-sm-4 text-right">
             
           	 <span class="btn back"><a href="purchase_report.php"><i class="fa fa-arrow-left"></i>Back</a></span>
            </div>
        </div> <!-- headingSection -->
         <div class="wbox mytable">
			<?php
		if(isset($_POST['srch'])){
			$from	=	$_REQUEST['firstinput'];	
			$too	=	$_REQUEST['secondinput'];
			
			 $qryy	=	mysql_query("select * from tbl_bills_no where date_search >=  '$from' && purchase = 1 AND date_search <= '$too' && purchase=1") or die(mysql_error());
		  $chkk	=	mysql_num_rows($qryy);
		  
		while($kk = mysql_fetch_array($qryy)){ 
		$tt_mount += $kk['c_bill_total']; 
		$get_profit  += $kk['profit'];}
			
			echo "<h3 style='color:black; text-align:center; font-weight:bold;'> Total Bills $chkk amount = " . $tt_mount;	
			
			
		  $qry	=	mysql_query("select * from tbl_bills_no where date_search >=  '$from' && purchase = 1 AND date_search <= '$too' && purchase=1 ") or die(mysql_error());
		  $chk	=	mysql_num_rows($qry);
		  if($chk >0 ){
		  while($data = mysql_fetch_assoc($qry)){
			  $bill_no		=	$data['bill_no'];
		  ?>
          
            <div style="float:right; color:black; background-color:#ff4081; color:#fff; font-weight:bold; padding:2px 6px;">
          <a style="color:#fff;" href="dell_report.php?sid=<?= $data['bill_no'] ?>">X</a>
          </div>
            <table class="table table-hover table-bordered results" style="margin-bottom:0px;">
       			 <thead>
                
          <tr>
            <th>item Name </th>
            <th ><span class="center">Item Type</span></th>
            <th ><span class="center">Qty</span></th>
             <th ><span class="center">UP</span></th>
            <th><span class="center">Bill</span></th>
            <th><span class="center">Profit</span></th>
          </tr>
        </thead>
       
     
          
          
         <?php
		 $in	=	mysql_query("select * from tbl_bills where bill_no='$bill_no' && purchase=1") or die(mysql_error());
		 while($getData	=	mysql_fetch_array($in)){
		 ?>
          <tr>
            <td data-title="Item Name"><?php echo $getData['item_name']; ?></td>
            <td data-title="Qty"><span class="center"><?php echo $getData['item_type']; ?></span></td>
            <td data-title="TP"><span class="center"><?php echo $getData['qty'] + $getData['bonus']; ?></span></td>
            <td data-title="TP"><span class="center"><?php echo $getData['up']; ?></span></td>
            <td data-title="Qty"><span class="center"><?php echo $getData['total_bill']; ?></span></td>
            <td data-title="Qty"><span class="center"><?php echo $getData['profit']; ?></span></td>
          </tr>
         <?php } ?>
          </table>
         
       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px; margin-bottom:15px;">
              <tbody>
                <tr>
                  <td style="background-color:#675757; padding:10px 5px; border:1px solid blue; color:white; text-align:center; font-weight:bold; letter-spacing:1px;">Bill#</td>
                  <td style="background-color:#675757; padding:10px 5px; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">Date</td>
                  <td style="background-color:#675757; padding:10px 5px; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">User Name</td>
                  <td align="center" style="background-color:#675757; text-align:center; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">Paid</td>
                  <td align="center" style="background-color:#675757; text-align:center; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">Discount</td>
                  <td align="center" style="background-color:#675757; text-align:center; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">Return</td>
                  <td align="center" style="background-color:#675757; text-align:center; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">Total BIll</td>
                  <td align="center" style="background-color:#675757; text-align:center; border:1px solid blue; color:white; font-weight:bold; letter-spacing:1px;">Total Profit</td>
                </tr>
                <tr>
      <td style="background-color:#EFD8D8; padding:10px 5px; border:1px solid blue; color:black; text-align:center;  letter-spacing:1px;"><?= $data['bill_no'];?></td>          
     <td style="background-color:#EFD8D8; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['date_show'];?></td>
     <td style="background-color:#EFD8D8; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['uname'];?></td>
     <td align="center" style="background-color:#EFD8D8; text-align:center; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['c_paid'];?></td>
     <td align="center" style="background-color:#EFD8D8; text-align:center; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['c_disc'];?></td>
     <td align="center" style="background-color:#EFD8D8; text-align:center; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['c_return'];?></td>
     <td align="center" style="background-color:#EFD8D8; text-align:center; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['c_bill_total'];?></td>
      <td align="center" style="background-color:#EFD8D8; text-align:center; padding:10px 5px; border:1px solid blue; color:black;  letter-spacing:1px;"><?= $data['profit'];?></td>
                </tr>
              </tbody>
            </table>
       <?php } } else { ?>
       <div class="col-lg-4 col-md-4 col-sm-4 " style="text-align:center; width:100%; margin-top:10%">
              <h1 style="text-align:center; color:black;">No Record Found for <span style="color:#f00;"><?= $search ?></span></h1>
              </div>
              <?php }  ?>
			</div> <!--	no-more-tables -->
       			
	   
	   <?php } else{ ?>
        <div class="col-lg-4 col-md-4 col-sm-4 " style="text-align:center; width:100%; margin-top:10%">
              <h1 style="text-align:center; color:black;">Please Search Report by date <span style="color:#f00;"><?= $search ?></span></h1>
              </div>
             
			</div> <!--	no-more-tables -->
       	
       <?php } ?>  
     </div>
     
 <!-- From, to search End -->  
 <?php include "inc/footer.php"; ?>