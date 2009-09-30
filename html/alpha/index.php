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
    <p class="largeText">This is the alpha prototype of GovDialogue&mdash;a simple, solid platform for government dialogues.</p>
    <p class="largeText">GovDialogue helps create conversations between governments and people. <a href="join.php">Test the prototype &raquo;</a>
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
	<h3 class="one"><a href="makenewpost.php">Make a post</a></h3>
    <p>
    	Public officials create a post about a current issue, asking for input from the public.
    </p>
</div>

<div class="midbox indexMidBoxTwo">
	<h3 class="two"><a href="makenewpost.php">Share</a></h3>
    <p>
	    The post can be shared with activists, advocacy groups, and the public at large.
    </p>
</div>

<div class="midbox indexMidBoxThree">
	<h3 class="three"><a href="makenewpost.php">Start a conversation</a></h3>
    <p>
        The GovDialogue platform helps keep the conversation clean, structured, and useful.
    </p>
</div>

<div class="clearBoth"></div>

<h3 class="firsth3">How it works</h3>

<div class="quotation">"As President, I will ask for the <span class="emph">active citizenship</span> of Americans of all ages and walks of life."<br /><div class="source">&mdash;Barack Obama</div></div>

<p>GovDialogue is a simple platform that allows governments to post questions, share them with the public, and create meaningful conversations.</p>

<p>The dialogue software keeps the conversation well-organized. A built-in ranking system lets visitors help identify the best comments, while filtering out spam and off-topic content.</p>

<p>Posts can be organized into topics with rich metadata&mdash;and a range of sharing tools help you spread the word to a broad audience.

<br />

<br />

<h3>Why?</h3>

<div class="clearBoth"></div>
<div class="quotation">"Knowledge is widely dispersed in society, and public officials benefit from having access to that dispersed knowledge."<br /><div class="source">&mdash;Memorandum on Transparency and Open Government</div></div>

<p>Government doesn't have all the answers. Ordinary people often have expertise and experience that could make government decision-making smarter, faster, and easier.</p>
<p>As the Obama administration <a href="http://www.whitehouse.gov/the_press_office/Transparency_and_Open_Government/">declared</a> in January 2009, government should be
more transparent, participatory, and collaborative. We're building a web tool to help reach those goals.</p>
<br />

<h3>Won't this turn into chaos?</h3>

<p>We hope not. We've built the platform with productive conversations in mind. But, GovDialogue is currently an <strong>alpha prototype</strong>&mdash;which means
that we're in the first stage of development. We're still trying new things to see what works best.</p>

<p>We would love to have your input, whether you're a government official, activist, code guru, or a generally insightful person. What's the best way to have an open,
productive conversation about important public issues?</p>

<p>We invite you to <a href="join.php">join the site</a> and try out the platform. Currently, all users have the ability to make new posts and add comments. Eventually, only
government officials will be able to post questions&mdash;unless <a href="feedback.php">you think that's a bad idea</a>. We'd love to <a href="feedback.php">hear your input</a> on any part of the site.</p>

<p>Questions? <a href="contact.php">Click here</a> to contact us.</p>


<?php
require_once("footer.php");
?>