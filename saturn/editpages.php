<?php
require('access.php');
?>

<?php
	//TABLE TO CALL
	$tablename = 'pages';

	//VARIABLES
	
	$action = $_REQUEST['action'];
	$pageid = $_REQUEST['pageid'];
	
	$alteraction="";
	
	$alertOne="none";
	$alertTwo="none";
	$alertThree="none";
	
	if (empty($id)) {
		$alteraction='<meta http-equiv="refresh" content="0;url= pages.php" />';
	}
		
		//EDIT PAGE
		
		if ($action == 'edit') {
		
			$alertOne='none';

			$query="SELECT id, name, content, note FROM $tablename WHERE id = '$id'";
			$result=mysql_query($query);
			
			$name=@mysql_result($result,null,"name");
			$content=@mysql_result($result,null,"content");
			$notes=mysql_result($result,null,"note");

			
		}
		
		//SAVE EDIT
		
		if ($action == 'saveedit') {
			
			$query = "UPDATE $tablename SET name = '$newpagename', content = '$newcontent', note = '$newnotes' WHERE id = '$id'";
			mysql_query($query);
			
			if (!mysql_query($query)) {
				$alert = 'Error Saving - Please re-login to database';
			} else {
				$alert = 'Page saved';
			}
			
			$queryTwo="SELECT id, name, content, note FROM $tablename WHERE id = '$id'";
			$result=mysql_query($queryTwo);
			
			$name=mysql_result($result,null,"name");
			$content=mysql_result($result,null,"content");
			$notes=mysql_result($result,null,"note");
						
			$alertOne='visible';
			
		}
		
		//SAVE NOTES
		
		if ($action == 'savenotes') {
			
			$query = "UPDATE $tablename SET note = '$newnotes' WHERE id = '$id'";
			mysql_query($query);
			
			if (!mysql_query($query)) {
				$alert = 'Error Saving - Please re-login to database';
			} else {
				$alert = 'Page saved';
			}
			
			$queryTwo="SELECT id, name, content, note FROM $tablename WHERE id = '$id'";
			$result=mysql_query($queryTwo);
			
			$name=mysql_result($result,null,"name");
			$content=mysql_result($result,null,"content");
			$notes=mysql_result($result,null,"note");
			
			$alertThree='visible';
			
		}
		
		//DELETE PAGE
		
		if ($action == 'delete') {
		
			if ($confirm == 'no') {
			
				$alteraction='<meta http-equiv="refresh" content="0;url= pages.php" />';
			
			} elseif ($confirm == 'yes') {
			
				$query="DELETE FROM $tablename WHERE id='$id'";
				mysql_query($query);
				
				$alteraction='<meta http-equiv="refresh" content="0;url= pages.php" />';
				
			} elseif (empty($confirm)) {
				
				$query="SELECT id, name, content FROM $tablename WHERE id = '$id'";
				$result=mysql_query($query);
				
				$name=@mysql_result($result,null,"name");
				$content=@mysql_result($result,null,"content");
				$alertTwo = 'visible';
			}
		}
		
		//ADD PAGE
		
		if ($action == 'new') {
		
			$query="INSERT INTO $tablename VALUES ('','New Page','Content')";
			mysql_query($query);
			
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>SATURN &raquo; Edit Page &raquo; <? echo($name); ?></title>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link rel="shortcut icon" href="system/images/favicon.png" type="image/x-icon">
		<link rel="shortcut icon" type="image/ico" href="system/images/favicon.png">
		<? echo($alteraction) ?>
		<style>
		
		li#edittab {
		background: #4e4e4e;
		border-radius: 3px;
		-webkit-box-shadow: inset 0 1px 3px black;
		}
		
		.alertOne {
		background: red;
		text-align: center;
		padding: 20px 0;
		display: <?php echo($alertOne); ?>;
		}
		
		.alertTwo {
		background: red;
		text-align: center;
		padding: 20px 0;
		display: <?php echo($alertTwo); ?>;
		}
		
		.alertThree {
		background: red;
		text-align: center;
		padding: 20px 0;
		display: <?php echo($alertThree); ?>;
		}
		
		div.pagelisting {
		border-bottom: 1px dashed white;
		clear: both;
		}
		
		span.pagename {
		float: left;
		clear: both;
		}
		
		div.actions {
		float: right;
		}
		
		div.actions a {
		color: #4e4e4e;
		}
		
		div.actions:hover a {
		color: white;
		cursor: pointer;
		}
		
		.deletelink:hover {
		color: red;
		cursor: pointer;
		}
		
		</style>
