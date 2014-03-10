<table>
<tr>
	<th>Employee</th>
	<th>Salary</th>
	<th>Company</th>
</tr>
<?php
$company_name = $_GET['company_name'];
$query = "SELECT * ";
$query .= "FROM works ";
$query .= "WHERE company_name = ?";

$query = $DB->prepare($query);
$query->execute(array($company_name));
while($row = $query->fetch()) {
	$employee = $row[0];
	$company = $row[1];
	$salary = $row[2];
	print "<tr>";
	print "<td>$employee</td>";
	print "<td>$salary</td>";
	print "<td>$company</td>";
	print "</td>";
}
?>
</table>
