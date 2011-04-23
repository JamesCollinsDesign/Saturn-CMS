<?php
require('access.php');
?>

<?

//TABLE NAMEs
$dataOne = $dbuser.'contact';

if ($a == 'clear') {
	
	$queryTwo="TRUNCATE TABLE `$entry`";
	mysql_query($queryTwo);
	
	echo($queryTwo);
}

if ($a == 'delete') {
	
	$queryTwo="DELETE FROM `$entry` WHERE `id` = $idpost LIMIT 1";
	mysql_query($queryTwo);

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>SATURN &raquo; Data Entry</title>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link rel="shortcut icon" href="system/images/favicon.png" type="image/x-icon">
		<link rel="shortcut icon" type="image/ico" href="system/images/favicon.png">
		<style>
		
		li#datatab {
		background: #4e4e4e;
		border-radius: 3px;
		-webkit-box-shadow: inset 0 1px 3px black;
		}
		
		.dbresult {
		display: block;
		clear: both;
		border-bottom: 1px dashed white;
		padding: -4px;
		}
		
		.dbinfo {
		float: left;
		}
		
		.dbactions {
		float: right;
		}
		
		div.listing {
		border-bottom: 1px dashed white;
		clear: both;
		}
		
		span.entry {
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
		
		ul {
		padding-left: 15px;
		}
		
		ul li {
		width: 440px;
		}
		
		</style>
	</head>
	<body>
	<div class="wrap">
		
		<?php include("system/includes/header.php"); ?>
		
		<div class="content">
			<!-- Content -->
			<h1>Data Entry</h1><br>
			
			<div class="separater">
			<h2 style="float: left;">Entry: Guestbook</h2>
			<div style="float: right;">
			<form style="padding-right: 10px; display: inline;">
						<input type="submit" value="Refresh">
				</form>
				<form style="padding-right: 10px; display: inline;" method="post" action="?a=clear&entry=<? echo($dataOne) ?>">
						<input type="submit" value="Clear">
				</form>
			</div>
			<div class="node" style="height: inherit; clear: both; min-height: 350px;">
				<ul>
<?

$query="SELECT * FROM $dataOne ORDER BY  `id` ASC";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {

$id=mysql_result($result,$i,"id");
$first=mysql_result($result,$i,"first");
$last=mysql_result($result,$i,"last");
$email=mysql_result($result,$i,"email");

print '<span class="entry">';
echo "<li> <b>$first $last</b><br>E-mail: $email</span>";

print '<div class="actions"><a href="?a=delete&entry=';
echo ($dataOne);
print '&idpost=';
echo($id);
print '"><span class="deletelink">Delete</span></a></div><div class="listing"></div></li><br>';

$i++;
}

?>
</ul>
<div style="clear:both;"></div>
			</div>
			</div>
			
			<div class="separater">
			<h2>Help</h2>
			<div class="node" style="padding-left: 10px;">
				<h3>Refreshing Entry List</h3>
				<p>Click the "Refresh" button.</p><br>
				<h3>Clearing All Entries</h3>
				<p>Click the "Clear" button. Cannot be undone.</p><br>
				<h3>Delete Specific Entry</h3>
				<p>Type the entry ID (number to the left of entry title) in the box, then click the "Delete" button. Cannot be undone.</p><br>
			</div>
			</div>
			
			<div style="clear:both;">
			<?php include("system/includes/footer.php"); ?>
			</div>
			
		</div>
		
	</div>
	</body>
</html>