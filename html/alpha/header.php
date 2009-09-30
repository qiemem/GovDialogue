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

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/headerLeft_hover.png')">

<div class="alphaTag"><img src="images/alpha.png" border="0" alt="Alpha" width="141" height="150" /></div>

<div class="mainContainer">

<div class="headerContainer">
        <div class="headerContainerInner">
            <div class="headerLeft"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('mainLogo','','images/headerLeft_hover.png',1)"><img src="images/headerLeft.png" border="0" width="270" height="100" alt="GovDialogue" name="mainLogo" border="0" id="mainLogo"  /></a></div>
            
            
            
            <div class="nav">
                <ul class="nav">
                <?php
                if (isUserLoggedIn())
                {
				
				// TODO: add $this_page parameter to printHeader function on all pages
				
                    ?>
                    <li class="first<?php if (!isset($this_page) || $this_page == "home") { echo(" thisPage"); } ?>"><a href="index.php">Home</a></li>
                    <li<?php if ($this_page == "allposts") { echo(" class=\"thisPage\""); } ?>><a href="allposts.php">All Posts</a></li>
                    <li<?php if ($this_page == "newpost") { echo(" class=\"thisPage\""); } ?>><a href="makenewpost.php">Make New Post</a></li>
                    <li<?php if ($this_page == "profile") { echo(" class=\"thisPage\""); } ?>><a href="profile.php">Your Profile</a></li>
                    <li<?php if ($this_page == "logout") { echo(" class=\"thisPage\""); } ?>><a href="logout.php">Logout</a></li>
                    <li class="last<?php if ($this_page == "feedback") { echo(" thisPage"); } ?>"><a href="feedback.php">Feedback</a></li>
                    <?php
                }
                else
                {
                ?>
                    <li class="first<?php if (!isset($this_page) || $this_page == "home") { echo(" thisPage"); } ?>"><a href="index.php">Home</a></li>
                    <li<?php if ($this_page == "allposts") { echo(" class=\"thisPage\""); } ?>><a href="allposts.php">All Posts</a></li>
                    <li<?php if ($this_page == "newpost") { echo(" class=\"thisPage\""); } ?>><a href="makenewpost.php">Make New Post</a></li>
                    <li<?php if ($this_page == "join") { echo(" class=\"thisPage\""); } ?>><a href="join.php">Join</a></li>
                    <li<?php if ($this_page == "login") { echo(" class=\"thisPage\""); } ?>><a href="login.php">Login</a></li>
                    <li class="last<?php if ($this_page == "feedback") { echo(" thisPage"); } ?>"><a href="feedback.php">Feedback</a></li>
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

		
	
	
	
	