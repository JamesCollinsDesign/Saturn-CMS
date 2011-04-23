<?php
	
    session_start();
    
    //SET LAST VISIT COOKIE
	$expire = 60 * 60 * 24 * 60 + time(); 
	setcookie('lastVisit', date("M j, Y"), $expire); 
    
    $_SESSION['dbuser'] = "";
	$_SESSION['dbpass'] = "";
    $_SESSION['loggedIn'] = false;
    header( 'Location: ../' ) ;
    
?>