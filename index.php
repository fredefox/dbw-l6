<!DOCTYPE html>
<html>
<head>
<?php
include("local_settings.php");
include("settings.php");
include("db.php");
?>
<!-- Bootstrap, because it's nice -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class='navbar navbar-default' role='navigation'>
<div class='container-fluid'>

<div class='navbar-header'>
<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>

<div class='navbar-collapse collapse'/>
<ul class='navbar-nav nav'>
<?php
$questions = array("q6.1", "q6.2", "q6.3", "q6.4", "q6.5");
foreach($questions as $q) {
	/*
	TODO: refactor to form?
	print "<form action='index.php?page=$q'>";
	print "<input type='submit' value='page'/>";
	print "</form>";
	*/
	print "<li>";
	print "<a href='index.php?page=$q'>Question $q</a>";
	print "</li>";
}
print "</ul>";
print "</div>";
print "</div>";
print "</div>";
$page = $_GET['page'];
if(isset($page)) {
	print "<h1>Showing question $page</h1>";
	include("pages/$page.php");
}
?>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.js'></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
