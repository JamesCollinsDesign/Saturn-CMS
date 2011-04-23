<?php

//START SATURN SESSION
session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

//LAST VISIT COOKIE
if(isset($_COOKIE['lastVisit'])) {
	$visit = $_COOKIE['lastVisit'];
	$lastvisit = $visit;
} else {
	$lastvisit = "Error Retrieving";
}

//TIMEOUT
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) { //Set for one hour
    //SET LAST VISIT COOKIE
	$expire = 60 * 60 * 24 * 60 + time(); 
	setcookie('lastVisit', date("M j, Y"), $expire);
	$_SESSION['dbuser'] = "";
	$_SESSION['dbpass'] = "";
	$_SESSION['loggedIn'] = false;   // destroy session
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

//NO SHOW SETUP DIALOUGE
if ($action == 'noshow') {
	$expire = 10000000 * 60 * 24 * 60 + time(); 
	setcookie('noshow', 'none', $expire);
} elseif (isset($_COOKIE['noshow'])) {
	$noshow = $_COOKIE['noshow'];
	$expire = 10000000 * 60 * 24 * 60 + time(); 
	setcookie('noshow', 'none', $expire);
} else {
	$noshow = "visible";
}

//LOAD SOCKET
$sfile = "system/socket.txt";
$fh = fopen($sfile, 'r');
$socket = fread($fh, filesize($sfile));
fclose($fh);

//SYSTEM VARs
$dbname = "saturn";
$noshow = "none";

//LOGIN
if (isset($_POST['password']) && isset($_POST['username'])) {
	$_SESSION['loggedIn'] = true;
	$_SESSION['dbuser'] = $_POST['username'];
	$_SESSION['dbpass'] = $_POST['password'];
	$dbuser = $_SESSION['dbuser'];
	$dbpass = $_SESSION['dbpass'];
			
	$link = @mysql_connect($socket, $dbuser, $dbpass);
	
	if (!$link) {
		$connectionstatus = '<span style="background-color: red; padding: 5px;">Failure</span>';
		$_SESSION['loggedIn'] = false;
	} else {
	
	$connectionstatus = '<span style="background-color: green; padding: 5px;">Live</span>';
	@mysql_select_db($dbname);		
	
	}

} elseif (isset($_SESSION['dbuser']) && isset($_SESSION['dbpass'])) {
	
	$link = @mysql_connect($socket, $dbuser, $dbpass);
	
	if (!$link) {
		$connectionstatus = '<span style="background-color: red; padding: 5px;">Failure</span>';
	} else {
	
	$connectionstatus = '<span style="background-color: green; padding: 5px;">Live</span>';
	@mysql_select_db($dbname);		
	
	}
}

//IF CREDITIALS ARE EMPTY
if (empty($_SESSION['dbuser']) || empty($_SESSION['dbpass'])) {
	$_SESSION['loggedInDB'] = false;
	$connectionstatus = '';
}

if (!$_SESSION['loggedIn']): ?>

<html>
<head>
	<title>Login - SATURN CMS</title>
	<script src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
	<style>
	
	html {
	background: black;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	}
	
	body {
	width: 400px;
	margin: 0 auto;
	}
	
	div {
	padding-top: 100px;
	background: url(system/images/saturn.png) no-repeat;
	width: 400px;
	margin: 100px auto 0 auto;
	}
	
	div div {
	background: grey;
	width: 400px;
	text-align: center;
	border-radius: 15px;
	font: 20px Arial;
	color: white;
	text-shadow: 0px 1px 0 black;
	margin: 0;
	padding: 0;
	}
	
	p {
	margin-top: 0;
	}
	
	button, input {
		
		background-color: #444444;
		background-image: -moz-linear-gradient(top, #808080, #444444); 
		background-image: -ms-linear-gradient(top, #808080, #444444); 
		background-image: -o-linear-gradient(top, #808080, #444444); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(#808080), to(#444444)); 
  		background-image: -webkit-linear-gradient(top, #808080, #444444); 
	  	background-image: linear-gradient(top, #808080, #444444);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#808080', EndColorStr='#444444'); 
		
		outline: none;
		border-radius: 40px;
		color: white;
		border-width: 0;
		text-shadow: 0 -1px 1.5px #444;
		font-size: 16px;
		padding: 6px 9px;
		
		}
		
		input[type="text"], input[type="password"] {
		
		border-radius: 0;
		background-image: none;
		-webkit-box-shadow: inset 0 0 5px black;
		-moz-box-shadow: inset 0 0 5px black;
		box-shadow: inset 0 0 5px black;
		float: right;
		
		}
		
		button:hover, input[type="submit"]:hover {
		
		background-color: #444444;
		background-image: -moz-linear-gradient(top, #808080, #999999); 
		background-image: -ms-linear-gradient(top, #808080, #999999); 
		background-image: -o-linear-gradient(top, #808080, #999999); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(#808080), to(#999999)); 
  		background-image: -webkit-linear-gradient(top, #808080, #999999); 
	  	background-image: linear-gradient(top, #808080, #999999);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#808080', EndColorStr='#999999'); 
		
		cursor: pointer;
		text-shadow: 0 -1px 1.5px #444;
		
		}
		
		form {
		width: 300px;
		margin: 0 50px;
		}
		
		div.sanity {
		clear: both;
		}
		
		span {
		float: left;
		padding-top: 6px;
		}
		
		span.pass {
		padding-left: 5px;
		}
		
		div.startup {
		background: #FDFFB8;
		padding: 10px;
		display: block;
		text-align: center;
		margin: 20px auto;
		font-family: sans-serif;
		display: <? echo($noshow); ?>;
		}
		
		div.startup p {
		margin-bottom: 0;
		color: gray;
		text-decoration: none;
		}
		
		div.startup a p {
		cursor: pointer;
		text-decoration: none;
		}
		
		div.startup a {
		color: blue;
		cursor: pointer;
		text-decoration: none;
		}
		
	</style>
</head>
  <body>
  
  <div class="startup">
  Welcome to SATURN! See <a href="readme.php"><i>Read Me</i></a> or <a href="startup.php"><i>Setup Database</i></a>
  <a href="?action=noshow"><p>Don't show again</p></a>
  </div>
  
  <div>
  <div>
    <p>Please Login</p>
    <form method="post">
      <span>Username:</span> <input type="text" name="username" spellcheck="false"> <div class="sanity"></div><br />
      <span class="pass"> Password:</span> <input type="password" name="password"> <div class="sanity"></div><br />
      <input type="submit" name="submit" value="Login"> <br /><br />
      <?php echo($connectionstatus); ?>
    </form>
   </div>
   </div>
  </body>
</html>

<?php
exit();
endif;
?>