<?php

  // viewpost.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("header.php");
require_once("lib/commentdisplay.php");
require_once("lib/commentmanagement.php");
require_once("lib/postdisplay.php");
printHeader("Title", "Keywords", "Description","allposts");


$post_id = null;
if (isset($_GET['postid'])) {
    $post_id = $_GET['postid'];
    if(isset($_GET['commentid']) and $_GET['commentid']!='') {
        $show_comments = get_comment_ancestor_set($_GET['commentid']);
    }else{
        $show_comments = array();
    }

    display_post_by_id($post_id);
    echo "<p class=\"postReplyLink\"><a href=\"javascript:void(0);\" onclick=\"javascript:togglePostReplyVisibility('$post_id');\">Add a new comment</a></p>\n";
    //echo "<p class=\"postReplyCommentForm\">";
    
    write_post_reply_form($post_id);
    // Only display comments header if post has comments
    if(post_has_comments($post_id)) {
        $orderby = "posttime";
        $descending = true;
        $ordering="oldestfirst";
        if(isset($_GET['ordering'])) {
            $ordering=$_GET['ordering'];
            switch($_GET['ordering']) {
            case "newestfirst":
                $orderby = "posttime";
                $descending = true;
                break;
            case "oldestfirst":
                $orderby = "posttime";
                $descending = false;
                break;
            case "mostinsightful":
                $orderby = "insightful";
                $descending = true;
                break;
            default:
                $ordering = "oldestfirst";
            }
        }
        echo "<div class=\"commentsHeader\">\n";
        echo "<h3>Discussion</h3>\n";
        //echo "<p class=\"discussionsBlurb\">Newest comments are posted first.</p>\n";
        write_comment_ordering_options($post_id, $ordering);
        echo "</div>\n";
        echo "<div class=\"commentsList\">\n";
        write_comments_of_post($post_id, $show_comments, $orderby, $descending);
        echo "</div>\n";
    }
}else{
    echo "You didn't specify a post.\n";
}

require_once("footer.php");

?>
