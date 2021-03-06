<?php
require_once("commentmanagement.php");
require_once("usermanagement.php");

function write_comment_content($comment) {
    echo "<p class=\"commentText\">".$comment['content']."</p>\n";
}

function write_comment_credits($comment) {
    $user = get_user($comment['user']);
    echo "<p class=\"commentCredits\">Posted by: ".$user['firstname']." ".$user['lastname']." on ".$comment['posttime']."</p>\n";
}

function write_comment_ratings($comment) {
    $commentid = $comment['id'];
    $insightful = $comment['insightful'];
    $offtopic = $comment['offtopic'];
    $abusive = $comment['abusive'];
    echo "<p class=\"commentRating\">";
    echo "Rate this comment: ";
    echo "<a href=\"javascript:void(0);\" onclick=\"upVoteAttribute($commentid,'insightful');\" class=\"insightful\">Insightful</a> (<span id=\"insightful$commentid\">$insightful</span>) | ";
    echo "<a href=\"javascript:void(0);\" onclick=\"upVoteAttribute($commentid,'offtopic');\" class=\"offtopic\">Off topic</a> (<span id=\"offtopic$commentid\">$offtopic</span>) | ";
    echo "<a href=\"javascript:void(0);\" onclick=\"upVoteAttribute($commentid,'abusive');\" class=\"abusive\">Abusive</a> (<span id=\"abusive$commentid\">$abusive</span>)</p>\n";
}

function write_comment_reply_info($comment, $showcomments) {
    $commentid=$comment['id'];

    $toggle_vis = "href=\"javascript:void(0);\" onclick=\"toggleVisibility('$commentid');\"";
    echo "<p class=\"commentReply\"><a href=\"javascript:void(0);\" onclick=\"javascript:toggleCommentReplyVisibility('$commentid');\">Reply</a>\n";
    if(get_num_children($commentid)>0){
        echo "|\n";
        if(array_key_exists($commentid,$showcomments) and $showcomments[$commentid]){
            echo "<span class=\"hideReplies\" id=\"comment".$commentid."hidereplies\" style=\"display: inline;\">\n";
            echo "<a $toggle_vis>Hide Replies</a>\n";
            echo "</span>\n";
            echo "<span class=\"showReplies\" id=\"comment".$commentid."showreplies\" style=\"display: none;\">\n";
            echo "<a $toggle_vis>Show Replies</a> (".get_num_children($commentid).")\n";
            echo "</span>\n";
        }else{
            echo "<span class=\"hideReplies\" id=\"comment".$commentid."hidereplies\">\n";
            echo "<a $toggle_vis>Hide Replies</a>\n";
            echo "</span>\n";
            echo "<span class=\"showReplies\" id=\"comment".$commentid."showreplies\">\n";
            echo "<a $toggle_vis>Show Replies</a> (".get_num_children($commentid).")\n";
            echo "</span>\n";
        }
		echo("</p>");
    }
}

function write_comment_replies($comment, $showcomments,$orderby="posttime",$descending=false) {
    $commentid = $comment['id'];
    echo "<!-- Begin comment $commentid replies -->";
    $children = get_children_of_comment($commentid,$orderby,$descending);
    if(mysql_num_rows($children)>0){
        echo "<li>\n";
        if(array_key_exists($commentid,$showcomments) and $showcomments[$commentid]){
            echo "<ol class=\"child\" id=\"comment".$commentid."replies\" style=\"display: block;\">\n";
        }else{
            echo "<ol class=\"child\" id=\"comment".$commentid."replies\">\n";
        }
        while($child = mysql_fetch_array($children)) {
            write_comment_thread($child['id'], $showcomments);
        }
        echo "</ol>\n</li>\n";
    }
    echo "<!-- End comment $commentid replies -->";
}

function write_comment_header($comment) {
    $commentid = $comment['id'];
    echo "<!-- #$commentid -->\n";
    if(!$comment['parent']){
        echo "<li class=\"toplevelcomment\" id=\"comment$commentid\">\n";
    }else{
        echo "<li class=\"childcomment\" id=\"comment$commentid\">\n";
    }
    echo "<a name=\"$commentid\"></a>";
}

function write_comment_footer($comment) {
    $commentid = $comment['id'];
    echo "</li>\n";
    echo "<!-- /#$commentid -->\n";
}

function write_comment_thread($commentid, $showcomments,$orderby="posttime",$descending=false) {
    validate_comment_id($commentid);
    $comment = get_comment($commentid);
    $user = get_user($comment['user']);
    write_comment_header($comment);
    write_comment_content($comment);
    write_comment_credits($comment);
    write_comment_ratings($comment);
    write_comment_reply_info($comment,$showcomments);
    write_comment_footer($comment);
    write_comment_reply_form($comment);
    write_comment_replies($comment,$showcomments,$orderby,$descending);
        
}

function write_comments_of_post($postid, $showcomments,$orderby="posttime",$descending=false) {
    validate_post_id($postid);
    $top_level = get_top_level_children_of_post($postid, $orderby, $descending);
    if(mysql_num_rows($top_level)>0){
        echo "<ol class=\"toplevel\">\n";
        while($child = mysql_fetch_array($top_level)) {
            write_comment_thread($child['id'], $showcomments, $orderby, $descending);
        }
        echo "</ol>";
        return true;
    }else{
        return false;
    }
}

function write_comment_ordering_options($postid, $current_ordering) {
    $url = $_SERVER['PHP_SELF']."?postid=$postid";
    echo "<ul class=\"commentOrderingOptions\">\n";
    echo "<li><a href=\"$url&ordering=newestfirst\">newest first</a></li>\n";
    echo "<li><a href=\"$url&ordering=oldestfirst\">oldest first</a></li>\n";
    echo "<li><a href=\"$url&ordering=mostinsightful\">most insightful</a></li>\n";
    echo "</ul>\n";
}

function write_comment_reply_form($comment) {
    $commentid = $comment['id'];
    echo "<!-- Reply Form -->\n";
    echo "<li class=\"replyform\" id=\"comment".$commentid."replyform\">\n";
                        
    echo "<!-- User logged in -->\n";
    echo "<form name=\"replyForm_$commentid\" action=\"reply.php\" method=\"post\">\n";
                            
    echo "<p class=\"replyCaption\">Enter your reply here:</p>\n";
    echo "<textarea name=\"replyContent\" class=\"commentReplyForm\" id=\"replyContent_$commentid\" cols=\"40\" rows=\"8\" onfocus=\"if(this.value=='Write your comment here'){this.value='';}\" onblur=\"if(this.value==''){this.value='Write your comment here';}\">Write your comment here</textarea>\n";
    echo "<input name=\"parentID\" type=\"hidden\" value=\"$commentid\" />\n";
    echo "<input name=\"parentType\" type=\"hidden\" value=\"comment\" />\n";
    echo "<p class=\"replySubmit\"><input type=\"submit\" value=\"Post\" /></p>\n";
    echo "</form>\n";
    echo "<!-- User not logged in -->\n";
    echo "</li>\n";
    echo "<!-- End Reply Form -->\n";
}