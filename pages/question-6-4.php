<p>Write in PHP a script that can take as input an employee and write the manager hierarchy (thats their managers and the managers managers etc.)</p>
<?php
$person = $_POST['person'];
if(!isset($person)) {
	print "<h2>Supply some information</h2>";
	print "<form action='index.php?question=6-4' method='post'/>";
	print "<label for='person'>Employee name</label>";
	print "<input type='text' name='person'/>";
	print "</form>";
	return;
}
print "<h2>Management hierarchy for $person</h2>";
class HierarchyFinder {
	function __construct() {
		global $DB;
		$query = "SELECT employee_name ";
		$query .= "FROM manages ";
		$query .= "WHERE manager_name = ?";
		$this->query = $DB->prepare($query);
		$this->people_seen = array();
	}
	function getManagedPersons($manager) {
		$this->query->execute(array($manager));
		$result = array();
		while($row = $this->query->fetch()) {
			$result[] = $row;
		}
		return $result;
	}
	function getManagedHierarchy($manager, &$res) {
		// Check for circular reference.
		if(in_array($manager, $this->people_seen)) {
			return $res;
		}
		$this->people_seen[] = $manager;
		print "<ul>$manager";
		$managedPersons = $this->getManagedPersons($manager);
		foreach($managedPersons as $p) {
			$tmp = array();
			$name = $p[0];
			$res[] = array($name => $tmp);
			$this->getManagedHierarchy($name, $tmp);
		}
		print "</ul>";
		return $res;
	}
}
$h = new HierarchyFinder();
$tmp = array();
$hierarchy = $h->getManagedHierarchy($person, $tmp);
?>

