<?php

// header.php

// Assign global variables based on the user session
// Most values will remain empty unless the user is logged in

session_start();

function isUserLoggedIn() { return isset($_SESSION['user']); }


// **The following lines should correspond to create_session() lib/sessionmanagement.php
$user_id = "";
$user_firstname = "";
$user_lastname = "";
$user_email = "";
$user_canpost = "";

if (isset($_SESSION['user']))
{
	$user_id = $_SESSION['user']['id'];
	$user_firstname = $_SESSION['user']['firstname'];
	$user_lastname = $_SESSION['user']['lastname'];
	$user_email = $_SESSION['user']['email'];
	$user_canpost = $_SESSION['user']['email'];
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
<link rel="stylesheet" type="text/css" href="styles/forms.css" media="screen" />

<script language="javascript" type="text/javascript" src="scripts/global.js"></script>

</head>

<body>

<div class="container">
		
		<div class="header">
		
			<h1><a href="/govit/">Govit</a> <span class="version">alpha</span></h1>
			
			<ul class="nav">
       
       		<?php
       		if (isUserLoggedIn())
            {
				?>
                <li><a href="/govit/">Home</a></li>
				<li><a href="/govit/allposts.php">All Posts</a></li>
				<li><a href="/govit/makenewpost.php">Make New Post</a></li>
                <li><a href="/govit/profile.php">Your Profile</a></li>
				<li><a href="/govit/logout.php">Logout</a></li>
				<li><a href="/govit/feedback.php">Feedback</a></li>
                <?php
            }
			else
			{
			?>
                <li><a href="/govit/">Home</a></li>
				<li><a href="/govit/allposts.php">All Posts</a></li>
				<li><a href="/govit/makenewpost.php">Make New Post</a></li>
				<li><a href="/govit/join.php">Join</a></li>
				<li><a href="/govit/login.php">Login</a></li>
				<li><a href="/govit/feedback.php">Feedback</a></li>
            <?php
			}
            ?>
			</ul>
		
		</div><!-- /.header -->
		
		<div class="content">
	
	<?php
}

?>

		
	
	
	
	