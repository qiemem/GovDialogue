<?php

// header.php


// Get common configurations and functions
require_once("common.php");


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

<style type="text/css">

ul.nav
{
	list-style-type: none;
	margin: 0;
	padding: 0;
}

ul.nav li
{
	border: 1px solid #999999;
	display: inline;
	padding: 5px;
}

</style>

</head>

<body>

<h1>User Login System</h1>

	<p><?php if ($user_isLoggedIn) { echo('Logged in as ' . $user_fullname . '.'); } else { echo('Not logged in.'); } ?></p>

	<ul class="nav">
	
		<?php
		// Nav bar
		// If logged in: Home, Edit Profile, Logout
		// Else: Home, Join, Login
		if ($user_isLoggedIn)
		{ 
			?>
			<li><a href="index.php">Home</a></li>
			<li><a href="editprofile.php">Edit Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php
		}
		else
		{
			?>
			<li><a href="index.php">Home</a></li>
			<li><a href="join.php">Join</a></li>
			<li><a href="login.php">Login</a></li>
			<?php
		} 
		?>
	
	</ul>
	
	
	
	
	