<?php

require_once('database.php');

function post_parent($commentid){
    if(!is_int($commentid)){
        throw new Exception($commentid . " is not a valid comment id.");
    }
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
    if(!is_int($userid) or !is_int($postid)){
        throw new Exception("Either " . $userid . " is not a valid user id or " . $postid . " is not a valid post id.");
    }
    $con = db_connect();
    $content = mysql_real_escape_string($content);
    $sql = "INSERT INTO comments VALUES user=$userid, postparent=$postid, content='$content', posttime=NOW()";
    $success = mysql_query($sql);
    db_close($success);
    return $success;
}

function add_reply_to_comment($userid, $commentid, $content){
    if(!is_int($userid) or !is_int($commentid)){
        throw new Exception("Either " . $userid . " is not a valid user id or " . $commentid . " is not a valid comment id.");
    }
    $con = db_connect();
    $content = mysql_real_escape_string($content);
    $postid = post_parent($commentid);
    $sql = "INSERT INTO comments VALUES user=$userid, postparent=$postid, parent=$commentid, content='$content', posttime=NOW()";
    $success = mysql_query($sql);
    db_close($success);
    return $success;
}

function validate_comment_id($commentid) {
    if(!is_int($commentid)){
        throw new Exception($commentid . " is not a valid comment id.");
    }
}
?>
