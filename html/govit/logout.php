<?php

// logout.php

require_once("lib/sessionmanagement.php");
require_once("header.php");
printHeader("Title", "Keywords", "Description");

logout();

?>

Logged out.

<?php

require_once("footer.php");

?>