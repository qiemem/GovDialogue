<?php

require_once('database.php');
require_once('usermanagement.php');

function add_post($userid, $title, $content, $tags) {
    validate_user_id($userid);
    $con = db_connect();
    $title = mysql_real_escape_string($title); 
    $content = mysql_real_escape_string($content);
    $tags = format_tags($tags);
    $sql = "INSERT INTO posts (user, title, content, tags, posttime) VALUES ($userid, '$title', '$content', '$tags', NOW())";
    $success = mysql_query($sql);
    db_close($con);
    return $success;
}

function get_all_post_ids() {
    $con = db_connect();
    $sql = "SELECT id FROM posts";
    $postids = mysql_query($sql);
    return $postids;
}

function format_tags($tags) {
    $tags = preg_replace("/[^a-zA-Z0-9\s]/", "", $tags);
    $tags = mysql_real_escape_string($tags);
    return $tags;
}

function get_post($postid) {
    validate_post_id($postid);
    $con = db_connect();
    $sql = "SELECT * FROM posts WHERE id=$postid";
    $result = mysql_query($sql);
    $post = null;
    if(mysql_num_rows($result)>0){
        $post = mysql_fetch_array($result);
    }
    db_close($con);
    return $post;
}

function validate_post_id($postid){
    if(!is_numeric($postid)){
        throw new Exception($postid . " is not a valid post id.");
    }
}
?>