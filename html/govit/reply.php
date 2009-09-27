<?php
ob_start(); // for redirect

// index.php
require_once("lib/commentmanagement.php");
require_once("lib/postmanagement.php");
require_once("header.php");
printHeader("Title", "Keywords", "Description");

function inError(){
	global $errors;
	return count($errors) > 0;
}

if (!isUserLoggedIn()) { $errors['You must be logged in to reply.']; }
if (!isset($_POST['parentID']) or !isset($_POST['parentType'])) { 
    $errors[] = 'I can\'t tell what you\'re replying to.';
}
if (!isset($_POST['replyContent']) || strlen($_POST['replyContent']) <= 1) { 
    $errors[]='Your reply was empty.';
} else if (strlen($_POST['replyContent']) > 1000) { 
    $errors[]='Your reply must be less than 1000 characters.'; 
}

if (inError()) {
    // Display errors
    echo("<p>There were some problems with your form. Please go back and try again.</p><br /><br />");
    
    // Display error messages
    echo("<ul>\n");
    for ($i = 0; $i < count($errors); $i++) {
        echo("<li>" . $errors[$i] . "</li>");
    }
    echo("</ul>");

 } else {
    // Post comment
    
    // Determine whether it's supposed to post a reply to a post or a comment
    if ($_POST['parentType'] == "post") {
        $commentid=add_reply_to_post($user_id, $_POST['parentID'], $_POST['replyContent']);
        $post = get_post($_POST['parentID']);
        $postid = $post['id'];
    } else if ($_POST['parentType'] == "comment") {
        $commentid=add_reply_to_comment($user_id, $_POST['parentID'], $_POST['replyContent']);
        $comment = get_comment($_POST['parentID']);
        $postid = $comment['postparent'];
    }
    echo "Post successful!";
    $domain = $_SERVER['HTTP_HOST'];
    header("Location: http://$domain/govit/viewpost.php?postid=$postid&commentid=$commentid#$commentid");
    exit();   
}


require_once("footer.php");
ob_flush(); //for redirect
?>