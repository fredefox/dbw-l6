<p>Write a PHP script that for each company write the name of the employees and their salary and the total salary for the company.</p>
<table class='table'>
<tr>
	<th>Employee</th>
	<th>Salary</th>
	<th>Company</th>
	<th>City</th>
	<th>Street</th>
	<th>Total salaries</th>
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
$query .= "ORDER BY company_name";
foreach($DB->query($query) as $row) {
	$city = $row[1];
	$employee_name = $row[2];
	$company_name = $row[0];
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
