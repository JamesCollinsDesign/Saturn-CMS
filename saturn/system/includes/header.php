<style>

span.dbconinfo {
border-bottom: 1px dotted white;
}

</style>

<div class="header">
			<a href="index.php">
			<div class="lefttitle">
			<!-- Title Image -->
			</div>
			</a>
			<div class="rightnav">
			<span>
				Connection: <?php echo($connectionstatus); ?> 
			</span>
			<span> 
			User: <span class="dbconinfo"><?php echo($dbuser); ?></span>
			</span>
			Last Login: <span class="dbconinfo"><?php echo($lastvisit); ?></span>
			</div>
		</div>
		
		<div class="nav">
			<!-- Menu UL -->
			<ul>
				<a href="index.php"><li id="maintab">Main</li></a>
				<a href="pages.php"><li id="edittab">Edit Pages</li></a>
				<a href="dataentry.php"><li id="datatab">Data Entry</li></a>
				<!--<a href="database.php"><li id="setuptab">Database</li></a>-->
				<!--<a href="settings.php"><li id="settingstab">Settings</li></a>-->
				<!--<a href="help.php"><li id="helptab">Help</li></a>-->
				<a href="../"><li id="viewtab">View Site</li></a>
				<span style="float: right;"><a href="logout.php"><li id="logouttab">Logout</li></a></span>
			</ul>
		</div>