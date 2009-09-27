<?php

  // viewpost.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("header.php");
require_once("lib/commentdisplay.php");
require_once("lib/commentmanagement.php");
require_once("lib/postdisplay.php");
require_once("lib/urlmanagement.php");
printHeader("Title", "Keywords", "Description");


$post_id = null;
if (isset($_GET['postid'])) {
    $post_id = $_GET['postid'];
    if(isset($_GET['commentid'])) {
        $show_comments = get_comment_ancestor_set($_GET['commentid']);
    }else{
        $show_comments = array();
    }

    display_post($post_id);	
    echo("<p class=\"postReplyLink\"><a href=\"#\">Add a new comment</a></p>");
    echo "<p class=\"postReplyCommentForm\">";
    // Only display comments header if post has comments
    if(post_has_comments($post_id)) {
        echo "<div class=\"commentsHeader\">\n";
        echo "<h3>Discussion</h3>\n";
        echo "<p class=\"discussionsBlurb\">Newest comments are posted first.</p>\n";
        echo "</div>\n";
        echo "<div class=\"commentsList\">\n";
        write_comments_of_post($post_id, $show_comments);
        echo "</div>\n";
    }
}else{
    echo "You didn't specify a post.\n";
}

require_once("footer.php");

?>
