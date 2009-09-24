<?php

// testcomment.php
error_reporting(E_ALL);
ini_set('display_errors', true);
require_once("header.php");
require_once("lib/commentdisplay.php");
printHeader("Title", "Keywords", "Description");


?>

<div class="postTitle">
    <h2>Post title goes here. This is what a post title would be. It might ask a question, no?</h2>
    <p class="postDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    <p class="postCredits">Posted by <a href="#">John Doe</a> on Monday, September 32nd</p>
    <p class="postTags">Tags: <a href="#">tag one</a>, <a href="#">another tag</a>, <a href="#">third</a></p>
</div>
<div class="commentsHeader">
    <h3>Discussion</h3>
    <p class="discussionsBlurb">Newest comments are posted first.</p>
</div>
<div class="commentsList">
    <ol class="toplevel">
        <li class="toplevelcomment" id="comment1">
            <p class="commentText">Hi</p>
            <p class="commentCredits">Posted by: </p>
            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
            <p class="commentReply"> <a href="#">Reply</a>| <span class="hideReplies" id="comment1hidereplies"> <a href="javascript:toggleVisibility('1');">Hide Replies</a> </span> <span class="showReplies" id="comment1showreplies"> <a href="javascript:toggleVisibility('1');">Show Replies</a> (2) </span> <a name="id1"></a> </p>
        </li>
        <li>
            <ol class="child" id="comment1replies">
                <li class="childcomment" id="comment2">
                    <p class="commentText">bye</p>
                    <p class="commentCredits">Posted by: </p>
                    <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
                    <p class="commentReply"> <a href="#">Reply</a><a name="id2"></a> </p>
                </li>
                <li class="childcomment" id="comment3">
                    <p class="commentText">what</p>
                    <p class="commentCredits">Posted by: </p>
                    <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
                    <p class="commentReply"> <a href="#">Reply</a>| <span class="hideReplies" id="comment3hidereplies"> <a href="javascript:toggleVisibility('3');">Hide Replies</a> </span> <span class="showReplies" id="comment3showreplies"> <a href="javascript:toggleVisibility('3');">Show Replies</a> (1) </span> <a name="id3"></a> </p>
                </li>
                <li>
                    <ol class="child" id="comment3replies">
                        <li class="childcomment" id="comment4">
                            <p class="commentText">nothing</p>
                            <p class="commentCredits">Posted by: </p>
                            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
                            <p class="commentReply"> <a href="javascript:void(0);" onclick="javascript:toggleReplyVisibility('4');">Reply</a><a name="id4"></a> </p>
                        </li>
                        
                        <!-- Reply Form -->
                        <li class="childcomment replyform" id="comment4replyform">
                        
                            <!-- User logged in -->
                            <form name="replyForm_ID" action="POST" method="reply.php">
                            
                            	<p class="replyCaption">Enter your reply here:</p>
								<textarea name="replyContent_ID" class="commentReplyForm" id="replyContent_ID" cols="40" rows="8">Write your comment here.</textarea>
                            
                            	<p class="replySubmit"><input type="submit" value="Post" /></p>
                            
                            </form>
                            
                            <!-- User not logged in -->
                            
                        
                        </li>
                        <!-- End Reply Form -->
                        
                    </ol>
                    
                </li>
            </ol>
        </li>
        <li class="toplevelcomment" id="comment5">
            <p class="commentText">today</p>
            <p class="commentCredits">Posted by: </p>
            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
            <p class="commentReply"> <a href="#">Reply</a>| <span class="hideReplies" id="comment5hidereplies"> <a href="javascript:toggleVisibility('5');">Hide Replies</a> </span> <span class="showReplies" id="comment5showreplies"> <a href="javascript:toggleVisibility('5');">Show Replies</a> (2) </span> <a name="id5"></a> </p>
        </li>
        <li>
            <ol class="child" id="comment5replies">
                <li class="childcomment" id="comment6">
                    <p class="commentText">yesterday</p>
                    <p class="commentCredits">Posted by: </p>
                    <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
                    <p class="commentReply"> <a href="#">Reply</a><a name="id6"></a> </p>
                </li>
                <li class="childcomment" id="comment7">
                    <p class="commentText">wed</p>
                    <p class="commentCredits">Posted by: </p>
                    <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
                    <p class="commentReply"> <a href="#">Reply</a><a name="id7"></a> </p>
                </li>
            </ol>
        </li>
    </ol>
</div>
