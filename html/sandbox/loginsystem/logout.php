<?php
ob_start();

// logout.php

require_once("header.php");

if ($user_isLoggedIn) {
	session_destroy();
	header("Location: " . $_SERVER["PHP_SELF"]);
	exit();
}
else
{
	echo("<p>You've been successfully logged out.</p>");
}

require_once("footer.php");

ob_flush();
?>