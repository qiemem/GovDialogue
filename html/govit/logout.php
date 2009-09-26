<?php

// logout.php

ob_start();

require_once("lib/sessionmanagement.php");
require_once("header.php");
printHeader("Title", "Keywords", "Description");

if (isUserLoggedIn())
{
	logout();
	header("Location: http://dev.morninj.com/govit/logout.php");
	exit();	
}

?>

Logged out.

<?php

require_once("footer.php");
ob_flush();

?>