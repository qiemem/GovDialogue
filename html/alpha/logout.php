<?php

// logout.php

ob_start();

require_once("lib/sessionmanagement.php");
require_once("header.php");
printHeader("Title", "Keywords", "Description");

if (isUserLoggedIn()) {
    logout();
}
$domain = $_SERVER['HTTP_HOST'];
header("Location: http://$domain/alpha/index.php");
exit();
?>

Logged out.

<?php

require_once("footer.php");
ob_flush();

?>