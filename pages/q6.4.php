<?php
$person = $_POST['person'];
if(!isset($person)) {
	print "<h2>Supply some information</h2>";
	print "<form action='index.php?page=q6.4' method='post'/>";
	print "<label for='person'>Employee name</label>";
	print "<input type='text' name='person'/>";
	print "</form>";
	return;
}
print "<h2>Management hierarchy for $person</h2>";
class HierarchyFinder {
	function __construct() {
		global $DB;
		$query = "SELECT * ";
		$query .= "FROM manages ";
		$query .= "WHERE manager_name = ?";
		$this->query = $DB->prepare($query);
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

