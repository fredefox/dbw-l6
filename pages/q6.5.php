<?php
$employee_name = $_POST['employee_name'];
//if(!isset($employee_name)) {
	print "<form action='index.php?page=q6.5' method='post'/>";
	print "<label for='employee_name'>Person name</label>";
	print "<input type='text' name='employee_name'/>";
	print "</form>";
//	return;
//}
?>

<table class='table'>
<tr>
	<th>Employee</th>
	<th>City</th>
	<th>Street</th>
</tr>

<?php
$query = "SELECT * ";
$query .= "FROM employee ";
$query .= "WHERE REGEXP_LIKE (employee_name, ?,'i')";

$query = $DB->prepare($query);
$query->execute(array($employee_name));
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
