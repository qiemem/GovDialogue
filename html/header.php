<?php

// header.php

// Set page information
if (!isset($page_title)) { $page_title = "Default title"; }
if (!isset($page_description)) { $page_description = "Default description"; }
if (!isset($page_keywords)) { $page_keywords = "Default keywords"; }


// Assign global variables based on the user session
// Most values will remain empty unless the user is logged in

session_start();
$user_isLoggedIn = false;
$user_id = "";
$user_fullname = "";
$user_username = "";
$user_email = "";
$user_zipcode = "";

if (isset($_SESSION['user']))
{
	$user_isLoggedIn = true;
	$user_id = $_SESSION['user']['id'];
	$user_fullname = $_SESSION['user']['fullname'];
	$user_username = $_SESSION['user']['username'];
	$user_email = $_SESSION['user']['email'];
	$user_zipcode = $_SESSION['user']['zipcode'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo($page_title); ?></title>

</style>

</head>

<body>

<h1>Govit</h1>
	
	
	
	
	