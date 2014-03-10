<!DOCTYPE html>
<html>
<head>
<?php
include("local_settings.php");
include("settings.php");
include("db.php");
?>
</head>
<body>
<?php
$questions = array("q6.1", "q6.2", "q6.3", "q6.4", "q6.5");
print "<div>";
foreach($questions as $q) {
	/*
	TODO: refactor to form?
	print "<form action='index.php?page=$q'>";
	print "<input type='submit' value='page'/>";
	print "</form>";
	*/
	print "<div><a href='index.php?page=$q'>Question $q</a></div>";
}
print "</div>";
$page = $_GET['page'];
if(isset($page)) {
	print "<h1>Showing question $page</h1>";
	include("pages/$page.php");
}
?>

