<?php
$con = mysql_connect("localhost", "root", "root") or die(mysql_error());
mysql_select_db($con, "pharmacy") or die(mysql_error());
?>