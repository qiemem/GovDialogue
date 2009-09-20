<?php

// viewpost.php

require_once("header.php");
require_once("lib/commentmanagement.php");
printHeader("Title", "Keywords", "Description");


?>



<div class="postTitle">
    <h2>Post title goes here. This is what a post title would be. It might ask a question, no?</h2>
    <p class="postDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    <p class="postCredits">Posted by <a href="#">John Doe</a> on Monday, September 32nd</p>
    <p class="postTags">Tags: <a href="#">tag one</a>, <a href="#">another tag</a>, <a href="#">third</a>
</div>

<div class="commentsHeader">
	<h3>Discussion</h3>
    <p class="discussionsBlurb">Newest comments are posted first.</p>
</div>

<div class="commentsList"><?php
write_comments_of_post(0, get_comment_ancestor_set(4));

// second parameter: id whose ancestors we want to be shown

?></div><?php

require_once("footer.php");

?>