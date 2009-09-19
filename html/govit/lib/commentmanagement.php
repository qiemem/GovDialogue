<?php

require_once('database.php');
require_once('usermanagement.php');
require_once('postmanagement.php');

function post_parent($commentid){
    validate_comment_id($commentid);
    $con = db_connect();
    $sql = "SELECT postparent FROM comments WHERE id=$commentid";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0){
        return mysql_result($result,0);
    }else{
        throw new Exception("Comment " . $commentid . " not found.");
    }
}


function add_reply_to_post($userid, $postid, $content){
    validate_user_id($userid);
    validate_post_id($postid);

    $con = db_connect();
    $content = mysql_real_escape_string($content);
    $sql = "INSERT INTO comments VALUES user=$userid, postparent=$postid, content='$content', posttime=NOW()";
    $success = mysql_query($sql);
    db_close($success);
    return $success;
}

function add_reply_to_comment($userid, $commentid, $content){
    validate_user_id($userid);
    validate_comment_id($commentid);
    $con = db_connect();
    $content = mysql_real_escape_string($content);
    $postid = post_parent($commentid);
    $sql = "INSERT INTO comments VALUES user=$userid, postparent=$postid, parent=$commentid, content='$content', posttime=NOW()";
    $success = mysql_query($sql);
    db_close($success);
    return $success;
}

function get_comment($commentid) {
    validate_comment_id($commentid);
    $con = db_connect();
    $sql = "SELECT * FROM posts WHERE id=$postid";
    $result = mysql_query($sql);
    $comment = null;
    if(mysql_num_rows($result)>0){
        $comment = mysql_result($result,0);
    }
    db_close($con);
    return $comment;
}

function get_children_of_comment($commentid) {
    validate_comment($commentid);
    $con = db_connect();
    $sql = "SELECT * FROM comments WHERE parent=$commentid";
    $result = mysql_query($sql);
    db_close($con);
    return $result;
}

function get_top_level_children_of_post($postid) {
    validate_comment($postid);
    $con = db_connect();
    $sql = "SELECT * FROM comments WHERE postparent=$postid AND parent=NULL";
    $result = mysql_query($sql);
    db_close($con);
    return $result;
}
 

function validate_comment_id($commentid) {
    if(!is_int($commentid)){
        throw new Exception($commentid . " is not a valid comment id.");
    }
}
?>
