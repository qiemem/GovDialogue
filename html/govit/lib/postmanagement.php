<?php

require_once('database.php');

function add_post($userid, $content) {
    $con = db_connect();
    $content = mysql_real_escape_string($content);
    $sql = "INSERT INTO posts VALUES user=$userid, conent='$content', posttime=NOW()";
    $success = mysql_query($sql);
    db_close($success);
    return $success;
}

function get_post($postid) {
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
?>