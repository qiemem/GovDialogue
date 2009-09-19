<?php

// header.php

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


function printHeader($page_title, $page_description, $page_keywords)
{
	?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo($page_title); ?></title>

<link rel="stylesheet" type="text/css" href="styles/global.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/posts.css" media="screen" />

</head>

<body>

<div class="container">
		
		<div class="header">
		
			<h1>Govit <span class="version">alpha</span></h1>
			
			<ul class="nav">
				<li><a href="#">Home</a></li>
				<li><a href="#">All Posts</a></li>
				<li><a href="#">Make New Post</a></li>
				<li><a href="#">Join</a></li>
				<li><a href="#">Login</a></li>
				<li><a href="#">Feedback</a></li>
			</ul>
		
		</div><!-- /.header -->
		
		<div class="content">
	
	<?php
}

?>

		
	
	
	
	