<link rel="stylesheet" href="system/texteditor/jquery.wysiwyg.css" type="text/css"/>
<!--[if lt IE 8]><link rel="stylesheet" href="system/texteditor/lib/blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->
<script type="text/javascript" src="system/texteditor/lib/jquery.js"></script>
<script type="text/javascript" src="system/texteditor/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="system/texteditor/controls/wysiwyg.image.js"></script>
<script type="text/javascript" src="system/texteditor/controls/wysiwyg.link.js"></script>
<script type="text/javascript" src="system/texteditor/controls/wysiwyg.table.js"></script>
<script type="text/javascript">
(function ($) {
	$(document).ready(function () {
		$('#wysiwyg').wysiwyg({
			autoGrow: true,
			maxHeight: 400,
			formWidth: 970
		});
	});
})(jQuery);
</script>
	</head>
	<body class="editpage">
	<div class="wrap">
	
	<div class="alertOne">
		<form action="?action=edit&id=<?php echo($id); ?>&alertOne=none" method="post">
		Page "<? echo($name); ?>" Saved. <input type="submit" value="OK">
		</form>
	</div>
		
	<div class="alertTwo">
		<form action="?action=delete&id=<?php echo($id); ?>&confirm=yes" method="post">
		Delete Page "<? echo($name); ?>"? Cannot be Undone. <input type="submit" value="Yes"> <a href="pages.php"><button>Cancel</button></a>
		</form>
	</div>
	
	<div class="alertThree">
		<form>
		Notes for Page "<? echo($name); ?>" Saved. <input type="submit" value="OK">
		</form>
	</div>
		
		<?php include("system/includes/header.php"); ?>
		
		<div class="content">
			<!-- Content -->
			<h1>Edit Page &raquo; <? echo($name); ?></h1><br>
			
			<div class="separater" style="width: 970px;">
			<h2>Edit</h2>
			<div class="node" style="padding-left: 0; height: inherit; clear: both; min-height: 350px; text-align: center; width: 970px; float: none;">
			<form action="?action=saveedit" method="post">
			Name: <input type="text" name="newpagename" maxlength="50" value="<? echo($name); ?>"> ID: <input type="text" readonly="readonly" style="width: 30px;" name="id" value="<? echo($id); ?>"><br><br>
			Content<br>
<textarea id="wysiwyg" rows="5" cols="240" style="width: 960px;" name="newcontent">
<?php echo($content); ?>
</textarea><br>
			<input type="submit" value="Save"><br><br><? echo($alert); ?>
			</form>
			</div>
			</div>
			
			<div class="separater">
			<h2>Page Notes</h2>
			<div class="node" style="height: inherit; min-height: 350px;"><br>
			<form method="post" action="?action=savenotes&id=<? echo($id) ?>">
			<textarea name="notes" style="width: 460px;">
<? echo($notes) ?>
</textarea><br>
			<input type="submit" value="Save"><i> Notes are not displayed publicly</i>
			</form>
			</div>
			</div>
			
			<div class="separater">
			<h2 style="float: left;">Pages</h2>
			<form style="float: right; padding-right: 10px;">
				<a href="?action=new"><button>Add New</button></a>
			</form>
			<div class="node" style="height: inherit; clear: both; min-height: 350px;"><br>
<?

mysql_connect($socket,$dbuser,$dbpass);
@mysql_select_db($dbname) ;
$query="SELECT * FROM $tablename ORDER BY  `id` ASC";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$name=mysql_result($result,$i,"name");
$id=mysql_result($result,$i,"id");

print '<span class="pagename">';
echo "$id. <b>$name</b>";
print '</span>';

print '<div class="actions"><a href="editpages.php?action=edit&id=';
echo($id);
print '">Edit  </a><a href="editpages.php?action=delete&id=';
echo($id);
print '"><span class="deletelink">Delete</span></a></div><div class="pagelisting"></div><br>';

$i++;
}

?>
			</div>
			</div>

			<div style="clear:both;">
			<?php include("system/includes/footer.php"); ?>
			</div>
			
		</div>
		
	</div>
	</body>
</html>
