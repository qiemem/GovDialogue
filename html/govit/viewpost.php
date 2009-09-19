<?php

// viewpost.php

require_once("header.php");
printHeader("Viewing post", "Keywords", "Description");

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

<!-- Comment 1 -->
<div class="postComment" id="comment1">
	<div class="commentVisible">
        <p class="commentText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p class="commentCredits">Posted by <a href="#">Joe Commenter</a> on Friday, September 1st</p>
        <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
        <p class="commentReply">
        	<a href="#">Reply</a>
        	|
        	<span class="hideReplies" id="comment1hidereplies"><a href="javascript:toggleLayerVisibility('comment1replies');toggleLayerVisibilityInline('comment1hidereplies');toggleLayerVisibilityInline('comment1showreplies');">Hide replies</a></span>
            <span class="showReplies" id="comment1showreplies"><a href="javascript:toggleLayerVisibility('comment1replies');toggleLayerVisibilityInline('comment1showreplies');toggleLayerVisibilityInline('comment1hidereplies');">Show replies</a> (2)</span>
        </p>
    </div>
</div>
	    
    <div class="commentContainer" id="comment1replies">
        
        <!-- Comment 1 Reply 1 -->
        <div class="commentReplyLevelOne">
            <p class="commentText">Praesent bibendum dapibus lectus in viverra. Cras consectetur lacinia vehicula. Praesent consequat turpis id orci placerat ac tristique enim varius.</p>
            <p class="commentCredits">Posted by <a href="#">Jane Commenter</a> on Friday, September 1st</p>
            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (0) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
            <p class="commentReply">
        	<a href="#">Reply</a>
                |
                <span class="hideReplies" id="comment1reply1hidereplies"><a href="javascript:toggleLayerVisibility('comment1reply1replies');toggleLayerVisibilityInline('comment1reply1hidereplies');toggleLayerVisibilityInline('comment1reply1showreplies');">Hide replies</a></span>
                <span class="showReplies" id="comment1reply1showreplies"><a href="javascript:toggleLayerVisibility('comment1reply1replies');toggleLayerVisibilityInline('comment1reply1showreplies');toggleLayerVisibilityInline('comment1reply1hidereplies');">Show replies</a> (1)</span>
            </p> 
        </div>
        	
            <!-- Comment 1 Reply 1 Reply 1 -->
            <div class="commentContainer" id="comment1reply1replies">
                <div class="commentReplyLevelTwo">
                    <p class="commentText">Integer vestibulum, neque a viverra eleifend, justo est sagittis purus, vitae feugiat massa enim ut dui. Donec ut mi mi. Nulla facilisi.</p>
                    <p class="commentCredits">Posted by <a href="#">Jane Commenter</a> on Friday, September 1st</p>
                    <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (0) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
                    <p class="commentReply"><a href="#">Reply</a> | <a href="#">Hide replies</a></p>
                </div>
            </div><!-- /#comment1reply1replies -->
            <!-- /Comment 1 Reply 1 Reply 1 -->
            
        <!-- /Comment 1 Reply 1 -->
        
        <div class="commentReplyLevelOne">
            <p class="commentText">Praesent bibendum dapibus lectus in viverra. Cras consectetur lacinia vehicula. Praesent consequat turpis id orci placerat ac tristique enim varius.</p>
            <p class="commentCredits">Posted by <a href="#">Jane Commenter</a> on Friday, September 1st</p>
            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (0) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
            <p class="commentReply"><a href="#">Reply</a> | <a href="#">Hide replies</a></p>
        </div>
    
    </div><!-- /.commentContainer /#comment1_replies -->
<!-- /Comment 1 -->



<!-- Comment 2 -->
<div class="postComment" id="comment2">
	<div class="commentVisible">
        <p class="commentText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p class="commentCredits">Posted by <a href="#">Joe Commenter</a> on Friday, September 1st</p>
        <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
        <p class="commentReply">
        	<a href="#">Reply</a>
        	|
        	<span class="hideReplies" id="comment2hidereplies"><a href="javascript:toggleLayerVisibility('comment2replies');toggleLayerVisibilityInline('comment2hidereplies');toggleLayerVisibilityInline('comment2showreplies');">Hide replies</a></span>
            <span class="showReplies" id="comment2showreplies"><a href="javascript:toggleLayerVisibility('comment2replies');toggleLayerVisibilityInline('comment2showreplies');toggleLayerVisibilityInline('comment2hidereplies');">Show replies</a> (2)</span>
        </p>
    </div>
</div>
	    
    <div class="commentContainer" id="comment2replies">
        
        <!-- Comment 1 Reply 1 -->
        <div class="commentReplyLevelOne">
            <p class="commentText">Praesent bibendum dapibus lectus in viverra. Cras consectetur lacinia vehicula. Praesent consequat turpis id orci placerat ac tristique enim varius.</p>
            <p class="commentCredits">Posted by <a href="#">Jane Commenter</a> on Friday, September 1st</p>
            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (0) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
            <p class="commentReply">
        	<a href="#">Reply</a>
                |
                <span class="hideReplies" id="comment2reply1hidereplies"><a href="javascript:toggleLayerVisibility('comment2reply1replies');toggleLayerVisibilityInline('comment2reply1hidereplies');toggleLayerVisibilityInline('comment2reply1showreplies');">Hide replies</a></span>
                <span class="showReplies" id="comment2reply1showreplies"><a href="javascript:toggleLayerVisibility('comment2reply1replies');toggleLayerVisibilityInline('comment2reply1showreplies');toggleLayerVisibilityInline('comment2reply1hidereplies');">Show replies</a> (1)</span>
            </p> 
        </div>
        	
            <!-- Comment 1 Reply 1 Reply 1 -->
            <div class="commentContainer" id="comment2reply1replies">
                <div class="commentReplyLevelTwo">
                    <p class="commentText">Integer vestibulum, neque a viverra eleifend, justo est sagittis purus, vitae feugiat massa enim ut dui. Donec ut mi mi. Nulla facilisi.</p>
                    <p class="commentCredits">Posted by <a href="#">Jane Commenter</a> on Friday, September 1st</p>
                    <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (0) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
                    <p class="commentReply"><a href="#">Reply</a> | <a href="#">Hide replies</a></p>
                </div>
            </div><!-- /#comment2reply1replies -->
            <!-- /Comment 1 Reply 1 Reply 1 -->
            
        <!-- /Comment 1 Reply 1 -->
        
        <div class="commentReplyLevelOne">
            <p class="commentText">Praesent bibendum dapibus lectus in viverra. Cras consectetur lacinia vehicula. Praesent consequat turpis id orci placerat ac tristique enim varius.</p>
            <p class="commentCredits">Posted by <a href="#">Jane Commenter</a> on Friday, September 1st</p>
            <p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (0) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>   
            <p class="commentReply"><a href="#">Reply</a> | <a href="#">Hide replies</a></p>
        </div>
    
    </div><!-- /.commentContainer /#comment2_replies -->
<!-- /Comment 2 -->

<?php

require_once("footer.php");

?>