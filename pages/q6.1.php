<table class='table'>
<tr>
	<th>Employee</th>
	<th>Street</th>
	<th>City</th>
</tr>
<?php
foreach($DB->query("SELECT * FROM employee") as $row) {
	// I wanted to use something like join on the resulting array
	// to only automatically write all the html
	// PDO::query unfortunately returns an array with duplicate values
	// Example: array("0" -> "value", "key" -> "value");
	$employee_name = $row[0];
	$street = $row[1];
	$city = $row[2];
	print "<tr>";
	print "<td>$employee_name</td>";
	print "<td>$street</td>";
	print "<td>$city</td>";
	print "</tr>";
}
?>
</table>
