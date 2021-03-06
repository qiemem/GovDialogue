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
    $sql = "INSERT INTO comments (user, postparent, content, posttime) VALUES ($userid, $postid, '$content', NOW())";
    $success = mysql_query($sql);
    db_close($con);
    return get_comment_id($userid, $postid, null, $content);
}

function add_reply_to_comment($userid, $commentid, $content){
    validate_user_id($userid);
    validate_comment_id($commentid);
    $con = db_connect();
    $content = mysql_real_escape_string($content);
    $postid = post_parent($commentid);
    $sql = "INSERT INTO comments (user, postparent, parent, content, posttime) VALUES ($userid, $postid, $commentid, '$content', NOW())";
    $success = mysql_query($sql);
    db_close($con);
    return get_comment_id($userid, $postid, $commentid, $content);
}

function get_comment_id($userid, $postid, $parentid, $content) {
    validate_user_id($userid);
    $content = mysql_real_escape_string($content);
    $con = db_connect();
    $sql = "SELECT id FROM comments WHERE user=$userid AND content='$content' AND postparent=$postid";
    if($parentid===null){
        $sql = $sql." AND parent IS NULL";
    } else {
        $sql = $sql." AND parent=$parentid";
    }
    $sql = $sql." ORDER BY posttime DESC";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0){
        $id = mysql_result($result, 0);
    }else{
        $id = null;
    }
    db_close($con);
    return $id;
}

function up_vote_attribute($commentid, $attribute) {
    $comment = get_comment($commentid);
    $newval = $comment[$attribute]+1;
    $con = db_connect();
    $sql = "UPDATE comments SET $attribute=$newval WHERE id=$commentid";
    mysql_query($sql);
    db_close($con);
    return $newval;
}

function up_vote_insightful($commentid) {
    return up_vote_attribute($commentid, 'insightful');
}

function up_vote_off_topic($commentid) {
    return up_vote_attribute($commentid, 'offtopic');
}

function up_vote_abusive($commentid) {
    return up_vote_attribute($commentid, 'abusive');
}

function get_comment($commentid) {
    validate_comment_id($commentid);
    $con = db_connect();
    $sql = "SELECT * FROM comments WHERE id=$commentid";
    $result = mysql_query($sql);
    $comment = null;
    if(mysql_num_rows($result)>0){
        $comment = mysql_fetch_array($result);
    }
    db_close($con);
    return $comment;
}

function get_children_of_comment($commentid, $orderby = "posttime", $descending = false) {
    validate_comment_id($commentid);
    $con = db_connect();
    $sql = "SELECT * FROM comments WHERE parent=$commentid ORDER BY $orderby";
    if($descending) {
        $sql = $sql." DESC";
    }
    $result = mysql_query($sql);
    db_close($con);
    return $result;
}

function get_num_children($commentid) {
    $children = get_children_of_comment($commentid);
    return mysql_num_rows($children);
}

function get_parent($commentid) {
	$comment = get_comment($commentid);
    return $comment['parent'];
}

function get_top_level_children_of_post($postid, $orderby = "posttime", $descending = false) {
    validate_post_id($postid);
    $con = db_connect();
    $orderby = mysql_real_escape_string($orderby);
    $sql = "SELECT * FROM comments WHERE postparent=$postid AND parent IS NULL ORDER BY $orderby";
    if($descending) {
        $sql = $sql." DESC";
    }
    $result = mysql_query($sql);
    db_close($con);
    return $result;
}

function get_comment_ancestor_set($commentid) {
    $parentcomment = get_parent($commentid);
    if($parentcomment){
        $anc = get_comment_ancestor_set($parentcomment);
        $anc[$commentid]=true;
    } else {
        $anc = array($commentid => true);
    }
    return $anc;
}

function post_has_comments($postid) {
    $top_level = get_top_level_children_of_post($postid);
    return mysql_num_rows($top_level)>0;
}
    

function validate_comment_id($commentid) {
    if(!is_numeric($commentid)){
        throw new Exception($commentid . " is not a valid comment id.");
    }
}


?>
