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

if (!isset($this_page)) { $this_page = "home"; }

function printHeader($page_title, $page_description, $page_keywords, $this_page)
{
	?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo($page_title); ?></title>

<link rel="stylesheet" type="text/css" href="styles/global2.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/posts.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/forms.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/login.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/index.css" media="screen" />

<script language="javascript" type="text/javascript" src="scripts/global.js"></script>
<script language="javascript" type="text/javascript" src="lib/voteattribute.js"></script>

</head>

<body>

    <div class="headerContainer">
        <div class="headerContainerInner">
            <div class="headerLeft"><img src="images/headerLeft.png" border="0" width="270" height="100" /></div>
            <div class="nav">
                <ul class="nav">
                <?php
                if (isUserLoggedIn())
                {
				
				// TODO: add $this_page parameter to printHeader function on all pages
				
                    ?>
                    <li class="first<?php if (!isset($this_page) || $this_page == "home") { echo(" thisPage"); } ?>"><a href="/govit/">Home</a></li>
                    <li<?php if ($this_page == "allposts") { echo(" class=\"thisPage\""); } ?>><a href="/govit/allposts.php">All Posts</a></li>
                    <li<?php if ($this_page == "newpost") { echo(" class=\"thisPage\""); } ?>><a href="/govit/makenewpost.php">Make New Post</a></li>
                    <li<?php if ($this_page == "profile") { echo(" class=\"thisPage\""); } ?>><a href="/govit/profile.php">Your Profile</a></li>
                    <li<?php if ($this_page == "logout") { echo(" class=\"thisPage\""); } ?>><a href="/govit/logout.php">Logout</a></li>
                    <li class="last<?php if ($this_page == "feedback") { echo(" thisPage"); } ?>"><a href="/govit/feedback.php">Feedback</a></li>
                    <?php
                }
                else
                {
                ?>
                    <li class="first"><a href="/govit/">Home</a></li>
                    <li<?php if ($this_page == "allposts") { echo(" class=\"thisPage\""); } ?>><a href="/govit/allposts.php">All Posts</a></li>
                    <li<?php if ($this_page == "newpost") { echo(" class=\"thisPage\""); } ?>><a href="/govit/makenewpost.php">Make New Post</a></li>
                    <li<?php if ($this_page == "join") { echo(" class=\"thisPage\""); } ?>><a href="/govit/join.php">Join</a></li>
                    <li<?php if ($this_page == "login") { echo(" class=\"thisPage\""); } ?>><a href="/govit/login.php">Login</a></li>
                    <li class="last<?php if ($this_page == "feedback") { echo(" thisPage"); } ?>"><a href="/govit/feedback.php">Feedback</a></li>
                <?php
                }
                ?>
                </ul>
            </div>
            <div class="headerRight"><img src="images/spacer.gif" border="0" width="1" height="1" /></div>
            <div class="clearBoth"></div>
        </div><!-- /.headerContainerInner -->
        <div class="clearBoth"></div>
    </div><!-- /.headerContainer -->
    
    <div class="contentBoxTop"><img src="images/spacer.gif" width="1" height="1" border="0" /></div> 
    <div class="contentBox">

	<?php
}

?>

		
	
	
	
	