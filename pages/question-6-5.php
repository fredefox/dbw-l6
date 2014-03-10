<p>Write a HTML form with a textfield and a submit button that can search for employees. If you write a word in the form and press submit the application should return a list with all employees with that name. Remember that the form should also be part of the result such that one can enter another query.</p>
<?php
$employee_name = $_POST['employee_name'];
//if(!isset($employee_name)) {
	print "<div class='row col-sm-12'>";
	print "<form action='index.php?question=6-5' method='post'/>";
	print "<label for='employee_name'>Person name</label>";
	print "<input type='text' name='employee_name'/>";
	print "</form>";
	print "</div>";
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
