<?php
require('access.php');
?>

<?php
//TABLE TO CALL
$tablename = 'pages';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>SATURN &raquo; Edit Pages</title>
		<link rel="stylesheet" type="text/css" href="system/style.css"/>
		<link rel="shortcut icon" href="system/images/favicon.png" type="image/x-icon">
		<link rel="shortcut icon" type="image/ico" href="system/images/favicon.png">
		<style>
		
		li#edittab {
		background: #4e4e4e;
		border-radius: 3px;
		-webkit-box-shadow: inset 0 1px 3px black;
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
	</head>
	<body>
	<div class="wrap">
		
		<?php include("system/includes/header.php"); ?>
		
		<div class="content">
			<!-- Content -->
			<h1>Edit Pages</h1><br>
			
			<div class="separater">
			<h2 style="float: left;">Pages</h2>
			<form style="float: right; padding-right: 10px;">
				<a href="editpages.php?action=new"><button>Add New</button></a>
			</form>
			<div class="node" style="height: inherit; clear: both; min-height: 350px;"><br>
<?

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
			
			<div class="separater">
			<h2>Help</h2>
			<div class="node" style="padding-left: 10px;">
				<h3>Editing Pages</h3>
				<p>Type the page ID (number by each page name) in the box, select "Edit" and click "Go".</p><br>
				<h3>Deleting Pages</h3>
				<p>Type the page ID (number by each page name) in the box, select "Delete" and click "Go".</p><br>
				<h3>Adding Pages</h3>
				<p>Click the "Add Page" button. Then, type the page ID (number by the new page name) in the box, select the "Edit" button and click "Go".</p>
			</div>
			</div>

			<div style="clear:both;">
			<?php include("system/includes/footer.php"); ?>
			</div>
			
		</div>
		
	</div>
	</body>
</html>
