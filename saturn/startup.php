<!DOCTYPE html>
<html>
	<head>
		<title>SATURN &raquo; Set Up</title>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link rel="shortcut icon" href="system/images/favicon.png" type="image/x-icon">
		<link rel="shortcut icon" type="image/ico" href="system/images/favicon.png">
		<style>
		
		li#welcometab {
		background: #4e4e4e;
		border-radius: 3px;
		-webkit-box-shadow: inset 0 1px 3px black;
		}
		
		ul {
		color: white;
		}
		
		div.nav ul li:hover {
		font-size: 14px;
		line-height: 30px;
		color: white;
		display: inline;
		margin: 0 6px;
		padding: 4px 8px;
		cursor: default;
		background: none;
		-webkit-box-shadow: none;
		-moz-box-shadow: none;
		box-shadow: none;
		}
		
		</style>
	</head>
	<body>
	<div class="wrap">
		
		<div class="header">
			<div class="lefttitle">
			<!-- Title Image -->
			</div>
			<div class="rightnav">
			<!-- Add Nav Content Here -->
			</div>
		</div>
		
		<div class="nav">
			<!-- Menu UL -->
			<ul>
				<li id="welcometab">Welcome</li>
				&raquo;
				<li id="setuptab">Set Up</li>
			</ul>
		</div>
		
		<div class="content">
			<!-- Content -->
			<h1>Welcome to SATURN</h1><br>
			
			<div class="separater" style="width: 970px; text-align: center;">
			<h2>Setup</h2>
			<div class="node" style="width: 970px; height: inherit; text-align: left;">
				<h3>Welcome to SATURN CMS</h3>
				<h5>A different kind of CMS</h5><br>
				<p>I hope that you'll enjoy using SATURN with your site. With SATURN you can edit/create/delete pages, view entered data, and more. I constantly update SATURN to add new features and increase it's functionality. <br><br>Before you can get behind the wheel, we'll have to set up the basic databases. Please read the README file before using this setup page.</p><br><br>
				<form method="post" action="setup.php" style="text-align: center;">
					<div  style="width: 450px;">
					<div style="float: left;">Authentication Key:<br><input type="text" spellcheck="false" name="ak" style="width: 200px; text-align: center;"><br><br>
					MySQL Address:<br><input type="text" value="localhost" spellcheck="false" name="sqladdress" style="width: 200px; text-align: center;"><br><br></div>
					<div style="float: right;">
					Username:<br><input type="text" spellcheck="false" name="sqluser" style="width: 200px; text-align: center;"><br><br>
					Password:<br><input type="password" spellcheck="false" name="sqlpass" style="width: 200px; text-align: center;"><br><br></div>
					<div style="clear: both;"></div>
					<input type="submit" value="Continue"><br><br>
				</div>
				</form>
			</div>
			</div>
			
			<div style="clear:both;">
			<?php include("system/includes/footer.php"); ?>
			</div>
			
		</div>
		
	</div>
	</body>
</html>
