<?php

// about.php

require_once("header.php");
require_once("lib/userdisplay.php");
require_once("lib/sessionmanagement.php");
printHeader("Title", "Keywords", "Description", "home");

?>

<h2>More about GovDialogue

<p class="largeText">GovDialogue helps create conversations between governments and people.</p>

<div class="midbox indexMidBoxOne">
	<h3 class="one"><a href="makenewpost.php">Make a post</a></h3>
    <p class="big">
    	Public officials create a post about a current issue.
    </p>
</div>

<div class="midbox indexMidBoxTwo">
	<h3 class="two"><a href="makenewpost.php">Share</a></h3>
    <p class="big">
    	The post can be shared with activists, advocacy groups, and the public at large.
    </p>
</div>

<div class="midbox indexMidBoxThree">
	<h3 class="three"><a href="feedback.php">Start a Conversation</a></h3>
    <p class="big">
    	The GovDialogue platform helps keep the conversation clean, structured, and useful.
    </p>
</div>

<h3>How it works</h3>

<div class="quotation">"As President, I will ask for the <span class="emph">active citizenship</span> of Americans of all ages and walks of life."<br /><span class="obama">&mdash;Barack Obama</span><div class="clearBoth"></div></div>

<p>GovDialogue is a simple platform that allows governments to post questions, share them with the public, and create meaningful conversations.</p>

<p>The dialogue software keeps the conversation well-organized. A built-in ranking system lets visitors help identify the best comments, while filtering out spam and off-topic content.</p>

<p>Posts can be organized into topics with rich metadata&mdash;and a range of sharing tools helps spread the word to a broad audience.

<div class="clearBoth"></div>
<br />

<h3>Why?</h3>

<p>Government doesn't have all the answers. Ordinary people often have expertise and experience that could make government decision-making smarter, faster, and easier.</p>
<p>GovDialogue is a simple platform </p>
<br />

<h3>This will turn into chaos, right?</h3>


<?php
require_once("footer.php");
?>