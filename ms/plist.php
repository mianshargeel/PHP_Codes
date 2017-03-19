<?php $page = 3; include "pass_check.php"; include "inc/head.php"; ?>
 <!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="row headingSection">
        	<div class="col-lg-4 col-md-4 col-sm-4 ">
            	 <div class="input-group">
        
                 <input type="text" autofocus class="search form-control" placeholder="Search Here">
                 <span class="counter"></span>
               
               
                </div><!-- /input-group -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 "><h1>ITEMS STOCK</h1></div>
            <div class="col-lg-4 col-md-4 col-sm-4 text-right">
            <?php
			if($tmp_bill != ""){
			?>
             
             <?php if($purch == 1){ ?>
             <span class="btn back"><a href="purchase_bill.php"><i class="fa fa-calculator"></i><?php echo "Items: ". "$tmp_bill  | " . "Rs: " . "$cnt"; ?></a></span>
           	<?php } ?>
            
            <?php if($purch_r == 1){ ?>
             <span class="btn back"><a href="purchase_return_bill.php"><i class="fa fa-calculator"></i><?php echo "Items: ". "$tmp_bill  | " . "Rs: " . "$cnt"; ?></a></span>
           	<?php } ?>
            
            
			
			<?php } ?>
             <span class="btn back"><a href="sales.php"><i class="fa fa-arrow-left"></i>Back</a></span>
            </div>
        </div> <!-- headingSection -->
        
       <div class="wbox mytable">
       			<div class="totall"><B>STOCK AMOUNT</B> = With Bonus<span> 
				<?php echo $with_bonus; ?>
             </span>Rs,  Non-Bonus: <span><?php echo $without_bonus; ?></span> Rs. </div>
             
             
              <?php
		 $get_qry1		=	mysql_query("select * from tbl_stock");
		 while($data2	=	mysql_fetch_array($get_qry1)){
			
			$quantity2	=	$data2['qty'] + $data2['bonus'];
			$stck		=	$data2['up'] * $quantity2;
			$stck1		+=	$stck;	
			
			
		 }
		 ?>
             
             <div class="totall">
             <B>AVAILABLE STOCK AMOUNT = </B><span><?= $stck1; ?></span>
             </div>
             
           
                
               
		
                
                
		<div class="no-more-tables">	
			<table class="table table-hover table-bordered results">
       			 <thead>
                
          <tr>
            <th>Item Name</th>
            <th><span class="center">Type</span></th>
           <!-- <th><span class="center">Code</span></th> -->
            <th ><span class="center">Qty</span></th>
            <th ><span class="center">TP</span></th>
            <th ><span class="center">UP</span></th>
            <th><span class="center">TA</span></th>
            <th width="13%"><span class="center">Action</span></th>
          </tr>
        </thead>
        <tbody>
        <tr class="warning no-result">
          <td colspan="8"><i class="fa fa-warning"></i> No result</td>
        </tr>
         <?php
		 $get_qry		=	mysql_query("select * from tbl_stock");
		 while($data	=	mysql_fetch_array($get_qry)){
			
			$row		=	mysql_num_rows($get_qry);
			$quantity	=	$data['qty'] + $data['bonus'];
		 ?>
          <tr>
            <td data-title="Item Name"><?php echo ucfirst($data['name']); ?></td>
            <td data-title="Type"><span class="center"><?php echo $data['type']; ?></span></td>
          <!--  <td data-title="Code"><span class="center">0524604694</span></td> -->
            <td data-title="Qty"><span class="center"><?php echo $quantity; ?></span></td>
            <td data-title="TP"><span class="center"><?php echo $data['tp']; ?></span></td>
            <td data-title="UP"><span class="center"><?php echo $data['up']; ?></span></td>
            <td data-title="TA"><span class="center"><?php echo $data['tp'] * $quantity; ?></span></td>
            <td data-title="Action">
              <div class="iconSection">   
              <a href="stock_dell.php?s_id=<?= $data['stock_id']; ?>"><button class="btn"> <i class="fa fa-trash"> </i></button></a>
              <a href="update_purchase.php?stock_id=<?= $data['stock_id']; ?>"> <button class="btn"> <i class="fa fa-edit"> </i></button></a>
              <a href="view_purchase.php?stock_id=<?= $data['stock_id']; ?>"> <button class="btn"> <i class="fa fa-search">	 	</i></button></a>
              <a href="edit_purchase.php?stock_id=<?= $data['stock_id']; ?>"> <button class="btn"> <i class="fa fa-rotate-left"> </i></button></a>
                </div>
            </td>
          </tr>
         
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