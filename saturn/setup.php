<!DOCTYPE html>
<html>
	<head>
		<title>SATURN &raquo; Set Up</title>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link rel="shortcut icon" href="system/images/favicon.png" type="image/x-icon">
		<link rel="shortcut icon" type="image/ico" href="system/images/favicon.png">
		<style>
		
		li#setuptab {
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
			<h1>Setup</h1><br>
	
			<div class="separater" style="width: 970px; text-align: center;">
			<h2>Progress</h2>
			<div class="node" style="width: 970px; height: inherit; text-align: left;"><br>
		
<?php

if (sha1($_POST['ak']) == 'ae5aef9a6281833b3d72d1e70f76e99ccdc22611') {
	
	$sqlDbName = "saturn";
	$sqla = $_POST['sqladdress'];
	$sqlu = $_POST['sqluser'];
	$sqlp = $_POST['sqlpass'];
	
	$queryOne = @mysql_connect($sqla, $sqlu, $sqlp);
	
	if (!$queryOne) {
		echo 'Unable to connect to MySQL Server<br><br>';
	} else {
		
		echo 'Successfully connected to MySQL Server...<br><br>';
		
		$selestDb = @mysql_select_db($sqlDbName);
		
			echo 'Successfully found database "stestdb"...<br><br>';
			
			$queryTwo = @mysql_query('CREATE TABLE pages (id int(6) NOT NULL auto_increment, name varchar(50) NOT NULL, content longtext NOT NULL, note longtext NOT NULL, PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))');
		
			if (!$queryTwo) {
				echo 'Unable to create table "pages"<br><br>';
			} else {
				
				echo 'Successfully created table "pages"...<br><br>';
			
				$queryThree = @mysql_query('CREATE TABLE contact (id int(6) NOT NULL auto_increment, first varchar(50) NOT NULL, last varchar(50) NOT NULL, email varchar(50) NOT NULL, message longtext NOT NULL, PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))');
				
				if (!$queryThree) {
					echo 'Unable to create table "contact"<br><br>';
				} else {
				
					echo 'Successfully created table "contact"...<br><br>';
					
					echo 'Database format successful. All tables created.<br><br>';
				
				}
				
			}
		
		}
		
	} else {
	echo 'Access Key incorrect. Please refer to README.<br><br>';
}

?>
			</div>
			</div>
			
			<div class="separater" style="width: 970px; text-align: center;">
			<h2>Credentials</h2>
			<div class="node" style="width: 970px; height: inherit; text-align: left;">
					<form method="post">
					<div  style="width: 450px;">
					<div style="float: left;">Authentication Key:<br><input type="text" value="<? echo($_POST['ak']) ?>" spellcheck="false" name="ak" style="width: 200px; text-align: center;"><br><br>
					MySQL Address:<br><input type="text" value="<? echo($sqla) ?>" spellcheck="false" name="sqladdress" style="width: 200px; text-align: center;"><br><br></div>
					<div style="float: right;">
					Username:<br><input type="text" value="<? echo($sqlu) ?>" spellcheck="false" name="sqluser" style="width: 200px; text-align: center;"><br><br>
					Password:<br><input type="password" spellcheck="false" name="sqlpass" style="width: 200px; text-align: center;"><br><br></div>
					<div style="clear: both;"></div>
					<input type="submit" value="Retry"><br><br>
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
