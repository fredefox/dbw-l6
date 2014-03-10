<?php
try {
	$DB = new PDO('oci:dbname=//localhost:1521/dbwc', DB_USER, DB_PASS);
} catch (PDOException $e) {
	include("error.php");
	exit(1);
}
?>

