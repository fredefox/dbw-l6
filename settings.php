<?php
function defifndef($var, $val) {
	if(!defined($var)) {
		define($var, $val);
	}
}
// Override these settings in local_settings.php
defifndef("DB_USER", "");
defifndef("DB_PASS", "");
?>
