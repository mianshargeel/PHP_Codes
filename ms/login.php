<?php 
mysql_connect("localhost", "root", "root");
mysql_select_db("pharmacy"); 
session_start();
if(isset($_POST['submit'])){
	$user	=	md5($_POST['uname']);
	$pass	=	md5($_POST['upass']);
	
	$query	=	mysql_query("select * from tbl_user where uname='$user' && upass='$pass' ") or die(mysql_error());
	$row	=	mysql_num_rows($query);
	$data	=	mysql_fetch_array($query);
	$user_name = $data['user_name'];
	$as = $data['status'];
	
	if($row > 0){
		$_SESSION['nm'] =	$user_name;
		$_SESSION['status'] =	$as;
		$_SESSION['signedin']	=	"Successful";
		header("Location:sales.php");
		}else{$msg = "Invalid Username Or Password try again";}
	}
?>
<html>
<head><title></title>
<link href="css/style.css" rel="stylesheet" media="all">
</head>
<body>
<div class="im">
	<div class="im-inner">
    <form method="post" enctype="multipart/form-data" action="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td align="center" valign="middle"><h1>Login Area</h1></td>
          </tr>
          <?php
		  if($msg != ""){
		  ?>
          <tr>
            <td align="center" valign="middle"><h3><?= $msg; ?></h3></td>
          </tr>
          <?php } ?>
          <tr>
            <td align="center" valign="middle"><input type="text" name="uname" placeholder="Enter Username" autocomplete="off" ></td>
          </tr>
          <tr>
            <td align="center" valign="middle"><input type="password" name="upass" placeholder="password"></td>
          </tr>
          <tr>
            <td align="center" valign="middle"><input type="submit" value="Login Now" name="submit"></td>
          </tr>
        </tbody>
      </table>
    </form>
    </div>

</div>

</body>
</html>
