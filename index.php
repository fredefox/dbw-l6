<!DOCTYPE html>
<html>
<head>
<title>dbw - fjh318</title>
<?php
include("local_settings.php");
include("settings.php");
include("db.php");
?>
<!-- Bootstrap, because it's nice -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class='navbar navbar-default container-fluid' role='navigation'>

<div class='navbar-header'>
<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class='navbar-brand'>Lab 6</a>
</div>

<div class='navbar-collapse collapse'/>
<ul class='navbar-nav nav'>
<?php
$questions = array("6-1", "6-2", "6-3", "6-4", "6-5");
$page = $_GET['question'];
if($page and !in_array($page, $questions)) {
	// TODO: Redirect to error page.
}
foreach($questions as $q) {
	if($q == $page) {
		$class = "class='active'";
//	print "q=$q, page=$page";
	} else {
		unset($class);
	}
	/*
	TODO: refactor to form?
	print "<form action='index.php?page=$q'>";
	print "<input type='submit' value='page'/>";
	print "</form>";
	*/
	print "<li $class>";
	print "<a href='index.php?question=$q'>Question $q</a>";
	print "</li>";
}
print "</ul>";
print "</div>";
print "</div>";

print "<div class='container'>";
if(isset($page)) {
	include("pages/question-$page.php");
}
print "</div>";
?>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.js'></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src='site.js'></script>
</body>
</html>
