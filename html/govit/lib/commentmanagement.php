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
    $sql = "SELECT * FROM comments WHERE id=$commentid";
    $result = mysql_query($sql);
    $comment = null;
    if(mysql_num_rows($result)>0){
        $comment = mysql_fetch_array($result);
    }
    db_close($con);
    return $comment;
}

function get_children_of_comment($commentid) {
    validate_comment_id($commentid);
    $con = db_connect();
    $sql = "SELECT * FROM comments WHERE parent=$commentid";
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

function get_top_level_children_of_post($postid) {
    validate_post_id($postid);
    $con = db_connect();
    $sql = "SELECT * FROM comments WHERE postparent=$postid AND parent IS NULL";
    $result = mysql_query($sql);
    db_close($con);
    return $result;
}


function write_comment_thread($commentid, $showcomments) {
    validate_comment_id($commentid);
    $comment = get_comment($commentid);
    $user = get_user($comment['user']);
    if(!$comment['parent']){
        echo "<li class=\"toplevelcomment\" id=\"comment$commentid\">\n";
    }else{
        echo "<li class=\"childcomment\" id=\"comment$commentid\">\n";
    }
?>
<a name="id<?= $commentid ?>"></a>
<p class="commentText"> <?= $comment['content']; ?> </p>
<p class="commentCredits">Posted by: <?= $user['firstname'];?> <?= $user['lastname'];?></p>
<p class="commentRating">Rate this comment: <a href="#" class="insightful">Insightful</a> (3) | <a href="#" class="offtopic">Off topic</a> (1) | <a href="#" class="abusive">Abusive</a> (0)</p>
<p class="commentReply">
<a href="#">Reply</a>
<?php
if(get_num_children($commentid)>0){
?>
|
<span class="hideReplies" id="comment<?=$commentid;?>hidereplies">
<a href="javascript:toggleVisibility('<?=$commentid;?>');">Hide Replies</a>
</span>
<span class="showReplies" id="comment<?=$commentid;?>showreplies">
<a href="javascript:toggleVisibility('<?=$commentid;?>');">Show Replies</a> (<?= get_num_children($commentid); ?>)
</span>
<?php } ?>
</p>
</li>
<?php
    $children = get_children_of_comment($commentid);
    if(mysql_num_rows($children)>0){
        if($showcomments[$commentid]){
            echo "<ol class=\"child\" id=\"comment".$commentid."replies\" style=\"display: block !important;\">\n";
        }else{
            echo "<ol class=\"child\" id=\"comment".$commentid."replies\">\n";
        }
        while($child = mysql_fetch_array($children)) {
            write_comment_thread($child['id'], $showcomments);
        }
        echo "</ol>\n";
    }
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

function validate_comment_id($commentid) {
    if(!is_numeric($commentid)){
        throw new Exception($commentid . " is not a valid comment id.");
    }
}
?>
