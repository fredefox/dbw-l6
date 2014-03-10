<table>
<tr>
	<th>Employee</th>
	<th>Salary</th>
	<th>Company</th>
	<th>City</th>
	<th>Street</th>
	<th>total</th>
</tr>
<?php
$query = "SELECT * ";
$query .= "FROM company ";
$query .= "NATURAL JOIN works ";
$query .= "NATURAL JOIN employee ";
$query .= "NATURAL JOIN ( ";
$query .= "SELECT company_name, SUM(salary) AS total ";
$query .= "FROM works ";
$query .= "GROUP BY company_name ";
$query .= ") ";
foreach($DB->query($query) as $row) {
	$city = $row[0];
	$employee_name = $row[1];
	$company_name = $row[2];
	$salary = $row[3];
	$street = $row[4];
	$total = $row[5];
	print "<tr>";
	print "<td>$employee_name</td>";
	print "<td>$salary</td>";
	print "<td>$company_name</td>";
	print "<td>$city</td>";
	print "<td>$street</td>";
	print "<td>$total</td>";
	print "</tr>";
}
?>
</table>
