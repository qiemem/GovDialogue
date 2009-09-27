<?php
require_once("commentmanagement.php");
require_once("usermanagement.php");

function write_comment_content($comment) {
    echo "<p class=\"commentText\">".$comment['content']."</p>\n";
}

function write_comment_credits($comment) {
    $user = get_user($comment['user']);
    echo "<p class=\"commentCredits\">Posted by: ".$user['firstname']." ".$user['lastname']."</p>\n";
}

function write_comment_ratings($comment) {
    echo "<p class=\"commentRating\">";
    echo "Rate this comment: ";
    echo "<a href=\"#\" class=\"insightful\">Insightful</a> (3) | ";
    echo "<a href=\"#\" class=\"offtopic\">Off topic</a> (1) | ";
    echo "<a href=\"#\" class=\"abusive\">Abusive</a> (0)</p>\n";
}

function write_comment_reply_info($comment, $showcomments) {
    $commentid=$comment['id'];

    $toggle_vis = "href=\"javascript:void(0);\" onclick=\"toggleVisibility('$commentid');\"";
    echo "<p class=\"commentReply\"><a href=\"javascript:void(0);\" onclick=\"javascript:toggleReplyVisibility('$commentid');\">Reply</a>\n";
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

function write_comment_replies($comment, $showcomments) {
    $commentid = $comment['id'];
    echo "<!-- Begin comment $commentid replies -->";
    $children = get_children_of_comment($commentid);
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
    echo "<a name=\"id$commentid\"></a>";
}

function write_comment_footer($comment) {
    $commentid = $comment['id'];
    echo "</li>\n";
    echo "<!-- /#$commentid -->\n";
}

function write_comment_thread($commentid, $showcomments) {
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
    write_comment_replies($comment,$showcomments);
        
}

function write_comments_of_post($postid, $showcomments) {
    validate_post_id($postid);
    $top_level = get_top_level_children_of_post($postid);
    if(mysql_num_rows($top_level)>0){
        echo "<ol class=\"toplevel\">\n";
        while($child = mysql_fetch_array($top_level)) {
            write_comment_thread($child['id'], $showcomments);
        }
        echo "</ol>";
        return true;
    }else{
        return false;
    }
}

function write_comment_reply_form($comment) {
    $commentid = $comment['id'];
    echo "<!-- Reply Form -->\n";
    echo "<li class=\"replyform\" id=\"comment".$commentid."replyform\">\n";
                        
    echo "<!-- User logged in -->\n";
    echo "<form name=\"replyForm_$commentid\" action=\"reply.php\" method=\"post\">\n";
                            
    echo "<p class=\"replyCaption\">Enter your reply here:</p>\n";
    echo "<textarea name=\"replyContent_$commentid\" class=\"commentReplyForm\" id=\"replyContent_$commentid\" cols=\"40\" rows=\"8\">Write your comment here.</textarea>\n";
                            
    echo "<p class=\"replySubmit\"><input type=\"submit\" value=\"Post\" /></p>\n";
    echo "</form>\n";
    echo "<!-- User not logged in -->\n";
    echo "</li>\n";
    echo "<!-- End Reply Form -->\n";
}