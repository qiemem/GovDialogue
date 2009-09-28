<?php
// index.php

require_once("lib/userdisplay.php"); // to display the login form;
require_once("lib/usermanagement.php");
require_once("lib/sessionmanagement.php");

require_once("header.php");
printHeader("Title", "Keywords", "Description");
?>

<h2>Welcome</h2>

<?php
if(is_logged_in()){
    print_greeting_box("indexLoginBox");
 }else{
    print_login_box("indexLoginBox");
 }

?>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<div class="clearBoth"></div>

<?php
require_once("footer.php");
?>