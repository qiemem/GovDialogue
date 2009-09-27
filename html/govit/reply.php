<?php

// index.php
require_once("lib/commentmanagement.php");
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
if (!isset($_POST['replyText']) || strlen($_POST['replyText']) <= 1) { 
    $errors[]='Your reply was empty.';
} else if (strlen($_POST['replyText']) > 1000) { 
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
        add_reply_to_post($userid, $_POST['parentID'], $_POST['replyText']);
    }
    else {
        add_reply_to_comment($userid, $_POST['parentID'], $_POST['replyText']);
    }	
}


require_once("footer.php");

?>