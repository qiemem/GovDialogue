<?php

// validate.php

require_once("lib/usermanagement.php");
require_once("header.php");
printHeader("Validating user", "Keywords", "Description");

if (!isset($_GET['v'])) {
    echo("<p>Error: invalid verification code.</p>");
}
else{
    if (validate_user($_GET['v'])) {
        echo("Email address successfully verified.");
    } else {
        echo("Error from validate_user()");
    }
 }
		
?>

<?php

require_once("footer.php");

?>