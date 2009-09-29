<?php

// allposts.php

require_once("lib/errormanagement.php");
require_once("lib/postdisplay.php");

// TODO: add meta information
require_once("header.php");
printHeader("Add post", "Keywords", "Description", "allposts");

?>

<h2>All Posts</h2>

<?php


list_posts();

require_once("footer.php");

?>