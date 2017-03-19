<?php include "pass_check.php"; include "inc/head.php"; ?>
 <!-- Center =============================================================================================== -->
	<div class="container">
    	<div class="row headingSection">
        	<div class="col-lg-4 col-md-4 col-sm-4 ">
            	 <div class="input-group">
        
                 <input type="text" class="search form-control" placeholder="Search Here">
                 <span class="counter"></span>
               
               
                </div><!-- /input-group -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 ">
              <h1>users LIST</h1></div>
            <div class="col-lg-4 col-md-4 col-sm-4 text-right">
             
           	 <span class="btn back"><a href="index.php"><i class="fa fa-arrow-left"></i>Back</a></span>
            </div>
        </div> <!-- headingSection -->
        
       <div class="wbox mytable">
       		  
                
		<div class="no-more-tables">	
			<table class="table table-hover table-bordered results">
       			 <thead>
                
          <tr>
            <th>User Name</th>
            <th ><span class="center">Contact No</th>
            <th ><span class="center">Alt-Contact No</span></th>
             <th ><span class="center">Address</span></th>
            <th width="13%"><span class="center">Action</span></th>
          </tr>
        </thead>
        <tbody>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
          
          <?php
		  while($data = mysql_fetch_assoc($user_liar)){
		  ?>
          <tr>
            <td data-title="Item Name"><?php echo $data['user_name']; ?></td>
            <td data-title="Qty"><span class="center"><?php echo $data['ucontact']; ?></span></td>
            <td data-title="TP"><span class="center"><?php echo $data['ualtcontact']; ?></span></td>
            <td data-title="Qty"><span class="center"><?php echo $data['address']; ?></span></td>
            <td data-title="Action">
            	<div class="iconSection">   
          <a href="dell_user.php?u_id=<?= $data['uid']; ?>">  <button class="btn"> <i class="fa fa-trash"> </i></button> </a>
          <a href="edit_user.php?u_id=<?= $data['uid']; ?>">  <button class="btn"> <i class="fa fa-edit"> </i></button> </a>
          <a href="view_user.php?u_id=<?= $data['uid']; ?>">  <button class="btn"> <i class="fa fa-search"> </i></button> </a>
              
                </div>
            </td>
          </tr>
          <?php } ?>
          
          </tbody>
      </table>	 
			</div> <!--	no-more-tables -->
       			
      </div> 
       <!--wbox  -->
        
    </div>
 
<?php include "inc/footer.php"; ?>