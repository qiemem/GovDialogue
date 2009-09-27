<?php
require_once("postmanagement.php");

function display_post($postid) {
    $post = get_post($postid);
    $title = $post['title'];
    $content = $post['content'];
    $user = get_user($post['user']);
    $name = $user['firstname']." ".$user['lastname'];
    $tags = $post['tags'];
    echo "<div class=\"postTitle\">\n";
    echo "<h2>$title</h2>\n";
    echo "<p class=\"postDescription\">\n";
    echo "$content\n";
    echo "</p>\n";
    echo "<p class=\"postCredits\">Posted by <a href=\"#\">";
    echo $name."</a></p>\n";
    echo "<p class=\"postTags\">Tags: ";
    write_post_tags($tags);
    echo "</p>\n";
    echo "\n</div>\n";
}

function write_post_tags($tags) {
    $tags_array = preg_split("/[\s]+/", $tags);

    foreach($tags_array as $tag){
        echo "<a href=\"#\">$tag</a> ";
    }
}

function write_post_reply_form($postid) {
    echo "<!-- Reply Form -->\n";
    echo "<li class=\"replyform\" id=\"post".$postid."replyform\">\n";                        
    echo "<!-- User logged in -->\n";
    echo "<form name=\"postReplyForm_$postid\" action=\"reply.php\" method=\"post\">\n";
    echo "<p class=\"replyCaption\">Enter your reply here:</p>\n";
    echo "<textarea name=\"replyContent\" class=\"commentReplyForm\" id=\"postReplyContent_$postid\" cols=\"40\" rows=\"8\" onfocus=\"if(this.value=='Write your comment here'){this.value='';}\" onblur=\"if(this.value==''){this.value='Write your comment here';}\">Write your comment here</textarea>\n";
    echo "<input name=\"parentID\" type=\"hidden\" value=\"$postid\" />\n";
    echo "<input name=\"parentType\" type=\"hidden\" value=\"post\" />\n";
    echo "<p class=\"replySubmit\"><input type=\"submit\" value=\"Post\" /></p>\n";
    echo "</form>\n";
    echo "<!-- User not logged in -->\n";
    echo "</li>\n";
    echo "<!-- End Reply Form -->\n";
}

function list_posts() {
    $postids = get_all_post_ids();
    echo "<ul class=\"allPostsList\">";
    while( $row = mysql_fetch_array($postids) ){
        $postid = $row['id'];
        $post = get_post($postid);
        $title = $post['title'];
        echo "<li class=\"allPostsItem\" id=\"$postid\"><a href=\"viewpost.php?postid=$postid\">$title</a></li>";
    }
    echo "</ul>";
}
?>