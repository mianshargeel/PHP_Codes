<?php ob_start(); session_start(); 
$con = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con, 'pharmacy'); 
include "var.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Kamran">
    <title>Madical Stock</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet" media="all">
    <link href="css/globel.css" rel="stylesheet" media="all">
    <link href="css/style.css" rel="stylesheet" media="all">
    

<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">


	<!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/favicon.png">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  <script language="javascript" src="js/cal2.js"></script>
  <script language="javascript" src="js/cal_conf2.js"></script>
  

 
  </head>
<body>
 <!-- PAGE HEADER=============================================================================================== -->
    <!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://google.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->
    <?php if($page != 14){ ?>
<header class="myNav">
 <div class="tpNav">  
             	<div class="container">
                	 <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt=""/></a>
                   </div>
                    <div class="navbar-collapse collapse">
            
                      <!-- Left nav -->
                
           				  <ul class="nav navbar-nav navR">
                         
                        <li <?php if($page == 1){echo "class='active'";} ?>>
                        	<a href="#">Master</a>
                        
                        <?php
						if($as == 1){
						?>
                                  <ul class="dropdown-menu">
                                  
                                    <li><a href="new_user.php">NEW USER </a></li>
                                    <li><a href="user_list.php">USERS LIST </a></li>
                                     <li><a href="user_pass_change.php">CHANGE PASSWORD</a></li>
                                     <li><a href="logout.php">LOGOUT</a></li>
                             
                                  </ul>
                        <?php } else { ?>
                         <ul class="dropdown-menu">
                                  
                                  
                                     <li><a href="user_pass_change.php">CHANGE PASSWORD</a></li>
                                     <li><a href="logout.php">LOGOUT</a></li>
                             
                                  </ul>
                        <?php } ?>
                        
                        </li>
                     
                        <li <?php if($page == 2){echo "class='active'";} ?>><a href="#">Dealer</a>
                        
                     
                        
                          <ul class="dropdown-menu">
                            <li><a href="add_dealer.php">ADD DEALER </a></li>
                     		<li><a href="dealer_list.php">DEALERS LIST </a></li>
                     
                          </ul>
                        </li>
                        
                        
                        <li <?php if($page == 3){echo "class='active'";} ?>><a href="#">STOCK</a>
                          <ul class="dropdown-menu">
                          
                            <li><a href="purchase.php">PURCHASE</a></li>
                            <li><a href="plist.php">ITEMS LIST</a></li>

                          </ul>
                        </li>
                         

                        <li <?php if($page == 4){echo "class='active'";} ?>><a href="sales.php">SALES</a></li>
                    
                    <?php if($as == 1){?>
                     <li <?php if($page == 5){echo "class='active'";} ?>><a href="#">REPORTS</a>
                          <ul class="dropdown-menu">
                          
                      
                          
                            <li><a href="today_report.php"> TODAY'S REPORT</a></li>
                            <li><a href="sale_report.php">SALE REPORT</a></li>
                            <li><a href="sale_return_report.php">SALE RETURN</a></li>
                            <li><a href="purchase_report.php">PURCHASE</a></li>
                            <li><a href="purchase_return_report.php">PURCHASE RETURN</a></li>

                          </ul>
                        </li>
                     <?php } ?>
                           
                      </ul> <!-- firstList -->
                        
                        
                     </div><!--/.nav-collapse -->
                  </div>
                </div>         
                 
      					
                        
               </div> <!-- tpNav -->	
</header> 
<?php } ?>

