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
    echo "<h2>$title<\h2>\n";
    echo "<p class=\"postDescription\">\n";
    echo "$content\n";
    echo "</p>\n";
    echo "<p class=\"postCredits\">Posted by <a href=\"#\">";
    write_post_tags($tags);
    echo "\n</div>\n";
}

function write_post_tags($tags) {
    tags_array = strtok($tags," ");
    for( $tags_array => $tag ){
        echo "<a href=\"#\">$tag<\a> ";
    }
}
?>