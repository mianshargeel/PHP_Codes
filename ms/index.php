<?php $page = 4; 
include "pass_check.php"; 
include "inc/head.php"; 
$fm = 1;
$ses_id = session_id();
if(isset($_POST['add']) && $_POST['add'] == "Add") {
	$item_name	=	$_POST['item_name'];
	$item_type	=	$_POST['item_type'];
	$qty		=	$_POST['qty'];
	$bonus		=	$_POST['bonus'];
	$up			=	$_POST['up'];
	$discount	=	$_POST['discount'];
	
	$total_amount	=	$qty * $up;
	$prof			=	$total_amount * $discount;
	$profit			=	$prof / 100;
	$srr			=	$total_amount - $profit;
	
	$old			=	mysql_query("select * from tbl_stock where name='$item_name' && type='$item_type'");
	$row_data		=	mysql_fetch_assoc($old);
	
	$chk_qty		=	$row_data['qty'];
	
	$chk_bonus		=	$row_data['bonus'];	
	$total_bill		=	$row_data['total_bill'];
	$without_bon	=	$row_data['without_bonus'];
	
	$prft_bonus		=	$bonus * $up;
	
	$n_qty			=	$chk_qty - $qty;
	$b_qty			=	$chk_bonus - $bonus;
	$only_bonus		=	$total_bill - $prft_bonus;
	$up_total_bill	=	$total_bill - $srr;
	$up_bonus		=	$without_bon - $srr;
	$d_bonus		=	$chk_bonus - $bonus;
	
	if($chk_qty < $qty){echo "<script>alert('Sorry: You are Exceding the Stock limit');</script>";}
	elseif($bonus > $chk_bonus){echo "<script>alert('Sorry: You are Exceding the Stock limit');</script>";}
	
	
	else{
	
		if($qty != ""){
			$insert		=	mysql_query("insert into tbl_tmp_bill set item_name='$item_name', 
			ses_id='$ses_id', item_type='$item_type', qty='$qty', bonus='$bonus', up='$up', 
			total_amount='$total_amount', 	profit='$profit', sale=1 ") or die(mysql_error());
			$upd	=	mysql_query("update tbl_stock set qty='$n_qty', total_bill='$up_total_bill', 
			without_bonus='$up_bonus' where name='$item_name' && type='$item_type' ")
			or die(mysql_error());
			}
		
		elseif($bonus != ""){
			$insert		=	mysql_query("insert into tbl_tmp_bill set item_name='$item_name', 
			ses_id='$ses_id', item_type='$item_type', qty='$qty', bonus='$bonus', up='$up', 
			total_amount='$prft_bonus', profit_amount='$prft_bonus', profit='$prft_bonus', sale=1 ") 
			or die(mysql_error());
		$bns	=	mysql_query("update tbl_stock set bonus='$d_bonus', total_bill='$only_bonus' where name='$item_name' && type='$item_type' ") or die(mysql_error());
			}
		if($upd || $bns){header("Location:sales.php");}else{mysql_error();}
		
}}
 ?>
 <!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="row headingSection">
        	<div class="col-lg-4 col-md-4 col-sm-4 ">
            	 <div class="input-group">
        
                 <input type="text" autofocus class="search form-control" placeholder="Search Here">
                 <span class="counter"></span>
               
               
                </div><!-- /input-group -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 "><h1>ITEMS Sale</h1></div>
            <div class="col-lg-4 col-md-4 col-sm-4 text-right">
            <?php
			if($sale_bill != ""){
			?>
             
             <?php if($sales == 1){ ?>
             <span class="btn back"><a href="sales_bill.php"><i class="fa fa-calculator"></i><?php echo "Items: ". "$sale_bill  | " . "Rs: " . "$sle"; ?></a></span>
           	<?php } ?>
            
            <?php if($sales_r == 1){ ?>
             <span class="btn back"><a href="sales_return_bill.php"><i class="fa fa-calculator"></i><?php echo "Items: ". "$sale_bill  | " . "Rs: " . "$sle"; ?></a></span>
           	<?php } ?>
            
            
			
			<?php } ?>
          <!--   <span class="btn back"><a href="sales.php"><i class="fa fa-arrow-left"></i>Back</a></span> -->
            </div>
        </div> <!-- headingSection -->
        
       <div class="wbox mytable">
       			    
		<div class="no-more-tables">	
			<table class="table table-hover table-bordered results">
       			 <thead>
                
          <tr>
            <th>Item Name</th>
            <th><span class="center">Type</span></th>
           <!-- <th><span class="center">Code</span></th> -->
            <th ><span class="center">Qty</span></th>
            <th ><span class="center">Bonus</span></th>
            <th ><span class="center">UP</span></th>
            <th><span class="center">Add</span></th>
            <th width="13%"><span class="center">Action</span></th>
          </tr>
        </thead>
        <tbody>
        <tr class="warning no-result">
          <td colspan="8"><i class="fa fa-warning"></i> No result</td>
        </tr>
         <?php
		 $get_qry		=	mysql_query("select * from tbl_stock");
		 $row			=	mysql_num_rows($get_qry);
		 while($data	=	mysql_fetch_array($get_qry)){
			$quantity	=	$data['qty'];
			$bonus		=	$data['bonus'];
			$up			=	$data['up'];
			$disc		=	$data['item_discount'];
		 ?>
   
     <form method="post" name="<?= $fm++; ?>" enctype="multipart/form-data">
      
      <?php
	  if($quantity == 0 && $bonus == 0){ 
	  ?>
          <tr>
            <td style="background-color:red; color:white;" data-title="Item Name"><?php echo ucfirst($data['name']); ?></td>
            <td style="background-color:red; color:white;" data-title="Type"><span class="center"><?php echo $data['type']; ?></span></td>
          <!--  <td data-title="Code"><span class="center">0524604694</span></td> -->
            <td style="background-color:red; color:white;" data-title="Qty"><span class="center">0 </span> </td>
            <td style="background-color:red; color:white;" data-title="TP"><span class="center">0</span></td>
            <td style="background-color:red; color:white;" data-title="UP"><span class="center"><?= $up; ?><input type="hidden" name="up" value="<?= $up; ?>" ></span></td>
            <td style="background-color:red; color:white;" data-title="TA"><span class="center"> &nbsp;</span></td>
            <td style="background-color:red; color:white;" data-title="Action">
              <div class="iconSection">   
            <!--  <a href="stock_dell.php?s_id=<? //$data['stock_id']; ?>"><button class="btn"> <i class="fa fa-trash"> </i></button></a>
              <a href="update_purchase.php?stock_id=<? // $data['stock_id']; ?>"> <button class="btn"> <i class="fa fa-edit"> </i></button></a>
              -->
            <a href="item_view.php?stock_id=<?= $data['stock_id']; ?>"> <img src="images/view.png" style="height:16px"> </a>
              
              &nbsp;&nbsp;&nbsp;<a href="sale_return.php?stock_id=<?= $data['stock_id']; ?>"><img src="images/return.png" style="height:16px"> </a>
                </div>
            </td>
          </tr>
      <?php } else{ ?>
     
          <tr>
            <td data-title="Item Name"><?php echo ucfirst($data['name']); ?><input type="hidden" name="item_name" value="<?php echo ucfirst($data['name']); ?>"></td>
            <td data-title="Type"><span class="center"><?php echo $data['type']; ?><input type="hidden" name="item_type" value="<?php echo ucfirst($data['type']); ?>"></span></td>
          <!--  <td data-title="Code"><span class="center">0524604694</span></td> -->
            <td data-title="Qty"><span class="center">
            <input style="width:40px; height:30px; border:none; text-align:center;" type="text" name="qty" autocomplete="off" placeholder="<?php echo $quantity; ?>"> </span> </td>
            <td data-title="TP"><span class="center">
            <input style="width:40px; height:30px; border:none; text-align:center;" type="text" name="bonus" autocomplete="off" placeholder="<?php  echo $bonus; ?>"></span></td>
            <td data-title="UP"><span class="center"><?= $up; ?><input type="hidden" name="up" value="<?= $up; ?>" ><input type="hidden" name="discount" value="<?= $disc; ?>" ></span></td>
            <td data-title="TA"><span class="center"><input style="padding:3px 5px;" type="submit" name="add" value="Add" ></span></td>
            <td data-title="Action">
              <div class="iconSection">   
            <!--  <a href="stock_dell.php?s_id=<? //$data['stock_id']; ?>"><button class="btn"> <i class="fa fa-trash"> </i></button></a>
              <a href="update_purchase.php?stock_id=<? // $data['stock_id']; ?>"> <button class="btn"> <i class="fa fa-edit"> </i></button></a>
              -->
            <a href="item_view.php?stock_id=<?= $data['stock_id']; ?>"> <img src="images/view.png" style="height:16px"> </a>
              
              &nbsp;&nbsp;&nbsp;<a href="sale_return.php?stock_id=<?= $data['stock_id']; ?>"><img src="images/return.png" style="height:16px"> </a>
                </div>
            </td>
          </tr>
        <?php } ?> 
     </form> 
     
          <?php }if($row == ""){ ?> <tr><td colspan="7">No Record Found</td></tr><?php } ?>
          </tbody>
      </table>	 
			</div> <!--	no-more-tables -->
       			
      </div> 
       <!--wbox  -->
        
    </div>
 
 

	 

<!-- Center SECTION End=============================================================================================== -->  


 

 

<!--FOOTER SECTION=============================================================================================== --> 
<?php include "inc/footer.php"; ?>