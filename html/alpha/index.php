<?php
// index.php

require_once("lib/userdisplay.php"); // to display the login form;
require_once("lib/usermanagement.php");
require_once("lib/sessionmanagement.php");

require_once("header.php");
printHeader("Title", "Keywords", "Description", "home");
?>

<div class="indexLeft">
    <h2>Welcome to the alpha.</h2>
    <p class="largeText">This is the prototype of <a href="/alpha/">GovDialogue</a>&mdash;a simple, solid platform for government dialogues.</p>
    <p class="largeText">GovDialogue helps create conversations between governments and people. Check out <a href="about.php">why and how</a>.
    <div class="clearBoth"></div>
</div><!-- /.indexLeft -->

<div class="indexRight">
<?php
if(isUserLoggedIn()){
    print_greeting_box("indexLoginBox");
 }else{
    print_login_box("indexLoginBox");
 }
 ?>
</div><!-- /.indexRight -->

<div class="clearBoth"></div>


</div><!-- /.contentBox -->
<div class="contentBoxBottom"><img src="images/spacer.gif" width="1" height="1" border="0" /></div>


<div class="contentBoxTop"><img src="images/spacer.gif" width="1" height="1" border="0" /></div>
<div class="contentBox">


<div class="midbox indexMidBoxOne">
	<h3 class="one"><a href="allposts.php">Browse posts</a></h3>
    <p>
    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
    </p>
</div>

<div class="midbox indexMidBoxTwo">
	<h3 class="two"><a href="makenewpost.php">Make a New Post</a></h3>
    <p>
    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
    </p>
</div>

<div class="midbox indexMidBoxThree">
	<h3 class="three"><a href="feedback.php">Send Feedback</a></h3>
    <p>
    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
    </p>
</div>

<div class="clearBoth"></div>


<?php
require_once("footer.php");
?>