<?php
require('access.php');
?>

<?php

//let's get us some info!

//TABLE NAME
$tablename = $dbuser.'info';

//QUERY
$query = "SELECT * FROM `$tablename`";
$result = @mysql_query($query);

$pronum=@mysql_result($result,null,"pronum");
$pubdate=@mysql_result($result,null,"pubdate");
$root=@mysql_result($result,null,"rooturl");
$domain=@mysql_result($result,null,"domreg");
$host=@mysql_result($result,null,"hosting");
$sbid=@mysql_result($result,null,"sandboxid");
$devver=@mysql_result($result,null,"devversion");
$csafile=@mysql_result($result,null,"csafile");
$plan=@mysql_result($result,null,"csaplan");
$privacy=@mysql_result($result,null,"privacy");
$surfile=@mysql_result($result,null,"surveyfile");
$surpub=@mysql_result($result,null,"surveypub");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>SATURN &raquo; Main</title>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link rel="shortcut icon" href="system/images/favicon.png" type="image/x-icon">
		<link rel="shortcut icon" type="image/ico" href="system/images/favicon.png">
		<style>
		
		li#maintab {
		background: #4e4e4e;
		border-radius: 3px;
		-webkit-box-shadow: inset 0 1px 3px black;
		}
		
		</style>
	</head>
	<body>
	<div class="wrap">
		
		<?php include("system/includes/header.php"); ?>
		
		<div class="content">
			<!-- Content -->
			<h1>Welcome to SATURN</h1><br>
			
			<!--<div class="separater" style="width: 970px; text-align: center;">
			<h2>Actions</h2>
			<div class="node" style="width: 970px; height: 210px;">
				<a href="pages.php"><div style="background: url(system/images/editpages.png); cursor: pointer; height: 210px; width: 220px; float: left;"></div></a>
				<div style="background: url(system/images/specificcontent.png); cursor: pointer; height: 210px; width: 220px; float: left;"></div>
				<div style="background: url(system/images/dataentry.png); cursor: pointer; height: 210px; width: 220px; float: left;"></div>
			</div>
			</div>-->
			
			<div class="separater">
			<h2>Project Information</h2>
			<div class="node">
				<h3>Publishing</h3><br>
				<p>Project Number: <? echo($pronum) ?></p><br>
				<p>Publish Date: <? echo($pubdate) ?></p><br>
				<p>Root URL: <? echo($root) ?></p><br>
				<p>Domain Registrar: <? echo($domain) ?></p><br>
				<p>Hosting Provider: <? echo($host) ?></p><br>
				
				<h3>Development</h3><br>
				<p>Sandbox ID: <? echo($sbid) ?></p><br>
				<p>Dev. Version: <? echo($devver) ?></p>
			</div>
			</div>
			
			<div class="separater">
			<h2>Documents</h2>
			<div class="node">
				<h3>Continued Service Agreement</h3><br>
				<p>Filed: <? echo($csafile) ?></p><br>
				<p>Plan: <? echo($plan) ?></p><br>
				
				<h3>Privacy Acknowledgement</h3><br>
				<p>Filed: <? echo($plan) ?></p><br>
				
				<h3>Client Survey</h3><br>
				<p>Filed: <? echo($surfile) ?></p><br>
				<p>Published: <? echo($surpub) ?></p>
			</div>
			</div>

			<div style="clear:both;">
			<?php include("system/includes/footer.php"); ?>
			</div>
			
		</div>
		
	</div>
	</body>
</html>
