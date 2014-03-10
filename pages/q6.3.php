<?php
$company_name = $_POST['company_name'];
if(!isset($company_name)) {
	print "<form action='index.php?page=q6.3' method='post'/>";
	print "<label for='company_name'>Company name</label>";
	print "<input type='text' name='company_name'/>";
	print "</form>";
	return;
}
?>

<table>
<tr>
	<th>Employee</th>
	<th>Salary</th>
	<th>Company</th>
</tr>

<?php
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
